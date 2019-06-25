<?php

class General_m extends MY_Model
{
    protected $_table_name = 'generals';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    protected $_order = '';
    protected $_timestamps = FALSE;

    public function __construct()
    {
        parent::__construct();
    }

    public function validation_rules()
    {
        return array(
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'facebook',
                'label' => 'Facebook',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'instagram',
                'label' => 'Instagram',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'twitter',
                'label' => 'Twitter',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'youtube',
                'label' => 'Youtube',
                'rules' => 'trim|required',
            ),
        );
    }
}
