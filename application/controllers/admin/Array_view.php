<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Array_view.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 27 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Array_view extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

    public function user()
    {
        $this->User_log_model->validate_access_admin();
        $this->load->model('User_model');

        $data = array(
            'entries' => $this->User_model->get_all(),
            'field_names' => $this->User_model->_get_field_names(),
            'array_name' => 'users'
        );
        $this->load->view('admin/array_view/array_view_page', $data);
    }

    public function web_safe_colour()
    {
        $this->User_log_model->validate_access_admin();
        $this->load->model('Web_safe_colour_model');

        $data = array(
            'entries' => $this->Web_safe_colour_model->get_all(),
            'field_names' => $this->Web_safe_colour_model->_get_field_names(),
            'array_name' => 'web_safe_colours'
        );
        $this->load->view('admin/array_view/array_view_page', $data);
    }
	
} // end Array_view controller class