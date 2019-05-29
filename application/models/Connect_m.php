<?php

class Connect_m extends MY_Model
{
    protected $_table_name = 'connects';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'created_at';
    protected $_order = 'desc';
    protected $_timestamps = TRUE;

    public function __construct()
    {
        parent::__construct();
    }

    public function validation_rules($id = NULL)
    {
        if ($id) {
            return array(
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'trim|required',
                ),
            );
        } else {
            return array(
                array(
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'trim|required|is_unique[connects.name]',
                ),
            );
        }
    }

    public function get_with_paginate($page = 1, $per_page = 10)
    {
        $total_rows = $this->db->get($this->_table_name)->num_rows();
        $total_pages = ceil($total_rows / $per_page);
        $offset = ($page * $per_page) - $per_page;

        $data = $this->db
            ->select("$this->_table_name.id as id, $this->_table_name.name as name, users.username as updated_by, $this->_table_name.created_at as created_at, $this->_table_name.is_publish as is_publish")
            ->join('users', 'connects.updated_by = users.id')
            ->order_by('created_at', 'DESC')
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
}
