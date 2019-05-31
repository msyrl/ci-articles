<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_slides extends CI_Migration
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
            'position' => array(
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => TRUE,
            ),
            'is_cover' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'DATETIME'
            ),
            'updated_at' => array(
                'type' => 'DATETIME'
            ),
            'is_publish' => array(
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => TRUE,
            ),
            'updated_by' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
        ));

        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (updated_by) REFERENCES users(id) ON DELETE RESTRICT ON UPDATE CASCADE');
        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('slides');
    }

    public function down()
    {
        $this->dbforge->drop_table('slides');
    }
}
