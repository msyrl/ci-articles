<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_teams extends CI_Migration
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
            'image' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'desc' => array(
                'type' => 'TEXT',
            ),
            'created_at' => array(
                'type' => 'DATETIME'
            ),
            'updated_at' => array(
                'type' => 'DATETIME'
            ),
            'updated_by' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ),
        ));

        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT ON UPDATE CASCADE');
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('teams');
    }

    public function down()
    {
        $this->dbforge->drop_table('teams');
    }
}
