<?php

class Blog extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['blogs'] = $this->Blog_m->get_with_paginate($page);
        $this->data['page'] = 'admin/blog/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $post = TRUE;
        $this->data['page'] = 'admin/blog/form';
        if ($id === NULL) {
            $this->data['title'] = 'create new blog';
        } else {
            $this->data['title'] = 'update blog';
            $this->data['blog'] = $this->Blog_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Blog_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'title' => htmlspecialchars($this->input->post('title', TRUE)),
                'source' => htmlspecialchars($this->input->post('source', TRUE)),
                'body' => htmlspecialchars($this->input->post('body', TRUE)),
                'slug' => url_title(strtolower($this->input->post('title', TRUE))),
                'tags' => htmlspecialchars($this->input->post('tags', TRUE)),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                'updated_by' => $this->session->userdata('user')['id'],
            );
            if ($_FILES['image']['name'] != '') {
                $this->load->library('upload');
                $uploadConfig = array(
                    'upload_path' => './assets/images/blogs/',
                    'allowed_types' => 'jpg|png|gif|jpeg',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['blog']->image)) {
                    if ($this->data['blog']->image && file_exists('./assets/images/blogs/' . $this->data['blog']->image)) {
                        unlink('./assets/images/blogs/' . $this->data['blog']->image);
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
                    $this->Blog_m->save($data);
                } else {
                    $this->Blog_m->save($data, $id);
                }
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' => 'Successfully ' . $this->data['title'] . '!',
                ));
                redirect('admin/blog');
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }

    public function change_publish($id)
    {
        $blog = $this->Blog_m->get($id);
        $data = array(
            'is_publish' => $blog->is_publish ? 0 : 1,
        );
        $this->Blog_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully change publish option!',
        ));
        redirect('admin/blog');
    }

    public function delete($id)
    {
        $blog = $this->Blog_m->get($id, TRUE);
        if (!empty($blog->image) && file_exists('./assets/images/blogs/' . $blog->image)) {
            unlink('./assets/images/blogs/' . $blog->image);
        }
        $this->Blog_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully delete blog!',
        ));
        redirect('admin/blog');
    }
}
