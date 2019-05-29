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
            $this->data['title'] = 'update role';
            $this->data['role'] = $this->Role_m->get($id, TRUE);
            $this->data['saved_menu_role'] = $this->Role_m->get_saved_menu_role($id);
        }
        $this->form_validation->set_rules($this->Role_m->validation_rules($id));
        if ($this->form_validation->run() === FALSE) {
            $this->data['menus'] = $this->Role_m->get_menus();
            $this->load->view('admin/_layout', $this->data);
        } else {
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', TRUE))
            );
            $menus = $this->input->post('menu');
            $menu_data = array();
            foreach ($menus as $key => $menu) :
                $menu_data[] = array(
                    'role_id' => $id,
                    'menu_id' => $key
                );
            endforeach;

            if ($id === NULL) {
                $this->Role_m->save($data);
            } else {
                $this->Role_m->save($data, $id);
            }

            $this->Role_m->save_menu_role($menu_data, $id);

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
