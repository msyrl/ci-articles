<?php

class MY_Controller extends CI_Controller
{
    public $data = array();

    function __construct()
    {
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = $this->config->item('site_name');
        $this->data['meta_title'] = '';
    }
}
