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
		if($this->migration->current() === FALSE)
		{
			show_error('Migration Error:<br/>' . $this->migration->error_string());
		}
		else
		{
			echo 'Migration successful.<br/>';
			echo 'Version: ' . $this->Migration_model->get_version_from_db() . '<br/>';
			echo '<a href="' . site_url('migrate/rest') . '">Reset</a>';
		}
	}

	public function reset()
	{
		$this->Migration_model->reset();
	}
	
} // end Migrate controller class