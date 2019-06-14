<?php

class Slide extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Slide_m');
    }

    public function index()
    {
        $this->data['title'] = $this->lang->line('slides');
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['slides'] = $this->Slide_m->get_with_paginate($page);
        $this->data['page'] = 'admin/slide/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $post = TRUE;
        $this->data['page'] = 'admin/slide/form';
        if ($id === NULL) {
            $this->data['title'] = $this->lang->line('add') . ' ' . $this->lang->line('new_slide');
        } else {
            $this->data['title'] = $this->lang->line('update') . ' ' . $this->lang->line('slide');
            $this->data['slide'] = $this->Slide_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Slide_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'title' => htmlspecialchars($this->input->post('title', TRUE)),
                'position' => htmlspecialchars($this->input->post('position', TRUE)),
                'is_cover' => htmlspecialchars($this->input->post('is_cover', TRUE)),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                'updated_by' => $this->session->userdata('user')['id'],
            );
            if ($_FILES['image']['name'] != '') {
                $this->load->library('upload');
                $uploadConfig = array(
                    'upload_path' => './assets/images/slides/',
                    'allowed_types' => 'jpg|png|gif|jpeg',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['slide']->image)) {
                    if ($this->data['slide']->image && file_exists('./assets/images/slides/' . $this->data['slide']->image)) {
                        unlink('./assets/images/slides/' . $this->data['slide']->image);
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
                    $this->Slide_m->save($data);
                } else {
                    $this->Slide_m->save($data, $id);
                }
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' => ucfirst($this->lang->line('success')) . ' ' . $this->data['title'] . '!',
                ));
                redirect('admin/slide');
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }

    public function change_publish($id)
    {
        $slide = $this->Slide_m->get($id);
        $data = array(
            'is_publish' => $slide->is_publish ? 0 : 1,
        );
        $this->Slide_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('success')) . ' ' .  $this->lang->line('edit') . ' ' . $this->lang->line('publish_option') . '!',
        ));
        redirect('admin/slide');
    }

    public function delete($id)
    {
        $slide = $this->Slide_m->get($id, TRUE);
        if (!empty($slide->image) && file_exists('./assets/images/slides/' . $slide->image)) {
            unlink('./assets/images/slides/' . $slide->image);
        }
        $this->Slide_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('success')) . ' ' . $this->lang->line('delete') . ' ' . $this->lang->line('slide') . '!',
        ));
        redirect('admin/slide');
    }
}
