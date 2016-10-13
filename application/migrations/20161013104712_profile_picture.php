<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: 20161013104712_profile_picture.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 13 Oct 2016
	
	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]
	
***********************************************************************************/
/* Migration version: 
 * 13 Oct 2016, 10:47AM
 * 20161013104712
 */
class Migration_Profile_picture extends CI_Migration
{
	// Public Functions ----------------------------------------------------------------
	public function up()
	{
		// create tables
		//$this->_generate_users();
	}
	
	public function down()
	{
		// drop tables
	}
	
	// Private Functions ---------------------------------------------------------------
	private function _generate_users()
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
	
} // end 20161013104712_profile_picture class