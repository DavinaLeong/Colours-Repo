<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: 20161008172100_init_setup.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 08 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/* Migration version:
 * 08 Oct 2016, 5:21PM
 * 20161008172100
 */
class Migration_Init_setup extends CI_Migration
{
    // Public Functions ----------------------------------------------------------------
    public function up()
    {
        //echo '<p>Create Tables</p><hr/><code>';
        //$this->load->model('Script_runner_model');
        //echo $this->Script_runner_model->run_script($this->_create_tables_script())['output_str'];
        //echo '</code><hr/>';
        $this->load->model('Script_runner_model');
        $this->Script_runner_model->run_script($this->_create_tables_script());
        echo '<p>Tables Created</p><hr/>';
        $this->_generate_users();
    }

    public function down()
    {
        //echo '<p>Drop Tables</p><hr/><code>';
        //$this->load->model('Script_runner_model');
        //echo $this->Script_runner_model->run_script($this->_drop_tables_script())['output_str'];
        //echo '</code><hr/>';
        $this->load->model('Script_runner_model');
        $this->Script_runner_model->run_script($this->_drop_tables_script());
        echo '<p>Tables Dropped</p><hr/>';
    }

    // Private Functions ---------------------------------------------------------------
    private function _create_tables_script()
    {
        $sql = "
            DROP TABLE IF EXISTS `ci_sessions`;
            CREATE TABLE IF NOT EXISTS `ci_sessions` (
              `id` varchar(40) NOT NULL,
              `ip_address` varchar(45) NOT NULL,
              `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
              `data` blob NOT NULL,
              KEY `ci_sessions_timestamp` (`timestamp`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


            DROP TABLE IF EXISTS `user`;
            CREATE TABLE IF NOT EXISTS `user` (
              `user_id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(512) NOT NULL,
              `password_hash` varchar(512) NOT NULL,
              `name` varchar(512) DEFAULT NULL,
              `image_filename` varchar(512) DEFAULT NULL,
              `image_width` varchar(5) DEFAULT NULL,
              `image_height` varchar(5) DEFAULT NULL,
              `image_filetype` varchar(5) DEFAULT NULL,
              `access` varchar(512) NOT NULL,
              `status` varchar(30) NOT NULL,
              `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`user_id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

            DROP TABLE IF EXISTS `user_log`;
            CREATE TABLE IF NOT EXISTS `user_log` (
              `ulid` int(11) NOT NULL AUTO_INCREMENT,
              `user_id` int(11) NOT NULL,
              `message` text NOT NULL,
              `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`ulid`)
            ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

            DROP TABLE IF EXISTS `web_safe_colour`;
            CREATE TABLE IF NOT EXISTS `web_safe_colour` (
              `colour_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `colour_name` varchar(512) DEFAULT NULL,
              `colour_selector` varchar(512) DEFAULT NULL,
              `red_255` int(10) unsigned DEFAULT NULL,
              `green_255` int(10) unsigned DEFAULT NULL,
              `blue_255` int(10) unsigned DEFAULT NULL,
              `red_ratio` decimal(10,2) unsigned DEFAULT NULL,
              `green_ratio` decimal(10,2) unsigned DEFAULT NULL,
              `blue_ratio` decimal(10,2) unsigned DEFAULT NULL,
              `hex` varchar(7) DEFAULT NULL,
              `colour_type` varchar(512) DEFAULT NULL,
              `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`colour_id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
        ";

        return $sql;
    }

    private function _drop_tables_script()
    {
        $sql = "
            DROP TABLE IF EXISTS `ci_sessions`;

            DROP TABLE IF EXISTS `user`;

            DROP TABLE IF EXISTS `user_log`;

            DROP TABLE IF EXISTS `web_safe_colour`;
        ";

        return $sql;
    }

    private function _generate_users()
    {
        $this->load->model('User_model');
		$users = array(
			'default_admin' => array(
				'username' => 'admin',
				'name' => 'Default Admin',
				'password_hash' => password_hash('password', PASSWORD_DEFAULT),
                'image_filename' => NULL,
                'image_width' => NULL,
                'image_height' => NULL,
                'image_filetype' => NULL,
				'access' => 'A',
				'status' => 'Active'
			)
		);

        foreach($users as $user)
		{
			$this->User_model->insert($user);
			echo "<div><small>User (" . $user['name'] . ", " . $user['access'] .  ") created.</small></div>";
		}
		echo "<hr />";
    }

} // end Migration_Init_db class
