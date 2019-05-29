<?php

class About_m extends MY_Model
{
    protected $_table_name = 'abouts';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'created_at';
    protected $_order = 'desc';
    protected $_timestamps = TRUE;

    public function __construct()
    {
        parent::__construct();
    }

    public function validation_rules()
    {
        return array(
            array(
                'field' => 'body',
                'label' => 'Body',
                'rules' => 'trim|required',
            ),
        );
    }
}
