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
            'users' => $users
        );
        $this->load->view('admin/user/browse_user_page', $data);
    }

    public function new_user()
    {
        $this->User_log_model->validate_access();

        $this->load->library('form_validation');
        $this->_set_rules_new_user();

        if($this->form_validation->run())
        {
            if($user_id = $this->User_model->insert($this->_prepare_new_user()))
            {
                $this->User_log_model->log_message('New User record CREATED. | user_id: ' . $user_id);
                $this->session->set_userdata('New User record <mark>created</mark>/');
                redirect('admin/user/view_user/' . $user_id);
            }
            else
            {
                $this->User_log_model->log_message('Unable to CREATE new User.');
                $this->session->set_userdata('<mark>Unable</mark> to create new User.');
            }
        }

        $data = array(
            'access_options' => $this->User_model->_get_access_array()
        );
        $this->load->view('admin/user/new_user_page', $data);
    }

    private function _set_rules_new_user()
    {
        $this->form_validation->set_rules('username', 'Username',
            'trim|required|alpha_numeric|is_unique[user.username]|max_length[512]');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[512]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[512]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|max_length[512]|matches[password]');

        $access_str = implode(',', array_keys($this->User_model->_get_access_array()));
        $this->form_validation->set_rules('access', 'Access', 'trim|required|in_list[' . $access_str . ']|max_length[512]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[Active]|max_length[512]');
    }

    private function _prepare_new_user()
    {
        $user['username'] = $this->input->post('username');
        $user['name'] = $this->input->post('name');
        $user['password_hash'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $user['access'] = $this->input->post('access');
        $user['status'] = $this->input->post('status');

        return $user;
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