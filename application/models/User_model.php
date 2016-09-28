<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: User_model.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 28th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class User_model extends CI_Model
{
    public function get_all()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_by_username($username = FALSE)
    {
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->row_array();
    }

    public function get_by_user_id($user_id = FALSE)
    {
        $query = $this->db->get_where('user', array('user_id' => $user_id));
        return $query->row_array();
    }

    public function get_all_limit_offset($limit, $offset)
    {
        $this->db->order_by('user_id');
        $query = $this->db->get('user', $limit, $offset);
        return $query->result_array();
    }

    public function count_all()
    {
        return $this->db->count_all('user');
    }

    public function insert($user)
    {
        $temp_array = array(
            'username' => $user['username'],
            'password_hash' => $user['password_hash'],
            'name' => $user['name'],
            'access' => $user['access'],
            'status' => $user['status']
        );

        $now = new DateTime('now', new DateTimeZone(DATE_TIME_ZONE));
        $this->db->set('last_updated', $now->format('c'));
        $this->db->insert('user', $temp_array);
        return $this->db->insert_id();
    }

    public function update($user)
    {
        $temp_array = array(
            'username' => $user['username'],
            'password_hash' => $user['password_hash'],
            'name' => $user['name'],
            'access' => $user['access'],
            'status' => $user['status']
        );

        $now = new DateTime('now', new DateTimeZone(DATE_TIME_ZONE));
        $this->db->set('last_updated', $now->format('c'));
        $this->db->update('user', $temp_array, array('user_id' => $user['user_id']));
        return $this->db->affected_rows();
    }

    public function delete_by_user_id($user_id = FALSE)
    {
        if ($user_id !== FALSE)
        {
            $this->db->delete('user', array('user_id' => $user_id));
            return $this->db->affected_rows();
        }
        else
        {
            return 0;
        }
    }

    public function delete_by_username($username = FALSE)
    {
        if ($username !== FALSE)
        {
            $this->db->delete('user', array('username' => $username));
            return $this->db->affected_rows();
        }
        else
        {
            return 0;
        }
    }

    public function get_all_user_ids()
    {
        $users = $this->get_all();
        if($users !== FALSE)
        {
            $user_ids = array();
            foreach($users as $user)
            {
                $user_ids[] = $user['user_id'];
            }

            return $user_ids;
        }
        else
        {
            return 0;
        }
    }

    public function get_all_active_user_ids()
    {
        $this->db->select('user_id');
        $this->db->from('user');
        $this->db->where('status = ', 'Active');
        $this->db->order_by('user_id');
        $query = $this->db->get();

        if($query !== FALSE)
        {
            $user_ids = array();
            foreach($query->result_array() as $user)
            {
                $user_ids[] = $user['user_id'];
            }
            return $user_ids;
        }
        else
        {
            return 0;
        }
    }

    public function _get_access_array()
    {
        return array(
            'A' => 'Administrator',
            'C' => 'Client'
        );
    }

    public function _get_status_array()
    {
        return array(
            'Active',
            'Inactive'
        );
    }

} //end User_model class