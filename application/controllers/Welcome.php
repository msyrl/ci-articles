<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends Frontend_Controller
{
	public function index()
	{
		$this->data['page'] = 'landing_page';
		// Extra Script
		$this->data['meta_script'] = 'assets/js/home.js';
		$this->load->view('_layout', $this->data);
	}
}
