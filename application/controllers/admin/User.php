<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: User.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 29th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('User_model');
        $this->load->library('debug_helper');
	}

    public function browse_user()
    {
        $this->User_log_model->validate_access();

        $access_array = $this->User_model->_get_access_array();
        $users = $this->User_model->get_all();
        foreach($users as $key=>$user)
        {
            $user['access_str'] = $access_array[$user['access']];
            $users[$key] = $user;
        }
        $data = array(
            'page_name' => 'Browse Users',
            'users' => $users
        );
        $this->load->view('admin/user/browse_user_page', $data);
    }

    public function new_user()
    {
        $this->User_log_model->validate_access();
        $this->debug_helper->_error_page_not_implemented('new_user');
    }

    private function _set_rules_new_user()
    {
        $this->debug_helper->_error_not_implemented('_set_rules_new_user');
    }

    private function _prepare_new_user()
    {
        $this->debug_helper->_error_not_implemented('_prepare_new_user');
    }

    public function edit_user($user_id)
    {
        $this->User_log_model->validate_access();
        $this->debug_helper->_error_page_not_implemented('edit_user');
    }

    private function _set_rules_edit_user()
    {
        $this->debug_helper->_error_not_implemented('_set_rules_edit_user');
    }

    private function _prepare_edit_user()
    {
        $this->debug_helper->_error_not_implemented('_prepare_edit_user');
    }

    public function view_user($user_id)
    {
        $this->User_log_model->validate_access();
        $this->debug_helper->_error_page_not_implemented('view_user');
    }
	
} // end User controller class