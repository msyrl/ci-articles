<?php

class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        self::tables();
        self::menus();
        self::roles();
        self::users();
    }

    private function roles()
    {
        $roles = $this->db->get('roles')->result();
        if (empty($roles)) {
            $rolesData = array('name' => 'superadmin');
            $this->db->insert('roles', $rolesData);
            $totalMenus = $this->db->get('menus')->num_rows();
            if ($totalMenus > 0) {
                for ($i = 1; $i <= $totalMenus; $i++) {
                    $this->db->insert('menu_role', array(
                        'role_id' => 1,
                        'menu_id' => $i,
                    ));
                }
            }
        }
    }

    private function users()
    {
        $users = $this->db->get('users')->result();
        if (empty($users)) {
            $this->load->model('User_m');
            $usersData = array(
                'name' => 'Superadmin',
                'role_id' => 1,
                'username' => 'superadmin',
                'password' => password_hash('superadmin', PASSWORD_DEFAULT),
                'is_active' => 1,
            );
            $this->User_m->save($usersData);
        }
    }

    private function tables()
    {
        $this->load->library('migration');
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }
    }

    private function menus()
    {
        $menus = $this->db->get('menus')->result();
        if (empty($menus)) {
            $menusData = array(
                array(
                    'title' => 'Profile',
                    'url' => 'admin/profile',
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
        }
    }
}
