<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: 20161121112132_init_standard_colours.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 21 Nov 2016
	
	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]
	
***********************************************************************************/
/* Migration version: 
 * 21 Nov 2016, 11:21AM
 * 20161121112132
 */
class Migration_Init_standard_colours extends CI_Migration
{
	// Public Functions ----------------------------------------------------------------
	public function up()
	{
		echo '<p>Create Tables</p><hr/><code>';
        $this->load->model('Script_runner_model');
        echo $this->Script_runner_model->run_script($this->_create_tables_script())['output_str'];
        echo '</code><hr/>';
        echo '<p>Tables Created</p><hr/>';
	}
	
	public function down()
	{
        echo '<p>Drop Tables</p><hr/><code>';
        $this->load->model('Script_runner_model');
        echo $this->Script_runner_model->run_script($this->_drop_tables_script())['output_str'];
        echo '</code><hr/>';
        echo '<p>Tables Dropped</p><hr/>';
	}
	
	// Private Functions ---------------------------------------------------------------
	private function _create_tables_script()
	{
        $sql = "
            DROP TABLE IF EXISTS `standard_colour`;
            CREATE TABLE IF NOT EXISTS `standard_colour` (
              `colour_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `colour_name` varchar(512) DEFAULT NULL,
              `colour_selector` varchar(512) DEFAULT NULL,
              `red_255` int(10) unsigned DEFAULT NULL,
              `green_255` int(10) unsigned DEFAULT NULL,
              `blue_255` int(10) unsigned DEFAULT NULL,
              `red_ratio` decimal(10,2) unsigned DEFAULT NULL,
              `green_ratio` decimal(10,2) unsigned DEFAULT NULL,
              `blue_ratio` decimal(10,2) unsigned DEFAULT NULL,
              `hex` varchar(7) DEFAULT NULL,
              `hue` int(10) unsigned DEFAULT NULL,
              `saturation` decimal(10,2) unsigned DEFAULT NULL,
              `brightness` decimal(10,2) unsigned DEFAULT NULL,
              `colour_type` varchar(512) DEFAULT NULL,
              `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
              `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`colour_id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
        ";

        return $sql;
	}

    private function _drop_tables_script()
    {
        $sql = "
            DROP TABLE IF EXISTS `standard_colour`;
        ";

        return $sql;
    }
	
} // end 20161121112132_init_standard_colours class