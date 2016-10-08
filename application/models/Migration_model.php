<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    public function _get_versions_array()
    {
        // Add version numbers as new migration files are created
        return array(
            '20161008172100',   // 08 Oct 2016, 5:21PM
            '20161008175800'    // 08 Oct 2016, 5:58PM
        );
    }
}