<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends Frontend_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['teams'] = $this->Team_m->get_with_paginate(1, 12, TRUE);
		$this->data['blogs'] = $this->Blog_m->get_with_paginate(1, 12, TRUE);
		$this->data['books'] = $this->Book_m->get_with_paginate(1, 5, TRUE);
		$this->data['brochures'] = $this->Brochure_m->get_with_paginate(1, 5, TRUE);
	}

	public function index()
	{
		$this->data['page'] = 'landing_page';
		$this->data['slides'] = $this->Slide_m->get_with_paginate(1, 3, TRUE);
		$this->data['about'] = $this->About_m->get(1, TRUE);
		$this->data['connects'] = $this->Connect_m->get_with_paginate(1, 10, TRUE);
		$this->load->view('_layout', $this->data);
	}

	public function window($slug = NULL)
	{
		$this->data['meta_title'] = ucwords($this->lang->line('windows'));
		if ($slug != NULL) {
			$this->data['page'] = '_article_layout';
			$team = $this->Team_m->get_by(array('slug' => $slug), TRUE);
			if ($team) {
				$this->data['type'] = $this->Team_m->get_table_name();
				$this->data['data'] = $team;
				$this->load->view('_layout', $this->data);
			} else {
				redirect('/');
			}
		}
	}

	public function blog($slug = NULL)
	{
		$this->data['meta_title'] = ucwords($this->lang->line('blogs'));
		if ($slug != NULL) {
			$this->data['page'] = '_article_layout';
			$blog = $this->Blog_m->get_by(array('slug' => $slug), TRUE);
			if ($blog) {
				$this->data['type'] = $this->Blog_m->get_table_name();
				$this->data['data'] = $blog;
				$this->load->view('_layout', $this->data);
			} else {
				redirect('/');
			}
		} else {
			$this->data['page'] = 'more_blog';
			$page = $this->input->get('page') ? $this->input->get('page') : 1;
			$blogs = $this->Blog_m->get_with_paginate($page, 10, TRUE);
			if ($blogs['data']) {
				$this->data['blogs'] = $blogs;
				$this->load->view('_layout', $this->data);
			} else {
				redirect('/blog');
			}
		}
	}

	public function about()
	{
		$this->data['meta_title'] = ucwords($this->lang->line('about'));
		$this->data['page'] = '_article_layout';
		$this->data['type'] = $this->About_m->get_table_name();
		$this->data['data'] = $this->About_m->get(1, TRUE);
		$this->load->view('_layout', $this->data);
	}

	public function publication()
	{
		redirect('/publication/book');
	}

	public function book()
	{
		$this->data['meta_title'] = ucwords($this->lang->line('books'));
		$this->data['page'] = 'more_publication';
		$this->data['type'] = 'book';
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$books = $this->Book_m->get_with_paginate($page, 10, TRUE);
		if ($books['data']) {
			$this->data['publications'] = $books;
			$this->load->view('_layout', $this->data);
		} else {
			redirect('/publication');
		}
	}

	public function brochure()
	{
		$this->data['meta_title'] = ucwords($this->lang->line('brochures'));
		$this->data['page'] = 'more_publication';
		$this->data['type'] = 'brochure';
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$brochures = $this->Brochure_m->get_with_paginate($page, 10, TRUE);
		if ($brochures['data']) {
			$this->data['publications'] = $brochures;
			$this->load->view('_layout', $this->data);
		} else {
			redirect('/publication');
		}
	}

	public function video()
	{
		$this->data['meta_title'] = ucwords($this->lang->line('videos'));
		$this->data['page'] = 'more_publication';
		$this->data['type'] = 'video';
		$page = $this->input->get('page') ? $this->input->get('page') : 1;
		$videos = $this->Video_m->get_with_paginate($page, 10, TRUE);
		if ($videos['data']) {
			$this->data['publications'] = $videos;
			$this->load->view('_layout', $this->data);
		} else {
			redirect('/publication');
		}
	}

	public function search()
	{
		$this->data['meta_title'] = ucwords($this->lang->line('search'));
		$this->data['page'] = 'search';
		if ($this->input->get('q')) {
			$param = array(
				'title' => htmlspecialchars($this->input->get('q', TRUE)),
				'slug' => htmlspecialchars($this->input->get('q', TRUE)),
				'tags' => htmlspecialchars($this->input->get('q', TRUE)),
			);

			$page = $this->input->get('page') ? $this->input->get('page') : 1;

			$data = array();

			$blogs = $this->Blog_m->get_like($param, $page);
			if ($blogs) {
				array_push($data, ...$blogs);
			}
			$books = $this->Book_m->get_like($param, $page);
			if ($books) {
				array_push($data, ...$books);
			}
			$brochures = $this->Brochure_m->get_like($param, $page);
			if ($brochures) {
				array_push($data, ...$brochures);
			}
			$teams = $this->Team_m->get_like($param, $page);
			if ($teams) {
				array_push($data, ...$teams);
			}

			$this->data['result'] = array(
				'prev_page' => ($page - 1) > 0 ? base_url('search?q=') . $this->input->get('q') . '&page=' . ($page - 1) : NULL,
				'next_page' => !empty($data) ? base_url('search?q=') . $this->input->get('q') . '&page=' . ($page + 1) : NULL,
				'data' => $data,
			);
		}
		$this->load->view('_layout', $this->data);
	}
}
