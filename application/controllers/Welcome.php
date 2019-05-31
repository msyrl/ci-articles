<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['page'] = 'landing_page';
		$this->data['slides'] = $this->Slide_m->get_with_paginate(1, 3, TRUE);
		$this->data['about'] = $this->About_m->get(1, TRUE);
		$this->data['blogs'] = $this->Blog_m->get_with_paginate(1, 3, TRUE);
		$this->data['books'] = $this->Book_m->get_with_paginate(1, 2, TRUE);
		$this->data['brochures'] = $this->Brochure_m->get_with_paginate(1, 2, TRUE);
		$this->data['connects'] = $this->Connect_m->get_with_paginate(1, 10, TRUE);
		$this->load->view('_layout', $this->data);
	}
}
