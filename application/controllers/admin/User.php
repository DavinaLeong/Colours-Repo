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
	}

    public function browse_access()
    {
        $this->User_log_model->validate_access_admin();
        $data = array(
            'access_options' => $this->User_model->_get_access_colours_array()
        );
        $this->load->view('admin/user/browse_access_page', $data);
    }

    public function browse_user()
    {
        $this->User_log_model->validate_access();

        $access_array = $this->User_model->_get_access_colours_array();
        $users = $this->User_model->get_all();
        foreach($users as $key=>$user)
        {
            $user['access_str'] = $access_array[$user['access']]['name'];
            $user['access_col'] = $access_array[$user['access']]['hex'];
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
            if($user_id = $this->User_model->insert($this->_prepare_new_user_array()))
            {
                $this->User_log_model->log_message('New User record CREATED. | user_id: ' . $user_id);
                $this->session->set_userdata('message', 'New User record <mark>created</mark>/');
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
            'trim|required|alpha_dash|is_unique[user.username]|max_length[512]');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[6]|max_length[512]');
        $this->form_validation->set_rules('password', 'Password',
            'trim|required|min_length[6]|max_length[512]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password',
            'trim|required|min_length[6]|max_length[512]|matches[password]');

        $access_str = implode(',', array_keys($this->User_model->_get_access_array()));
        $this->form_validation->set_rules('access', 'Access', 'trim|required|in_list[' . $access_str . ']|max_length[512]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[Active]|max_length[512]');
    }

    private function _prepare_new_user_array()
    {
        $user['username'] = $this->input->post('username');
        $user['name'] = $this->input->post('name');
        $user['password_hash'] = password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT);
        $user['access'] = $this->input->post('access');
        $user['status'] = $this->input->post('status');

        return $user;
    }

    public function edit_user($user_id=FALSE)
    {
        $this->User_log_model->validate_access();
        $this->load->library('form_validation');

        $user = $this->User_model->get_by_id($user_id);
        if($user !== FALSE)
        {
            $this->_set_rules_edit_user($user);
            if($this->form_validation->run())
            {
                if($user = $this->User_model->update($this->_prepare_edit_user_array($user)))
                {
                    $this->User_log_model->log_message('User record UPDATED. | user_id: ' . $user_id);
                    $this->session->set_userdata('message', 'User record <mark>updated</mark>.');

                    if($user_id == $this->session->userdata('user_id'))
                    {
                        $this->session->set_userdata('username', $this->input->post('username'));
                        $this->session->set_userdata('name', $this->input->post('name'));
                    }
                    redirect('admin/user/view_user/' . $user_id);
                }
                else
                {
                    $this->User_log_model->log_message('Unable to UPDATE User record. | user_id: ' . $user_id);
                    $this->session->set_userdata('message', '<mark>Unable</mark> to update User record.');
                }
            }

            $access_options = $this->User_model->_get_access_array();
            $user['access_str'] = $this->User_model->_get_access_colours_array()[$user['access']]['name'];
            $user['access_col'] = $this->User_model->_get_access_colours_array()[$user['access']]['hex'];
            $data = array(
                'user' => $user,
                'access_options' => $access_options,
                'status_options' => $this->User_model->_get_status_array()
            );
            $this->load->view('admin/user/edit_user_page', $data);
        }
        else
        {
            $this->session->set_userdata('message', 'User record not found.');
            redirect('admin/user/browse_use');
        }
    }

    private function _set_rules_edit_user($user=FALSE)
    {
        if($user['username'] == $this->input->post('username'))
        {
            $this->form_validation->set_rules('username', 'Username',
                'trim|required|alpha_dash|max_length[512]');
        }
        else
        {
            $this->form_validation->set_rules('username', 'Username',
                'trim|required|alpha_dash|is_unique[user.username]|max_length[512]');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[512]');

        $access_str = implode(',', array_keys($this->User_model->_get_access_array()));
        $this->form_validation->set_rules('access', 'Access', 'trim|required|in_list[' . $access_str . ']|max_length[512]');
        $status_str = implode(',', $this->User_model->_get_status_array());
        $this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[' . $status_str . ']|max_length[512]');
    }

    private function _prepare_edit_user_array($user)
    {
        $user['username'] = $this->input->post('username');
        $user['name'] = $this->input->post('name');
        $user['access'] = $this->input->post('access');
        $user['status'] = $this->input->post('status');

        return $user;
    }

    public function view_user($user_id=FALSE)
    {
        $this->User_log_model->validate_access();
        $user = $this->User_model->get_by_id($user_id);
        if($user !== FALSE)
        {
            $user['access_str'] = $this->User_model->_get_access_colours_array()[$user['access']]['name'];
            $user['access_col'] = $this->User_model->_get_access_colours_array()[$user['access']]['hex'];
            $data = array(
                'user' => $user
            );
            $this->load->view('admin/user/view_user_page', $data);
        }
        else
        {
            $this->session->set_userdata('message', 'User record not found.');
            redirect('admin/user/browse_user');
        }
    }

    public function reset_password($user_id=FALSE)
    {
        $this->User_log_model->validate_access_admin();
        $user = $this->User_model->get_by_id($user_id);
        if($user !== FALSE)
        {
            $this->load->library('form_validation');
            $this->_set_rules_reset_password();

            if($this->form_validation->run())
            {
                $user['password_hash'] = password_hash(trim($this->input->post('password')), PASSWORD_DEFAULT);
                if($user = $this->User_model->update($user))
                {
                    $this->User_log_model->log_message('User\'s password UPDATED. | user_id: ' . $user_id);
                    $this->session->set_userdata('message', 'User\'s password <mark>updated</mark>.');
                    redirect('admin/user/view_user/' . $user_id);
                }
                else
                {
                    $this->User_log_model->log_message('Unable to UPDATE User\'s password. | user_id: ' . $user_id);
                    $this->session->set_userdata('message', '<mark>Unable</mark> to update User\'s password.');
                }
            }

            $user['access_str'] = $this->User_model->_get_access_colours_array()[$user['access']]['name'];
            $user['access_col'] = $this->User_model->_get_access_colours_array()[$user['access']]['hex'];
            $data = array(
                'user' => $user
            );
            $this->load->view('admin/user/reset_password_page', $data);
        }
        else
        {
            $this->session->set_userdata('message', 'User record not found.');
            redirect('admin/user/browse_user');
        }
    }

    private function _set_rules_reset_password()
    {
        $this->form_validation->set_rules('new_password', 'New Password',
            'trim|required|min_length[6]|max_length[512]');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password',
            'trim|required|min_length[6]|max_length[512]|matches[new_password]');
    }
	
} // end User controller class