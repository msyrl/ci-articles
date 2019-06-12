<?php

class Auth extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if (!$this->session->userdata('user')) {
            $rules = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'trim|required',
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required',
                ),
            );

            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() === FALSE) {
                $this->data['meta_title'] = ucfirst($this->lang->line('login'));
                $this->load->view('login', $this->data);
            } else {
                $this->load->model('User_m');
                $username = htmlspecialchars($this->input->post('username', TRUE));
                $password = htmlspecialchars($this->input->post('password', TRUE));

                $user = $this->User_m->get_by(array('username' => $username, 'is_active' => 1), TRUE);

                if ($user) {
                    if (password_verify($password, $user->password)) {
                        $data = array(
                            'id' => $user->id,
                            'role_id' => $user->role_id,
                            'username' => $user->username,
                            'name' => $user->name,
                        );

                        $this->session->set_userdata(array('user' => $data));
                        $this->session->set_flashdata('alert', array(
                            'status' => 'success',
                            'message' => ucfirst($this->lang->line('welcome_to_admin_page')) . ', ' . $data['name'] . '!',
                        ));
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('alert', array(
                            'status' => 'danger',
                            'message' => ucfirst($this->lang->line('invalid_password')) . ' !',
                        ));
                        $this->load->view('login', $this->data);
                    }
                } else {
                    $this->session->set_flashdata('alert', array(
                        'status' => 'danger',
                        'message' => ucfirst($this->lang->line('username_not_found')) . ' !',
                    ));
                    $this->load->view('login', $this->data);
                }
            }
        } else {
            $this->session->set_flashdata('alert', array(
                'status' => 'danger',
                'message' => ucfirst($this->lang->line('you_have_already_login')) . ' !',
            ));
            redirect('admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('alert', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('you_have_been_logout')) . ' !',
        ));
        redirect('/');
    }
}
