<?php

class Role extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Role_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['roles'] = $this->Role_m->get_with_paginate($page);
        $this->data['page'] = 'admin/role/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $this->data['page'] = 'admin/role/form';
        if ($id === NULL) {
            $this->data['title'] = 'create new role';
        } else {
            $this->data['id'] = $id;
            $this->data['title'] = 'update role';
            $this->data['role'] = $this->Role_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->Role_m->_rules);
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', TRUE))
            );
            if ($id === NULL) {
                $this->Role_m->save($data);
            } else {
                $this->Role_m->save($data, $this->input->post('id', TRUE));
            }
            $this->session->set_flashdata('form_status', array(
                'status' => 'success',
                'message' => 'Successfully ' . $this->data['title'] . '!',
            ));
            redirect('admin/role');
        }
    }

    public function delete($id)
    {
        $this->Role_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully delete role!',
        ));
        redirect('admin/role');
    }
}
