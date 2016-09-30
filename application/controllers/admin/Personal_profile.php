<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Personal_profile.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Personal_profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Personal_profile_model');
        $this->load->library('Debug_helper');
	}

    public function view_personal_profile()
    {
        $this->User_log_model->validate_access();
        $personal_profile = $this->Personal_profile_model->get();
        if($personal_profile !== FALSE)
        {
            $data = array(
                'personal_profile' => $personal_profile
            );
            $this->load->view('admin/personal_profile/view_personal_profile_page', $data);
        }
        else
        {
            $this->session->set_userdata('message', 'Profile not found.');
            return('admin/authenticate/start');
        }
    }

    public function edit_personal_profile()
    {
        $this->User_log_model->validate_access();
        $personal_profile = $this->Personal_profile_model->get();
        if($personal_profile !== FALSE)
        {
            $this->load->library('form_validation');
            $this->_set_rules_edit_personal_profile($personal_profile);

            if($this->form_validation->run())
            {
                if($personal_profile = $this->Personal_profile_model->update($this->_prepare_edit_personal_profile($personal_profile)))
                {
                    $this->User_log_model->log_message('Personal Profile UPDATED.');
                    $this->session->set_userdata('message', 'Personal Profile <mark>updated</mark>.');
                    redirect('admin/personal_profile/view_personal_profile');
                }
                else
                {
                    $this->User_log_model->log_message('Unable to UPDATE Personal Profile.');
                    $this->session->set_userdata('message', '<mark>Unable</mark> to update Personal Profile.');
                }
            }

            $data = array(
                'personal_profile' => $personal_profile
            );
            $this->load->view('admin/personal_profile/edit_personal_profile_page', $data);
        }
        else
        {
            $this->session->set_userdata('message', 'Profile not found.');
            return('admin/authenticate/start');
        }
    }

    private function _set_rules_edit_personal_profile($personal_profile)
    {
        if($personal_profile['username'] == $this->input->post('username'))
        {
            $this->form_validation->set_rules('username', 'Username',
                'trim|required|alpha_numeric|max_length[512]');
        }
        else
        {
            $this->form_validation->set_rules('username', 'Username',
                'trim|required|alpha_numeric|is_unique[user.username]|max_length[512]');
        }
        $this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[512]');
    }

    private function _prepare_edit_personal_profile($personal_profile)
    {
        $personal_profile['username'] = $this->input->post('username');
        $personal_profile['name'] = $this->input->post('name');

        return $personal_profile;
    }

    public function change_password()
    {
        $this->User_log_model->validate_access();
        $personal_profile = $this->Personal_profile_model->get();
        if($personal_profile !== FALSE)
        {
            $this->load->library('form_validation');
            $this->_set_rules_change_password();

            if($this->form_validation->run())
            {
                if(password_verify($this->input->post('old_password'), $personal_profile['password_hash']))
                {
                    $personal_profile['password_hash'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
                    if($personal_profile = $this->Personal_profile_model->update_password($personal_profile))
                    {
                        $this->User_log_model->log_message('Password UPDATED.');
                        $this->session->set_userdata('message', 'Password <mark>updated</mark>.');
                        redirect('admin/personal_profile/view_personal_profile');
                    }
                    else
                    {
                        $this->User_log_model->log_message('Unable to UPDATE Password.');
                        $this->session->set_userdata('message', '<mark>Unable</mark> to update Password.');
                    }
                }
                else
                {
                    $this->session->set_userdata('message', 'Old Password is incorret.');
                }
            }

            $data = array(
                'personal_profile' => $personal_profile
            );
            $this->load->view('admin/personal_profile/change_password_page', $data);
        }
        else
        {
            $this->session->set_userdata('message', 'Profile not found.');
            return('admin/authenticate/start');
        }
    }

    private function _set_rules_change_password()
    {
        $this->form_validation->set_rules('old_password', 'Old Password',
            'trim|required|min_length[6]|max_length[512]');
        $this->form_validation->set_rules('new_password', 'New Password',
            'trim|required|min_length[6]|max_length[512]');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm New Password',
            'trim|required|min_length[6]|max_length[512]|matches[new_password]');
    }
	
} // end Personal_profile controller class