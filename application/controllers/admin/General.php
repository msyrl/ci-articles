<?php

class General extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_m');
    }

    public function index()
    {
        $id = 1;
        $this->data['page'] = 'admin/general/index';
        $this->data['title'] = 'update general';
        $this->data['general'] = $this->General_m->get($id, TRUE);
        $this->form_validation->set_rules($this->General_m->validation_rules());
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'address' => htmlspecialchars($this->input->post('address', TRUE)),
                'phone' => htmlspecialchars($this->input->post('phone', TRUE)),
                'facebook' => htmlspecialchars($this->input->post('facebook', TRUE)),
                'instagram' => htmlspecialchars($this->input->post('instagram', TRUE)),
                'twitter' => htmlspecialchars($this->input->post('twitter', TRUE)),
                'youtube' => htmlspecialchars($this->input->post('youtube', TRUE)),
            );
            if (empty($this->data['general'])) {
                $this->General_m->save($data);
            } else {
                $this->General_m->save($data, $id);
            }
            $this->session->set_flashdata('form_status', array(
                'status' => 'success',
                'message' => 'Successfully ' . $this->data['title'] . '!',
            ));
            redirect('admin/general');
        }
    }
}
