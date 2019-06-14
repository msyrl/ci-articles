<?php

class Video extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Video_m');
    }

    public function index()
    {
        $this->data['title'] = $this->lang->line('videos');
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['videos'] = $this->Video_m->get_with_paginate($page, 1, TRUE);
        $this->data['page'] = 'admin/video/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $this->data['page'] = 'admin/video/form';
        if ($id === NULL) {
            $this->data['title'] = $this->lang->line('add') . ' ' . $this->lang->line('new_video');
        } else {
            $this->data['title'] = $this->lang->line('update') . ' ' . $this->lang->line('video');
            $this->data['video'] = $this->Video_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Video_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'title' => htmlspecialchars($this->input->post('title', TRUE)),
                'link' => htmlspecialchars($this->input->post('link', TRUE)),
                'slug' => url_title(strtolower($this->input->post('title', TRUE))),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                'updated_by' => $this->session->userdata('user')['id'],
            );
            if ($id === NULL) {
                $this->Video_m->save($data);
            } else {
                $this->Video_m->save($data, $id);
            }
            $this->session->set_flashdata('form_status', array(
                'status' => 'success',
                'message' => ucfirst($this->lang->line('success')) . ' ' . $this->data['title'] . '!',
            ));
            redirect('admin/video');
        }
    }

    public function change_publish($id)
    {
        $video = $this->Video_m->get($id);
        $data = array(
            'is_publish' => $video->is_publish ? 0 : 1,
        );
        $this->Video_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('success')) . ' ' .  $this->lang->line('edit') . ' ' . $this->lang->line('publish_option') . '!',
        ));
        redirect('admin/video');
    }

    public function delete($id)
    {
        $this->Video_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => ucfirst($this->lang->line('success')) . ' ' . $this->lang->line('delete') . ' ' . $this->lang->line('video') . '!',
        ));
        redirect('admin/video');
    }
}
