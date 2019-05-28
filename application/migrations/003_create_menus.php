<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_menus extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'url' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'icon' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
            ),
            'type' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('menus');
    }

    public function down()
    {
        $this->dbforge->drop_table('menus');
    }
}
