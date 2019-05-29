<?php

class User extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->model('Role_m');
    }

    public function index()
    {
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['users'] = $this->User_m->get_with_paginate($page);
        $this->data['page'] = 'admin/user/index';
        $this->load->view('admin/_layout', $this->data);
    }

    public function form($id = NULL)
    {
        $this->data['page'] = 'admin/user/form';
        $this->data['roles'] = $this->Role_m->get();
        if ($id === NULL) {
            $this->data['title'] = 'create new user';
        } else {
            $this->data['title'] = 'update user';
            $this->data['user'] = $this->User_m->get($id, TRUE);
        }
        $this->form_validation->set_rules($this->User_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'role_id' => htmlspecialchars($this->input->post('role', TRUE)),
                'name' => htmlspecialchars($this->input->post('name', TRUE)),
                'username' => htmlspecialchars($this->input->post('username', TRUE)),
                'is_active' => htmlspecialchars($this->input->post('active', TRUE)),
                // static updated_by
                'updated_by' => 1,
            );

            $password = htmlspecialchars($this->input->post('password', TRUE));

            if ($password !== '') {
                $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            if ($id === NULL) {
                $this->User_m->save($data);
            } else {
                $this->User_m->save($data, $id);
            }
            $this->session->set_flashdata('form_status', array(
                'status' => 'success',
                'message' => 'Successfully ' . $this->data['title'] . '!',
            ));
            redirect('admin/user');
        }
    }

    public function change_active($id)
    {
        $user = $this->User_m->get($id);
        $data = array(
            'is_active' => $user->is_active ? 0 : 1,
        );
        $this->User_m->save($data, $id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully change active option!',
        ));
        redirect('admin/user');
    }

    public function delete($id)
    {
        $this->User_m->delete($id);
        $this->session->set_flashdata('form_status', array(
            'status' => 'success',
            'message' => 'Successfully delete user!',
        ));
        redirect('admin/user');
    }
}
