<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Web_safe_colours.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Web_safe_colour extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Web_safe_colour_model');
	}

	public function browse_web_safe_colour()
	{
		$this->User_log_model->validate_access();
		$data = array(
			'web_safe_colours' => $this->Web_safe_colour_model->get_all()
		);
		$this->load->view('admin/web_safe_colour/browse_web_safe_colour_page', $data);
	}

	public function new_web_safe_colour()
	{
		$this->User_log_model->validate_access();
		$this->load->library('form_validation');

		$data = array(
			'colour_type_options' => $this->Web_safe_colour_model->_get_colour_types_array()
		);
		$this->load->view('admin/web_safe_colour/new_web_safe_colour_page', $data);
	}

	private function _set_rules_new_web_safe_colour()
	{
		$this->debug_helper->_error_not_implemented('_set_rules_new_web_safe_colour');
	}

	private function _prepare_new_web_safe_colour_array()
	{
		$this->debug_helper->_error_not_implemented('_prepare_new_web_safe_colour_array');
	}

	public function view_web_safe_colour($colour_id=FALSE)
	{
		$this->debug_helper->_error_page_not_implemented('view_web_safe_colour');
	}

	public function edit_web_safe_colour($colour_id=FALSE)
	{
		$this->debug_helper->_error_page_not_implemented('edit_web_safe_colour');
	}

	private function _set_rules_edit_web_safe_colour()
	{
		$this->debug_helper->_error_not_implemented('_set_rules_edit_web_safe_colour');
	}

	private function _prepare_edit_web_safe_colour_array($colour)
	{
		$this->debug_helper->_error_not_implemented('_prepare_edit_web_safe_colour');
	}

	public function delete_web_safe_colour($colour=FALSE)
	{
		$this->debug_helper->_error_not_implemented('delete_web_safe_colour');
	}
	
} // end Web_safe_colours controller class