<?php

class Profile extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
    }

    public function index()
    {
        $this->data['title'] = $this->lang->line('update') . " " . $this->lang->line('profile');
        $id = $this->session->userdata('user')['id'];
        $this->data['page'] = 'admin/profile/index';
        $this->data['user'] = $this->User_m->get_by(array('username' => $this->session->userdata('user')['username']), TRUE);
        $this->form_validation->set_rules($this->User_m->profile_validation_rules());
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', TRUE)),
                'password' => password_hash(htmlspecialchars($this->input->post('new_password', TRUE)), PASSWORD_DEFAULT),
            );

            if (password_verify($this->input->post('old_password'), $this->data['user']->password)) {
                $this->User_m->save($data, $id);
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' => ucfirst($this->lang->line('success')) . " " . $this->data['title'] . '!',
                ));
            } else {
                $this->session->set_flashdata('form_status', array(
                    'status' => 'danger',
                    'message' => ucfirst($this->lang->line('invalid_old_password')) . ' !',
                ));
            }
            redirect('admin/profile');
        }
    }
}
