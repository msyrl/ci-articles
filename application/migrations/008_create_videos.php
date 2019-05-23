<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_create_videos extends CI_Migration
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
            'attachment_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '128',
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'null' => TRUE,
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP'
            )
        ));

        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('videos');
    }

    public function down()
    {
        $this->dbforge->drop_table('videos');
    }
}
