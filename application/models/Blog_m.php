<?php

class Blog_m extends MY_Model
{
    protected $_table_name = 'blogs';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'created_at';
    protected $_order = 'desc';
    public $_rules = array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'source',
            'label' => 'Source',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'body',
            'label' => 'Body',
            'rules' => 'trim|required',
        ),
        array(
            'field' => 'tags',
            'label' => 'Tags',
            'rules' => 'trim',
        ),
    );
    protected $_timestamps = TRUE;

    public function __construct()
    {
        parent::__construct();
    }
}
