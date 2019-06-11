<?php

class MY_Model extends CI_Model
{
    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_order = '';
    protected $_rules = array();
    protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }

    public function get_table_name()
    {
        return $this->_table_name;
    }

    public function get($id = NULL, $single = FALSE)
    {
        if ($id != NULL) {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } else if ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        $this->db->order_by($this->_order_by, $this->_order);
        return $this->db->get($this->_table_name)->$method();
    }

    public function get_by($where, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    public function get_like($where, $page)
    {
        $per_page = 2;
        $offset = ($page * $per_page) - $per_page;
        $result = $this->db;

        if ($this->db->field_exists('is_publish', $this->_table_name)) {
            $result = $result->where('is_publish', 1);
        }

        $result = $result->group_start();
        foreach ($where as $key => $item) {
            if ($this->db->field_exists($key, $this->_table_name)) {
                $result = $result->or_like($key, $item);
            };
        }
        $result = $result->group_end();

        $result = $result->select("*, '$this->_table_name' as type")->order_by('created_at', 'DESC')->get($this->_table_name, $per_page, $offset)->result_array();
        return $result;
    }

    public function save($data, $id = NULL)
    {
        // Set timestamps
        if ($this->_timestamps === TRUE) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created_at'] = $now;
            $data['updated_at'] = $now;
        }
        // Insert
        if ($id === NULL) {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        return $id;
    }

    public function delete($id)
    {
        $filter = $this->_primary_filter;
        $id = $filter($id);
        if (!$id) {
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
        return TRUE;
    }
}
