<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Migrate.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 08 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Migrate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
		$this->load->model('Migration_model');
	}

	public function index()
	{
		if($this->migration->version($this->Migration_model->_get_versions_array()[1]) === FALSE)
		{
			show_error('Migration Error:<br/>' . $this->migration->error_string());
		}
		else
		{
			echo 'Migration successful.<br/>';
			echo 'Version: ' . $this->Migration_model->get_version_from_db() . '<br/>';
			echo '<p><a href="' . site_url('migrate/rest') . '">Reset</a> | <a href="' . site_url('admin/authenticate/start') . '">Start Page</a></p>';
			echo '<hr/';
			echo '<p style="text-align:center;">- end of script -</p>';
		}
	}

	public function reset()
	{
		$this->Migration_model->reset();
	}
	
} // end Migrate controller class