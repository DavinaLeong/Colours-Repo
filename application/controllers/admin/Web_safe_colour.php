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
		$this->_set_rules_new_web_safe_colour();

		if($this->form_validation->run())
		{
			if($colour_id = $this->Web_safe_colour_model->insert($this->_prepare_new_web_safe_colour_array()))
			{
				$this->User_log_model->log_message('New Web Safe Colour CREATED. | colour_id: ' . $colour_id);
				$this->session->set_userdata('message', 'New Web Safe Colour <mark>created</mark>.');
				redirect('admin/web_safe_colour/view_web_safe_colour/' . $colour_id);
			}
			else
			{
				$this->User_log_model->log_message('Unable to CREATE Web Safe Colour.');
				$this->session->set_userdata('message', '<mark>Unable</mark> to create Web Safe Colour.');
			}
		}

		$data = array(
			'colour_type_options' => $this->Web_safe_colour_model->_get_colour_types_array()
		);
		$this->load->view('admin/web_safe_colour/new_web_safe_colour_page', $data);
	}

	private function _set_rules_new_web_safe_colour()
	{
		$this->form_validation->set_rules('colour_name', 'Name', 'trim|required|min_length[3]|max_length[512]');
		$this->form_validation->set_rules('colour_selector', 'Selector', 'trim|required|alpha_dash|min_length[3]|max_length[512]');
		$colour_types_str = implode(',', $this->Web_safe_colour_model->_get_colour_types_array());
		$this->form_validation->set_rules('colour_type', 'Colour Type', 'trim|required|in_list[' . $colour_types_str .']|max_length[512]');
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