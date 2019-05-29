<?php

class Connect extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Connect_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['connects'] = $this->Connect_m->get_with_paginate($page);
        $this->data['page'] = 'admin/connect/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $post = TRUE;
        $this->data['page'] = 'admin/connect/form';
        if ($id === NULL) {
            $this->data['title'] = 'create new connect';
        } else {
            $this->data['title'] = 'update connect';
            $this->data['connect'] = $this->Connect_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Connect_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', TRUE)),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                // static updated_by
                'updated_by' => 1,
            );
            if ($_FILES['image']['name'] != '') {
                $this->load->library('upload');
                $uploadConfig = array(
                    'upload_path' => './assets/images/connects/',
                    'allowed_types' => 'jpg|png|gif|jpeg',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['connect']->image)) {
                    if ($this->data['connect']->image && file_exists('./assets/images/connects/' . $this->data['connect']->image)) {
                        unlink('./assets/images/connects/' . $this->data['connect']->image);
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
                if ($id === NULL) {
                    $this->Connect_m->save($data);
                } else {
                    $this->Connect_m->save($data, $id);
                }
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' => 'Successfully ' . $this->data['title'] . '!',
                ));
                redirect('admin/connect');
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }

    public function change_publish($id)
    {
        $connect = $this->Connect_m->get($id);
        $data = array(
            'is_publish' => $connect->is_publish ? 0 : 1,
        );
        $this->Connect_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully change publish option!',
        ));
        redirect('admin/connect');
    }

    public function delete($id)
    {
        $connect = $this->Connect_m->get($id, TRUE);
        if (!empty($connect->image) && file_exists('./assets/images/connects/' . $connect->image)) {
            unlink('./assets/images/connects/' . $connect->image);
        }
        $this->Connect_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully delete connect!',
        ));
        redirect('admin/connect');
    }
}
