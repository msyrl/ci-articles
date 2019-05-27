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
        $post = TRUE;
        $this->data['page'] = 'admin/about/index';
        $this->data['id'] = $id;
        $this->data['title'] = 'update about';
        $this->data['about'] = $this->About_m->get($id, TRUE);
        $this->form_validation->set_rules($this->About_m->_rules);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'body' => htmlspecialchars($this->input->post('body', TRUE)),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                // static updated_by
                'updated_by' => 1,
            );
            if ($_FILES['image']['name'] != '') {
                $this->load->library('upload');
                $uploadConfig = array(
                    'upload_path' => './assets/images/abouts/',
                    'allowed_types' => 'jpg|png|gif|jpeg',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['about']->image)) {
                    if ($this->data['about']->image && file_exists('./assets/images/abouts/' . $this->data['about']->image)) {
                        unlink('./assets/images/abouts/' . $this->data['about']->image);
                    }
                }
                $this->upload->initialize($uploadConfig);
                if ($this->upload->do_upload('image')) {
                    $imageName = $this->upload->data('file_name');
                    $data['image'] = $imageName;
                } else {
                    $this->data['upload_error'] = $this->upload->display_errors();
                    $post = FALSE;
                }
            }
            if ($post) {
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
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }
}
