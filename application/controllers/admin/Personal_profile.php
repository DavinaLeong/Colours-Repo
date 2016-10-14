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

    public function upload_profile_picture()
    {
        $this->User_log_model->validate_access();

        $personal_profile = $this->Personal_profile_model->get();
        $upload_config['upload_path'] = UPLOAD_FOLDER;
        $upload_config['allowed_types'] = 'gif|jpg|jpeg|png|bmp';
        $upload_config['max_width'] = '512';
        $upload_config['max_height'] = '512';
        $upload_config['max_height'] = '512';
        $upload_config['max_size'] = '2048';

        $this->load->library('upload', $upload_config);

        if($this->upload->do_upload('profile_picture'))
        {
            $file_upload_data = $this->upload->data();
            if($personal_profile['image_url'])
            {
                $this->load->helper('file');
                delete_files(UPLOADS_FOLDER . $personal_profile['image_url']);
                $this->User_log_model->log_message('Old Profile Picture delete.');
            }

            $personal_profile['image_url'] = UPLOADS_FOLDER . $file_upload_data['file_name'];
            $personal_profile['image_width'] = $file_upload_data['image_width'];
            $personal_profile['image_height'] = $file_upload_data['image_height'];
            $personal_profile['image_type'] = $file_upload_data['image_type'];

            $this->Personal_profile_model->upload_profile_picture($personal_profile);

            $this->User_log_model->log_message('Profile Picture UPLOADED successfully');
            $this->session->set_userdata('message', 'Personal Picture <mark>uploaded</mark> successfully.');
            $this->session->unset_userdata('upload_errors');
            redirect('admin/personal_profile/view_personal_profile');
        }
        else
        {
            $this->User_log_model->log_message('Unable to UPLOAD Profile Picture.');
            $this->session->set_userdata('message', '<mark>Unable</mark> to upload Profile Picture.');
            $this->session->set_userdata('upload_errors', $this->upload->display_errors());
            redirect('admin/personal_profile/edit_personal_profile');
        }
    }
	
} // end Personal_profile controller class