<?php

class Blog extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['page'] = 'admin/dashboard';
        $this->load->view('admin/_layout', $this->data);
    }

    public function modal()
    {
        $this->load->view('_modal');
    }
}
