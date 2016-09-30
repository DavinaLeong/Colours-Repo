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
        $this->debug_helper->_error_page_not_implemented('edit_personal_profile');
    }

    private function _set_rules_edit_personal_profile()
    {
        $this->debug_helper->_error_not_implemented('_set_rules_personal_profile');
    }

    private function _prepare_edit_personal_profile($personal_profile)
    {
        $this->debug_helper->_error_not_implemented('_prepare_edit_personal_profile');
    }

    public function change_password()
    {
        $this->debug_helper->_error_page_not_implemented('change_password');
    }

    private function _set_rules_change_password()
    {
        $this->debug_helper->_error_not_implemented('_set_rules_change_password');
    }
	
} // end Personal_profile controller class