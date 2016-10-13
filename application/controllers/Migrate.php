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
		$this->load->model('User_log_model');
	}

	public function index()
	{
		redirect('migrate/browse_migrations');
	}

	public function new_script($descriptive_name='New_migration')
	{
		$this->load->model('User_log_model');
		$this->load->library('datetime_helper');
		$this->User_log_model->validate_access_admin();
		$data = array(
			'descriptive_name' => ucfirst($descriptive_name),
		);
		$this->load->view('migrate/new_script_template', $data);
	}

    public function browse_migrations()
    {
        $this->User_log_model->validate_access();
        $this->load->library('datetime_helper');
        $migrations = array();

        foreach($this->Migration_model->_get_versions_array() as $key=>$version_no)
        {
            $migration = array();
            $migration['order_no'] = $key;
            $migration['version_no'] = $version_no;
            $migration['timestamp'] = $this->datetime_helper->format_dd_mmm_yyyy_hh_ii_ss($version_no);
            $migration['current_version'] = $version_no == $this->Migration_model->get_version_from_db() ? TRUE : FALSE;
            $migrations[] = $migration;
        }

        $data = array(
            'migrations' => $migrations
        );

        $this->load->view('migrate/browse_migrations_page', $data);
    }

    public function run_current()
    {
        if($this->migration->current() === FALSE)
        {
            show_error('Migration Error:<br/>' . $this->migration->error_string());
        }
        else
        {
            $this->_run_success_message();
        }
    }

    public function run_latest()
    {
        if($this->migration->latest() === FALSE)
        {
            show_error('Migration Error:<br/>' . $this->migration->error_string());
        }
        else
        {
            $this->_run_success_message();
        }
    }

    public function run_version($version_no=0)
    {
        if($this->migration->version($this->Migration_model->_get_versions_array()[$version_no]) === FALSE)
        {
            show_error('Migration Error:<br/>' . $this->migration->error_string());
        }
        else
        {
            $this->_run_success_message();
        }
    }

    private function _run_success_message()
    {
        echo '<h3>Migration Successful</h3>';
        echo 'Version: ' . $this->Migration_model->get_version_from_db() . '<br/>';
        $this->load->view('migrate/result_view');
    }

} // end Migrate controller class
