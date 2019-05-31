<?php

class Migrate extends CI_Controller
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
                    'title' => 'Profile',
                    'url' => 'admin/proflie',
                    'icon' => 'home',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Blog',
                    'url' => 'admin/blog',
                    'icon' => 'file-text',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Book',
                    'url' => 'admin/book',
                    'icon' => 'folder',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Brochure',
                    'url' => 'admin/brochure',
                    'icon' => 'image',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Video',
                    'url' => 'admin/video',
                    'icon' => 'play-circle',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Team',
                    'url' => 'admin/team',
                    'icon' => 'users',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Connect',
                    'url' => 'admin/connect',
                    'icon' => 'thumbnails',
                    'type' => 'data',
                ),
                array(
                    'title' => 'Slide',
                    'url' => 'admin/slide',
                    'icon' => 'image',
                    'type' => 'page',
                ),
                array(
                    'title' => 'About',
                    'url' => 'admin/about',
                    'icon' => 'info',
                    'type' => 'page',
                ),
                array(
                    'title' => 'General',
                    'url' => 'admin/general',
                    'icon' => 'receiver',
                    'type' => 'page',
                ),
                array(
                    'title' => 'Role',
                    'url' => 'admin/role',
                    'icon' => 'link',
                    'type' => 'access',
                ),
                array(
                    'title' => 'User',
                    'url' => 'admin/user',
                    'icon' => 'user',
                    'type' => 'access',
                ),
            );
            $this->db->insert_batch('menus', $menusData);
            echo "Menus table inserted!";
        } else {
            echo "Menus table already exists!";
        }
    }
}
