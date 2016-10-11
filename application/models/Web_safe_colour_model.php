<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Web_safe_colours_model.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Web_safe_colour_model extends CI_Model
{
    public function count_all()
    {
        return $this->db->count_all(TABLE_WEB_SAFE_COLOUR);
    }

    public function get_all()
    {
        $this->db->order_by('colour_name');
        $query = $this->db->get(TABLE_WEB_SAFE_COLOUR);
        return $query->result_array();
    }

    public function get_by_id($web_safe_colour_id=FALSE)
    {
        $query = $this->db->get_where(TABLE_WEB_SAFE_COLOUR, array('colour_id' => $web_safe_colour_id));
        return $query->row_array();
    }

    public function insert($web_safe_colour=FALSE)
    {
        if($web_safe_colour !== FALSE)
        {
            $temp_array = array(
                'colour_name' => $web_safe_colour['colour_name'],
                'colour_selector' => $web_safe_colour['colour_selector'],
                'red_255' => $web_safe_colour['red_255'],
                'green_255' => $web_safe_colour['green_255'],
                'blue_255' => $web_safe_colour['blue_255'],
                'red_ratio' => $web_safe_colour['red_ratio'],
                'green_ratio' => $web_safe_colour['green_ratio'],
                'blue_ratio' => $web_safe_colour['blue_ratio'],
                'hex' => $web_safe_colour['hex'],
                'colour_type' => $web_safe_colour['colour_type']
            );

            $this->db->set('date_added', $this->datetime_helper->now('c'));
            $this->db->set('last_updated', $this->datetime_helper->now('c'));
            $this->db->insert(TABLE_WEB_SAFE_COLOUR, $temp_array);
            return $this->db->insert_id();
        }
        else
        {
            return 0;
        }
    }

    public function update($web_safe_colour=FALSE)
    {
        if($web_safe_colour !== FALSE)
        {
            $temp_array = array(
                'colour_name' => $web_safe_colour['colour_name'],
                'colour_selector' => $web_safe_colour['colour_selector'],
                'red_255' => $web_safe_colour['red_255'],
                'green_255' => $web_safe_colour['green_255'],
                'blue_255' => $web_safe_colour['blue_255'],
                'red_ratio' => $web_safe_colour['red_ratio'],
                'green_ratio' => $web_safe_colour['green_ratio'],
                'blue_ratio' => $web_safe_colour['blue_ratio'],
                'hex' => $web_safe_colour['hex'],
                'colour_type' => $web_safe_colour['colour_type']
            );

            $this->db->set('last_updated', $this->datetime_helper->now('c'));
            $this->db->update(TABLE_WEB_SAFE_COLOUR, $temp_array, array('colour_id' => $web_safe_colour['colour_id']));
            return $this->db->affected_rows();
        }
        else
        {
            return 0;
        }
    }

    public function delete_by_id($web_safe_colour_id=FALSE)
    {
        if($web_safe_colour_id !== FALSE)
        {
            $this->db->delete(TABLE_WEB_SAFE_COLOUR, array('colour_id' => $web_safe_colour_id));
            return $this->db->affected_rows();
        }
        else
        {
            return 0;
        }
    }

    public function get_all_ids()
    {
        $web_safe_colours = $this->get_all();
        $id_array = array();
        foreach($web_safe_colours as $key=>$colour)
        {
            $id_array[] = $colour['colour_id'];
        }
        return $id_array;
    }

    public function prepare_for_export()
    {
        $this->db->order_by('colour_type', 'asc');
        $this->db->order_by('colour_name', 'asc');
        $this->db->order_by('hex', 'asc');

        $query = $this->db->get('web_safe_colour');
        return $query->result_array();
    }

    public function prepare_for_export_default()
    {
        $this->db->order_by('colour_name', 'asc');
        $this->db->order_by('hex', 'asc');

        $query = $this->db->get_where('web_safe_colour', array('colour_type' => 'Default'));
        return $query->result_array();
    }

    public function prepare_for_export_others()
    {
        $this->db->order_by('colour_name', 'asc');
        $this->db->order_by('hex', 'asc');

        $query = $this->db->get_where('web_safe_colour', array('colour_type' => 'Others'));
        return $query->result_array();
    }

    public function _get_colour_types_array()
    {
        return array(
            'Default',
            'Others'
        );
    }

} // end Web_safe_colours_model class