<?php

class Frontend_Controller extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        self::load_model();
        $this->data['general'] = $this->General_m->get(1, TRUE);
    }

    private function load_model()
    {
        $models = array('About_m', 'Blog_m', 'Book_m', 'Brochure_m', 'Connect_m', 'General_m', 'Slide_m', 'Team_m', 'Video_m');
        foreach ($models as $model) {
            $this->load->model($model);
        }
    }
}
