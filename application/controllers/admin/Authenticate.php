<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Authenticate.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 23rd Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Authenticate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('Debug_helper');
        $this->_create_new_user();
	}

    public function index()
    {
        redirect('admin/authenticate/login');
    }

    public function login()
    {
        $this->Debug_helper->_error_not_implemented('login');
    }

    public function logout()
    {
        $this->Debug_helper->_error_not_implemented('logout');
    }

    public function start()
    {
        $this->Debug_helper->_error_not_implemented('login');
    }

    private function _create_new_user($username='user', $name='User', $password='password')
    {
        $this->load->model('User_model');
        $user = array(
            'username' => $username,
            'name' => $name,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'access' => 'A',
            'status' => 'Active'
        );
        $new_user_id = $this->User_model->insert($user);
        $this->User_log_model->log_message('New User record created. | ' . $new_user_id);
    }
	
} // end Authenticate controller class