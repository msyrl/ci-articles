<?php

class Admin_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user')) {
            self::check_permit();
            $this->data['meta_title'] =  'Admin';
            $this->data['data_menus'] = $this->get_data_menus();
            $this->data['page_menus'] = $this->get_page_menus();
            $this->data['access_menus'] = $this->get_access_menus();
        } else {
            $this->session->set_flashdata('alert', array(
                'status' => 'danger',
                'message' => 'You should login first!',
            ));
            redirect('login');
        }
    }

    protected function get_data_menus()
    {
        return $this->db
            ->select('menus.*, menu_role.role_id')
            ->join('menu_role', 'menus.id = menu_role.menu_id')
            ->order_by('menus.id', 'asc')
            ->get_where('menus', array(
                'menus.type' => 'data',
                'menu_role.role_id' => $this->session->userdata('user')['role_id'],
            ))
            ->result();
    }

    protected function get_page_menus()
    {
        return $this->db
            ->select('menus.*, menu_role.role_id')
            ->join('menu_role', 'menus.id = menu_role.menu_id')
            ->order_by('menus.id', 'asc')
            ->get_where('menus', array(
                'menus.type' => 'page',
                'menu_role.role_id' => $this->session->userdata('user')['role_id'],
            ))
            ->result();
    }

    protected function get_access_menus()
    {
        return $this->db
            ->select('menus.*, menu_role.role_id')
            ->join('menu_role', 'menus.id = menu_role.menu_id')
            ->order_by('menus.id', 'asc')
            ->get_where('menus', array(
                'menus.type' => 'access',
                'menu_role.role_id' => $this->session->userdata('user')['role_id'],
            ))
            ->result();
    }

    protected function check_permit()
    {
        $menusPermitted = $this->db
            ->select('menus.*, menu_role.role_id')
            ->join('menu_role', 'menus.id = menu_role.menu_id')
            ->get_where('menus', array(
                'menu_role.role_id' => $this->session->userdata('user')['role_id'],
                'menus.title' => get_class($this),
            ))
            ->row();
        if (empty($menusPermitted)) {
            redirect('admin');
        }
    }
}
