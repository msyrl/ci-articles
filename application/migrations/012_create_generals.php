<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_generals extends CI_Migration
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
            'address' => array(
                'type' => 'TEXT',
            ),
            'facebook' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'instagram' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'twitter' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'youtube' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('generals');
    }

    public function down()
    {
        $this->dbforge->drop_table('generals');
    }
}
