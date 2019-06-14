<?php

class Brochure extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brochure_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['brochures'] = $this->Brochure_m->get_with_paginate($page);
        $this->data['page'] = 'admin/brochure/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $post = TRUE;
        $this->data['page'] = 'admin/brochure/form';
        if ($id === NULL) {
            $this->data['title'] = $this->lang->line('add') . " " . $this->lang->line('new_brochure');
        } else {
            $this->data['title'] = $this->lang->line('update') . " " . $this->lang->line('brochure');
            $this->data['brochure'] = $this->Brochure_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Brochure_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'title' => htmlspecialchars($this->input->post('title', TRUE)),
                'source' => htmlspecialchars($this->input->post('source', TRUE)),
                'slug' => url_title(strtolower($this->input->post('title', TRUE))),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                'updated_by' => $this->session->userdata('user')['id'],
            );
            if ($_FILES['image']['name'] != '') {
                $this->load->library('upload');
                $uploadConfig['image'] = array(
                    'upload_path' => './assets/images/brochures/',
                    'allowed_types' => 'jpg|png|gif|jpeg|PNG',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['brochure']->image)) {
                    if ($this->data['brochure']->image && file_exists('./assets/images/brochures/' . $this->data['brochure']->image)) {
                        unlink('./assets/images/brochures/' . $this->data['brochure']->image);
                    }
                }
                $this->upload->initialize($uploadConfig['image']);
                if ($this->upload->do_upload('image')) {
                    $imageName = $this->upload->data('file_name');
                    $data['image'] = $imageName;
                } else {
                    $this->data['upload_error']['image'] = $this->upload->display_errors();
                    $post = FALSE;
                }
            }
            if ($_FILES['attachment']['name'] != '') {
                $uploadConfig['attachment'] = array(
                    'upload_path' => './assets/attachments/brochures/',
                    'allowed_types' => 'pdf',
                    'max_size' => 8000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['brochure']->attachment)) {
                    if ($this->data['brochure']->attachment && file_exists('./assets/attachments/brochures/' . $this->data['brochure']->attachment)) {
                        unlink('./assets/attachments/brochures/' . $this->data['brochure']->attachment);
                    }
                }
                $this->upload->initialize($uploadConfig['attachment']);
                if ($this->upload->do_upload('attachment')) {
                    $attachmentName = $this->upload->data('file_name');
                    $data['attachment'] = $attachmentName;
                } else {
                    $this->data['upload_error']['attachment'] = $this->upload->display_errors();
                    $post = FALSE;
                }
            }
            if ($post) {
                if ($id === NULL) {
                    $this->Brochure_m->save($data);
                } else {
                    $this->Brochure_m->save($data, $id);
                }
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' =>  ucfirst($this->lang->line('success')) . ' ' . $this->data['title'] . '!',
                ));
                redirect('admin/brochure');
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }

    public function change_publish($id)
    {
        $brochure = $this->Brochure_m->get($id);
        $data = array(
            'is_publish' => $brochure->is_publish ? 0 : 1,
        );
        $this->Brochure_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('success')) . ' ' .  $this->lang->line('edit') . ' ' . $this->lang->line('publish_option') . '!',
        ));
        redirect('admin/brochure');
    }

    public function delete($id)
    {
        $brochure = $this->Brochure_m->get($id, TRUE);
        if (!empty($brochure->image) && file_exists('./assets/images/brochures/' . $brochure->image)) {
            unlink('./assets/images/brochures/' . $brochure->image);
        }
        if (!empty($brochure->attachment) && file_exists('./assets/attachments/brochures/' . $brochure->attachment)) {
            unlink('./assets/attachments/brochures/' . $brochure->attachment);
        }
        $this->Brochure_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('success')) . ' ' . $this->lang->line('delete') . ' ' . $this->lang->line('brochure') . '!',
        ));
        redirect('admin/brochure');
    }
}
