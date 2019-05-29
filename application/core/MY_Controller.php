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

    protected function is_logged_in()
    {
        if ($this->session->userdata('user')) {
            return true;
        } else {
            return false;
        }
    }
}
