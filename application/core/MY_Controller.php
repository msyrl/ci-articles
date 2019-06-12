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
        $lang = $this->session->userdata('lang') ? $this->session->userdata('lang') : 'english';
        $this->data['lang'] = $this->selected_lang($lang);
        $this->lang->load($lang, $lang);
    }

    public function set_lang()
    {
        $lang = htmlspecialchars($this->input->get('lang', TRUE));
        $this->session->set_userdata('lang', $lang);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function selected_lang($lang)
    {
        switch ($lang) {
            case 'english':
                return 'en';
                break;

            case 'indonesia':
                return 'id';
                break;
        }
    }
}
