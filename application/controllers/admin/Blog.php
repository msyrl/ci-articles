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
        $this->data['blogs'] = $this->Blog_m->get();
        $this->data['page'] = 'admin/blog/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        if ($id === NULL) {
            $this->data['title'] = 'create new blog';
        } else {
            $this->data['title'] = 'update blog';
            $this->data['blog'] = $this->Blog_m->get($id, TRUE);
        }

        $this->form_validation->set_rules($this->Blog_m->_rules);

        if ($this->form_validation->run() === FALSE) {
            $this->data['id'] = $id;
            $this->data['page'] = 'admin/blog/form';
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'title' => htmlspecialchars($this->input->post('title', TRUE)),
                'source' => htmlspecialchars($this->input->post('source', TRUE)),
                'body' => htmlspecialchars($this->input->post('body', TRUE)),
                'slug' => url_title($this->input->post('slug', TRUE)),
                'tags' => htmlspecialchars($this->input->post('tags', TRUE)),
                'is_publish' => htmlspecialchars($this->input->post('is_publish', TRUE)),
                'updated_by' => 1,
            );

            if ($id === NULL) {
                $this->Blog_m->save($data);
            } else {
                $this->Blog_m->save($data, $this->input->post('id', TRUE));
            }

            $this->session->set_flashdata('form_status', array(
                'status' => 'success',
                'message' => 'Successfully ' . $this->data['title'] . '!',
            ));
            redirect('admin/blog');
        }
    }

    public function change_publish($id)
    {
        $this->data['title'] = 'change publish option';
        $blog = $this->Blog_m->get($id);

        $data = array(
            'is_publish' => $blog->is_publish ? 0 : 1,
        );

        $this->Blog_m->save($data, $id);

        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully ' . $this->data['title'] . '!',
        ));
        redirect('admin/blog');
    }

    public function delete($id)
    {
        $this->data['title'] = 'delete blog';
        $this->Blog_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully ' . $this->data['title'] . '!',
        ));
        redirect('admin/blog');
    }
}
