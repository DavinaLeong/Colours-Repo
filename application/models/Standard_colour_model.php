<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Standard_colour_model extends CI_Model
{
    const TABLE_NAME = 'standard_colour';

	public function count_all()
    {
        return $this->db->count_all($this::TABLE_NAME);
    }

    public function get_all()
    {
        $this->db->order_by('colour_name', 'asc');
        $query = $this->db->get_all($this::TABLE_NAME);
        return $query->result_array();
    }

    public function get_by_colour_id($colour_id=FALSE)
    {

    }

    public function get_by_colour_name($colour_name=FALSE)
    {

    }

    public function insert($colour=FALSE)
    {

    }

    public function update($colour=FALSE)
    {

    }

    public function delete_by_colour_id($colour_id=FALSE)
    {

    }

    public function get_all_ids()
    {

    }

    public function prepare_for_export_all()
    {

    }

    public function prepare_for_export_by_colour_type($colour_type=FALSE)
    {

    }

    public function _get_field_names()
    {
        return $this->db->list_fields($this::TABLE_NAME);
    }

    public function _get_colour_types_array()
    {
        return array(
            'Primary',
            'Secondary',
            'Tertiary',
            'Other'
        );
    }

} // end Standard_colour_model class