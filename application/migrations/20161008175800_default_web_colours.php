<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: 20161008175800_default_web_colours.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 08 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/* Migration version:
 * 08 Oct 2016, 5:58PM
 * 20161008175800
 */
class Migration_Default_web_colours extends CI_Model
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

	private function _generate_web_safe_colours()
	{
		$this->load->model('Web_safe_colour_model');
		$default_colours = array(
			'black' => array(
				'colour_name' => 'Black',
				'colour_selector' => 'Black',
				'red_255' => 0,
				'green_255' => 0,
				'blue_255' => 0,
				'red_ratio' => 0,
				'green_ratio' => 0,
				'blue_ratio' => 0,
				'hex' => '#000000',
				'colour_type' => 'Default'
			),
			'white' => array(
				'colour_name' => 'White',
				'colour_selector' => 'White',
				'red_255' => 255,
				'green_255' => 255,
				'blue_255' => 255,
				'red_ratio' => 1,
				'green_ratio' => 1,
				'blue_ratio' => 1,
				'hex' => '#FFFFFF',
				'colour_type' => 'Default'
			),
			'gray' => array(
				'colour_name' => 'Gray',
				'colour_selector' => 'Gray',
				'red_255' => 128,
				'green_255' => 128,
				'blue_255' => 128,
				'red_ratio' => 0.5,
				'green_ratio' => 0.5,
				'blue_ratio' => 0.5,
				'hex' => '#888888',
				'colour_type' => 'Default'
			),
			'grey' => array(
				'colour_name' => 'Grey',
				'colour_selector' => 'Grey',
				'red_255' => 128,
				'green_255' => 128,
				'blue_255' => 128,
				'red_ratio' => 0.5,
				'green_ratio' => 0.5,
				'blue_ratio' => 0.5,
				'hex' => '#888888',
				'colour_type' => 'Default'
			),
			'red' => array(
				'colour_name' => 'Red',
				'colour_selector' => 'Red',
				'red_255' => 255,
				'green_255' => 0,
				'blue_255' => 0,
				'red_ratio' => 1,
				'green_ratio' => 0,
				'blue_ratio' => 0,
				'hex' => '#FF0000',
				'colour_type' => 'Default'
			),
			'lime' => array(
				'colour_name' => 'Lime',
				'colour_selector' => 'Lime',
				'red_255' => 0,
				'green_255' => 255,
				'blue_255' => 0,
				'red_ratio' => 0,
				'green_ratio' => 1,
				'blue_ratio' => 0,
				'hex' => '#00FF00',
				'colour_type' => 'Default'
			),
			'blue' => array(
				'colour_name' => 'Blue',
				'colour_selector' => 'Blue',
				'red_255' => 0,
				'green_255' => 0,
				'blue_255' => 255,
				'red_ratio' => 0,
				'green_ratio' => 0,
				'blue_ratio' => 1,
				'hex' => '#0000FF',
				'colour_type' => 'Default'
			),
			'yellow' => array(
				'colour_name' => 'Yellow',
				'colour_selector' => 'Yellow',
				'red_255' => 255,
				'green_255' => 255,
				'blue_255' => 0,
				'red_ratio' => 1,
				'green_ratio' => 1,
				'blue_ratio' => 0,
				'hex' => '#FFFF00',
				'colour_type' => 'Default'
			),
			'aqua' => array(
				'colour_name' => 'Aqua',
				'colour_selector' => 'Aqua',
				'red_255' => 0,
				'green_255' => 255,
				'blue_255' => 255,
				'red_ratio' => 0,
				'green_ratio' => 1,
				'blue_ratio' => 1,
				'hex' => '#00FFFF',
				'colour_type' => 'Default'
			),
			'cyan' => array(
				'colour_name' => 'Cyan',
				'colour_selector' => 'Cyan',
				'red_255' => 0,
				'green_255' => 255,
				'blue_255' => 255,
				'red_ratio' => 0,
				'green_ratio' => 1,
				'blue_ratio' => 1,
				'hex' => '#00FFFF',
				'colour_type' => 'Default'
			),
			'magenta' => array(
				'colour_name' => 'Magenta',
				'colour_selector' => 'Magenta',
				'red_255' => 255,
				'green_255' => 0,
				'blue_255' => 255,
				'red_ratio' => 1,
				'green_ratio' => 0,
				'blue_ratio' => 1,
				'hex' => '#FF00FF',
				'colour_type' => 'Default'
			),
			'fuchsia' => array(
				'colour_name' => 'Fuchsia',
				'colour_selector' => 'Fuchsia',
				'red_255' => 255,
				'green_255' => 0,
				'blue_255' => 255,
				'red_ratio' => 1,
				'green_ratio' => 0,
				'blue_ratio' => 1,
				'hex' => '#FF00FF',
				'colour_type' => 'Default'
			)
		);

		foreach($default_colours as $colour)
		{
			$this->Web_safe_colour_model->insert($colour);
			echo "<div><small>Colour (" . $colour['colour_name'] . ", " . $colour['colour_type'] . ") created.</small></div>";
		}
		echo "<hr />";
	}

} // end Migration_Default_web_colours class
