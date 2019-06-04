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
                'null' => TRUE,
            ),
            'facebook' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'instagram' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'twitter' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
            ),
            'youtube' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE,
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
