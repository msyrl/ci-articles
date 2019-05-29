<?php

class Book extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['books'] = $this->Book_m->get_with_paginate($page);
        $this->data['page'] = 'admin/book/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $post = TRUE;
        $this->data['page'] = 'admin/book/form';
        if ($id === NULL) {
            $this->data['title'] = 'create new book';
        } else {
            $this->data['title'] = 'update book';
            $this->data['book'] = $this->Book_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Book_m->validation_rules($id));
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
                    'upload_path' => './assets/images/books/',
                    'allowed_types' => 'jpg|png|gif|jpeg|PNG',
                    'max_size' => 2000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['book']->image)) {
                    if ($this->data['book']->image && file_exists('./assets/images/books/' . $this->data['book']->image)) {
                        unlink('./assets/images/books/' . $this->data['book']->image);
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
                    'upload_path' => './assets/attachments/books/',
                    'allowed_types' => 'pdf',
                    'max_size' => 8000,
                    'encrypt_name' => TRUE,
                );
                if (!empty($this->data['book']->attachment)) {
                    if ($this->data['book']->attachment && file_exists('./assets/attachments/books/' . $this->data['book']->attachment)) {
                        unlink('./assets/attachments/books/' . $this->data['book']->attachment);
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
                    $this->Book_m->save($data);
                } else {
                    $this->Book_m->save($data, $id);
                }
                $this->session->set_flashdata('form_status', array(
                    'status' => 'success',
                    'message' => 'Successfully ' . $this->data['title'] . '!',
                ));
                redirect('admin/book');
            } else {
                $this->load->view('admin/_layout', $this->data);
            }
        }
    }

    public function change_publish($id)
    {
        $book = $this->Book_m->get($id);
        $data = array(
            'is_publish' => $book->is_publish ? 0 : 1,
        );
        $this->Book_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully change publish option!',
        ));
        redirect('admin/book');
    }

    public function delete($id)
    {
        $book = $this->Book_m->get($id, TRUE);
        if (!empty($book->image) && file_exists('./assets/images/books/' . $book->image)) {
            unlink('./assets/images/books/' . $book->image);
        }
        if (!empty($book->attachment) && file_exists('./assets/attachments/books/' . $book->attachment)) {
            unlink('./assets/attachments/books/' . $book->attachment);
        }
        $this->Book_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully delete book!',
        ));
        redirect('admin/book');
    }
}
