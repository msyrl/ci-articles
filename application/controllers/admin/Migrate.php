<?php

class Migrate extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tables()
    {
        $this->load->library('migration');
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "Migration work!";
        }
    }

    public function menus()
    {
        $menus = $this->db->get('menus')->result();
        if (empty($menus)) {
            $menusData = array(
                array(
                    'title' => 'Blogs',
                    'url' => 'admin/blog',
                    'icon' => 'file-text',
                ),
                array(
                    'title' => 'Books',
                    'url' => 'admin/book',
                    'icon' => 'folder',
                ),
                array(
                    'title' => 'Brochures',
                    'url' => 'admin/brochure',
                    'icon' => 'image',
                ),
                array(
                    'title' => 'Videos',
                    'url' => 'admin/video',
                    'icon' => 'play-circle',
                ),
                array(
                    'title' => 'Teams',
                    'url' => 'admin/team',
                    'icon' => 'users',
                ),
                array(
                    'title' => 'Connects',
                    'url' => 'admin/connect',
                    'icon' => 'thumbnails',
                ),
                array(
                    'title' => 'Slides',
                    'url' => 'admin/slide',
                    'icon' => 'image',
                ),
                array(
                    'title' => 'About',
                    'url' => 'admin/about',
                    'icon' => 'info',
                ),
                array(
                    'title' => 'General',
                    'url' => 'admin/general',
                    'icon' => 'receiver',
                ),
                array(
                    'title' => 'Roles',
                    'url' => 'admin/role',
                    'icon' => 'link',
                ),
                array(
                    'title' => 'Users',
                    'url' => 'admin/user',
                    'icon' => 'user',
                ),
            );
            $this->db->insert_batch('menus', $menusData);
            echo "Menus table inserted!";
        } else {
            echo "Menus table already exists!";
        }
    }
}
