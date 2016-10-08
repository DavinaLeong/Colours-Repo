<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Migration_Init_db.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 28th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Migration_Init_setup extends CI_Migration
{
    public function up()
    {
        $this->_create_tables();
        $this->_create_users();
    }

    public function down()
    {
        $this->_drop_tables();
    }

    private function _create_tables()
    {
        $this->_create_user_table();
        $this->_create_user_log_table();
        $this->_create_web_safe_colour_table();
    }

    private function _create_users()
    {
        $this->load->model('User_model');
        $user = array(
            'username' => 'admin',
            'name' => 'Default Admin',
            'password_hash' => password_hash('password', PASSWORD_DEFAULT),
            'access' => 'A',
            'status' => 'Active'
        );
        $this->User_model->insert($user);
    }

    private function _drop_tables()
    {
        $this->dbforge->drop_table('web_safe_colour');
        $this->dbforge->drop_table('user_log');
        $this->dbforge->drop_table('user');
    }

    #region Individual Tables
    private function _create_user_table()
    {
        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '512'
            ),
            'password_hash' => array(
                'type' => 'VARCHAR',
                'constraint' => '512'
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ),
            'access' => array(
                'type' => 'VARCHAR',
                'constraint' => '512'
            ),
            'status' => array(
                'type' => 'VARCHAR',
                'constraint' => '512'
            ),
            'last_updated' => array(
                'type' => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('user', TRUE);
    }

    private function _create_user_log_table()
    {
        $this->dbforge->add_field(array(
            'ulid' => array(
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_log' => array(
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => TRUE
            ),
            'message' => array(
                'type' => 'TEXT'
            ),
            'timestamp' => array(
                'type' => 'TIMESTAMP'
            )
        ));
        $this->dbforge->add_key('ulid', TRUE);
        $this->dbforge->create_table('user_log', TRUE);
    }

    private function _create_web_safe_colour_table()
    {
        $this->dbforge->add_field(array(
            'colour_id' => array(
                'type' => 'INT',
                'constraint' => '5',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'colour_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '512',
                'null' => TRUE
            ),
            'colour_selector' => array(
                'type' => 'VARCHAR',
                'constraint' => '512'
            ),
            'red_255' => array(
                'type' => 'INT',
                'constraint' => '3',
                'unsigned' => TRUE
            ),
            'green_255' => array(
                'type' => 'INT',
                'constraint' => '3',
                'unsigned' => TRUE
            ),
            'blue_255' => array(
                'type' => 'INT',
                'constraint' => '3',
                'unsigned' => TRUE
            ),
            'red_ratio' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'unsigned' => TRUE
            ),
            'green_ratio' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'unsigned' => TRUE
            ),
            'blue_ratio' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'unsigned' => TRUE
            ),
            'hex' => array(
                'type' => 'VARCHAR',
                'constraint' => '7'
            ),
            'colour_type' => array(
                'type' => 'VARCHAR',
                'constraint' => '512'
            ),
            'date_added' => array(
                'type' => 'DATETIME'
            ),
            'last_updated' => array(
                'type' => 'TIMESTAMP'
            )
        ));
        $this->dbforge->add_key('colour_id', TRUE);
        $this->dbforge->create_table('web_safe_colour', TRUE);
    }
    #endregion

} // end Migration_Init_db class