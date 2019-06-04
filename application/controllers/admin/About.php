<?php

class About extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('About_m');
    }

    public function index()
    {
        $id = 1;
        $this->data['page'] = 'admin/about/index';
        $this->data['title'] = 'update about';
        $this->data['about'] = $this->About_m->get($id, TRUE);
        $this->form_validation->set_rules($this->About_m->validation_rules());
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'body' => htmlspecialchars($this->input->post('body', TRUE)),
                'short_body' => htmlspecialchars($this->input->post('short_body', TRUE)),
                'updated_by' => $this->session->userdata('user')['id'],
            );
            if (empty($this->data['about'])) {
                $this->About_m->save($data);
            } else {
                $this->About_m->save($data, $id);
            }
            $this->session->set_flashdata('form_status', array(
                'status' => 'success',
                'message' => 'Successfully ' . $this->data['title'] . '!',
            ));
            redirect('admin/about');
        }
    }
}
