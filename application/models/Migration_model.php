<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Migration_model.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 08 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Migration_model extends CI_Model
{
    public function reset()
    {
        $this->load->library('migration');
        $this->migration->version('0');
        $this->migration->current();
    }

    public function get_version_from_db()
    {
        $query = $this->db->get('migrations');
        return $query->row_array()['version'];
    }
}