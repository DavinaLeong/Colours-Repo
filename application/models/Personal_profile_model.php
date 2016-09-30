<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Personal_profile_model.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Personal_profile_model extends CI_Model
{
    public function get()
    {
        if($this->session->userdata('user_id'))
        {
            $this->db->select('username, name, password_hash, last_updated');
            $this->db->from('user');
            $this->db->where('user_id = ', $this->session->userdata('user_id'));

            $query = $this->db->get();
            return $query->row_array();
        }
        else
        {
            return FALSE;
        }
    }

    public function update($personal_profile)
    {
        if($this->session->userdata('user_id'))
        {
            $temp_array = array(
                'username' => $personal_profile['username'],
                'name' => $personal_profile['name']
            );
            $now = new DateTime('now', new DateTimeZone(DATE_TIME_ZONE));
            $this->db->set('last_updated', $now->format('c'));
            $this->db->update('user', $temp_array, array('user_id' => $this->session->userdata('user_id')));
            return $this->db->affected_rows();
        }
        else
        {
            return FALSE;
        }
    }

    public function update_password($personal_profile)
    {
        if($this->session->userdata('user_id'))
        {
            $temp_array = array(
                'password_hash' => $personal_profile['password_hash'],
            );
            $now = new DateTime('now', new DateTimeZone(DATE_TIME_ZONE));
            $this->db->set('last_updated', $now->format('c'));
            $this->db->update('user', $temp_array, array('user_id' => $this->session->userdata('user_id')));
            return $this->db->affected_rows();
        }
        else
        {
            return FALSE;
        }
    }

} // end Personal_profile_model class