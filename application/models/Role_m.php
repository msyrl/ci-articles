<?php

class Role_m extends MY_Model
{
    protected $_table_name = 'roles';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_order = 'asc';
    public $_rules = array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required',
        ),
    );
    protected $_timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function get_with_paginate($page = 1, $per_page = 10)
    {
        $total_rows = $this->db->get($this->_table_name)->num_rows();
        $total_pages = ceil($total_rows / $per_page);
        $offset = ($page * $per_page) - $per_page;

        $data = $this->db
            ->select("*")
            ->order_by('id', $this->_order)
            ->get($this->_table_name, $per_page, $offset)
            ->result();

        return array(
            'total_pages' => $total_pages,
            'current_page' => $page,
            'prev_page' => ($page - 1) > 0 ? $page - 1 : NULL,
            'next_page' => ($page + 1) <= $total_pages ? $page + 1 : NULL,
            'data' => $data,
        );
    }

    public function get_menus()
    {
        return $this->db->order_by('id', 'asc')->get('menus')->result();
    }

    public function get_saved_menu_role($role_id = NULL)
    {
        if ($role_id) {
            return $this->db
                ->select('menus.*, menu_role.role_id')
                ->join('menu_role', 'menus.id = menu_role.menu_id')
                ->order_by('menus.id', $this->_order)
                ->get_where('menus', array(
                    'menu_role.role_id' => $role_id,
                ))
                ->result();
        }
    }

    public function save_menu_role($data = array(), $role_id = NULL)
    {
        if ($data) {
            $this->db->delete('menu_role', array('role_id' => $role_id));
            return $this->db->insert_batch('menu_role', $data);
        }
    }
}
