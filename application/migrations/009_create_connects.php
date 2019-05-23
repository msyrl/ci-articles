<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_connects extends CI_Migration
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
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'attachment_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
        ));

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('connects');
    }

    public function down()
    {
        $this->dbforge->drop_table('connects');
    }
}
