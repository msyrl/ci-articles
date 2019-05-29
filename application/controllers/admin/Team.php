<?php

class Team extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Team_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['teams'] = $this->Team_m->get_with_paginate($page);
        $this->data['page'] = 'admin/team/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $post = TRUE;
        $this->data['page'] = 'admin/team/form';
        if ($id === NULL) {
            $this->data['title'] = 'create new team';
        } else {
            $this->data['title'] = 'update team';
            $this->data['team'] = $this->Team_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Team_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'title' => htmlspecialchars($this->input->post('title', TRUE)),
                'desc' => htmlspecialchars($this->input->post('desc', TRUE)),
                // static updated_by
                'updated_by' => 1,
            );
            if ($_FILES['image']['name'] != '') {
                $this->load->library('upload');
                $uploadConfig = array(
                    'upload_path' => './assets/images/teams/',
                    'allowed_types' => 'jpg|png|gif|jpeg',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['team']->image)) {
                    if ($this->data['team']->image && file_exists('./assets/images/teams/' . $this->data['team']->image)) {
                        unlink('./assets/images/teams/' . $this->data['team']->image);
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
                    $this->Team_m->save($data);
                } else {
                    $this->Team_m->save($data, $id);
                }
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' => 'Successfully ' . $this->data['title'] . '!',
                ));
                redirect('admin/team');
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }

    public function delete($id)
    {
        $team = $this->Team_m->get($id, TRUE);
        if (!empty($team->image) && file_exists('./assets/images/teams/' . $team->image)) {
            unlink('./assets/images/teams/' . $team->image);
        }
        $this->Team_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully delete team!',
        ));
        redirect('admin/team');
    }
}
