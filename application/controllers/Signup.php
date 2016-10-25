<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Signup.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 25 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('User_model');
		$this->load->library('form_validation');

		$this->_set_rules_signup();
		if($this->form_validation->run())
		{
			if($user_id = $this->User_model->insert($this->prepare_signup_user()))
			{
				redirect('signup/success');
			}
			else
			{
				redirect('signup/error');
			}
		}

		$this->load->view('signup/index_page');
	}

	private function _set_rules_signup()
	{
		$this->form_validation->set_rules('username', 'Username',
			'trim|required|alpha_dash|is_unique[user.username]|max_length[512]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[512]');
		$this->form_validation->set_rules('password', 'Password',
			'trim|required|min_length[6]|max_length[512]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password',
			'trim|required|min_length[6]|max_length[512]|matches[password]');
	}

	private function prepare_signup_user()
	{
		$user = array();
		$user['username'] = $this->input->post('username');
		$user['name'] = $this->input->post('name');
		$user['password_hash'] = password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT);
		$user['access'] = 'U';
		$user['status'] = 'Active';

		return $user;
	}

	public function success()
	{
		$this->load->view('signup/success_page');
	}

	public function error()
	{
		$this->load->view('signup/error_page');
	}
	
} // end Signup controller class