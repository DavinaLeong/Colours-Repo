<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: 20161010100706_all_web_colours.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 10 Oct 2016
	
	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]
	
***********************************************************************************/
/* Migration version: 
 * 10 Oct 2016, 10:07AM
 * 20161010100706
 */
class Migration_All_web_colours extends CI_Migration
{
	// Public Functions ----------------------------------------------------------------
	public function up()
	{
        //echo '<p>Create Tables</p><hr/><code>';
        //$this->load->model('Script_runner_model');
        //echo $this->Script_runner_model->run_script($this->_create_tables_script())['output_str'];
        //echo '</code><hr/>';
        $this->load->model('Script_runner_model');
        $this->Script_runner_model->run_script($this->_create_tables_script());
        echo '<p>Tables Created</p><hr/>';
        $this->_generate_users();
        $this->_generate_web_safe_colours();
	}
	
	public function down()
	{
        //echo '<p>Drop Tables</p><hr/><code>';
        //$this->load->model('Script_runner_model');
        //echo $this->Script_runner_model->run_script($this->_drop_tables_script())['output_str'];
        //echo '</code><hr/>';
        $this->load->model('Script_runner_model');
        $this->Script_runner_model->run_script($this->_drop_tables_script());
        echo '<p>Tables Dropped</p><hr/>';
	}
	
	// Private Functions ---------------------------------------------------------------
    private function _create_tables_script()
    {
        $sql = "
            DROP TABLE IF EXISTS `ci_sessions`;
            CREATE TABLE IF NOT EXISTS `ci_sessions` (
              `id` varchar(40) NOT NULL,
              `ip_address` varchar(45) NOT NULL,
              `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
              `data` blob NOT NULL,
              KEY `ci_sessions_timestamp` (`timestamp`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


            DROP TABLE IF EXISTS `user`;
            CREATE TABLE IF NOT EXISTS `user` (
              `user_id` int(11) NOT NULL AUTO_INCREMENT,
              `username` varchar(512) NOT NULL,
              `password_hash` varchar(512) NOT NULL,
              `name` varchar(512) DEFAULT NULL,
              `access` varchar(512) NOT NULL,
              `status` varchar(30) NOT NULL,
              `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`user_id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

            DROP TABLE IF EXISTS `user_log`;
            CREATE TABLE IF NOT EXISTS `user_log` (
              `ulid` int(11) NOT NULL AUTO_INCREMENT,
              `user_id` int(11) NOT NULL,
              `message` text NOT NULL,
              `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
              PRIMARY KEY (`ulid`)
            ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

            DROP TABLE IF EXISTS `web_safe_colour`;
            CREATE TABLE IF NOT EXISTS `web_safe_colour` (
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
            DROP TABLE IF EXISTS `ci_sessions`;

            DROP TABLE IF EXISTS `user`;

            DROP TABLE IF EXISTS `user_log`;

            DROP TABLE IF EXISTS `web_safe_colour`;
        ";

        return $sql;
    }

	private function _generate_users()
	{
        $this->load->model('User_model');
        $users = array(
            'default_admin' => array(
                'username' => 'admin',
                'name' => 'Default Admin',
                'password_hash' => password_hash('password', PASSWORD_DEFAULT),
                'image_filename' => NULL,
                'image_width' => NULL,
                'image_height' => NULL,
                'image_filetype' => NULL,
                'access' => 'A',
                'status' => 'Active'
            )
        );

        echo "<p>Generate Users</p>";
        foreach($users as $user)
        {
            $this->User_model->insert($user);
            echo "<div><small>User (" . $user['name'] . ", " . $user['access'] .  ") created.</small></div>";
        }
        echo "<hr />";
	}

    private function _generate_web_safe_colours()
    {
        $this->load->model('Web_safe_colour_model');
        // default colours
        $default_colours = array(
            'black' => array( 'colour_name' => 'Black', 'colour_selector' => 'Black', 'red_255' => 0, 'green_255' => 0, 'blue_255' => 0, 'red_ratio' => 0, 'green_ratio' => 0, 'blue_ratio' => 0, 'hex' => '#000000', 'colour_type' => 'Default' ),
            'white' => array( 'colour_name' => 'White', 'colour_selector' => 'White', 'red_255' => 255, 'green_255' => 255, 'blue_255' => 255, 'red_ratio' => 1, 'green_ratio' => 1, 'blue_ratio' => 1, 'hex' => '#FFFFFF', 'colour_type' => 'Default' ),
            'gray' => array('colour_name' => 'Gray', 'colour_selector' => 'Gray', 'red_255' => 128, 'green_255' => 128, 'blue_255' => 128, 'red_ratio' => 0.5, 'green_ratio' => 0.5, 'blue_ratio' => 0.5, 'hex' => '#888888', 'colour_type' => 'Default' ),
            'grey' => array( 'colour_name' => 'Grey', 'colour_selector' => 'Grey', 'red_255' => 128, 'green_255' => 128, 'blue_255' => 128, 'red_ratio' => 0.5, 'green_ratio' => 0.5, 'blue_ratio' => 0.5, 'hex' => '#888888', 'colour_type' => 'Default' ),
            'red' => array( 'colour_name' => 'Red', 'colour_selector' => 'Red', 'red_255' => 255, 'green_255' => 0, 'blue_255' => 0, 'red_ratio' => 1, 'green_ratio' => 0, 'blue_ratio' => 0, 'hex' => '#FF0000', 'colour_type' => 'Default' ),
            'lime' => array( 'colour_name' => 'Lime', 'colour_selector' => 'Lime', 'red_255' => 0, 'green_255' => 255, 'blue_255' => 0, 'red_ratio' => 0, 'green_ratio' => 1, 'blue_ratio' => 0, 'hex' => '#00FF00', 'colour_type' => 'Default' ),
            'blue' => array( 'colour_name' => 'Blue', 'colour_selector' => 'Blue', 'red_255' => 0, 'green_255' => 0, 'blue_255' => 255, 'red_ratio' => 0, 'green_ratio' => 0, 'blue_ratio' => 1, 'hex' => '#0000FF', 'colour_type' => 'Default' ),
            'yellow' => array( 'colour_name' => 'Yellow', 'colour_selector' => 'Yellow', 'red_255' => 255, 'green_255' => 255, 'blue_255' => 0, 'red_ratio' => 1, 'green_ratio' => 1, 'blue_ratio' => 0, 'hex' => '#FFFF00', 'colour_type' => 'Default' ),
            'aqua' => array( 'colour_name' => 'Aqua', 'colour_selector' => 'Aqua', 'red_255' => 0, 'green_255' => 255, 'blue_255' => 255, 'red_ratio' => 0, 'green_ratio' => 1, 'blue_ratio' => 1, 'hex' => '#00FFFF', 'colour_type' => 'Default' ),
            'cyan' => array( 'colour_name' => 'Cyan', 'colour_selector' => 'Cyan', 'red_255' => 0, 'green_255' => 255, 'blue_255' => 255, 'red_ratio' => 0, 'green_ratio' => 1, 'blue_ratio' => 1, 'hex' => '#00FFFF', 'colour_type' => 'Default' ),
            'magenta' => array( 'colour_name' => 'Magenta', 'colour_selector' => 'Magenta', 'red_255' => 255, 'green_255' => 0, 'blue_255' => 255, 'red_ratio' => 1, 'green_ratio' => 0, 'blue_ratio' => 1, 'hex' => '#FF00FF', 'colour_type' => 'Default' ),
            'fuchsia' => array( 'colour_name' => 'Fuchsia', 'colour_selector' => 'Fuchsia', 'red_255' => 255, 'green_255' => 0, 'blue_255' => 255, 'red_ratio' => 1, 'green_ratio' => 0, 'blue_ratio' => 1, 'hex' => '#FF00FF', 'colour_type' => 'Default' )
        );

        echo "<p>Generate Default Colours</p>";
        foreach($default_colours as $colour)
        {
            $this->Web_safe_colour_model->insert($colour);
            echo "<div><small>Colour (" . $colour['colour_name'] . ", " . $colour['colour_type'] . ") created.</small></div>";
        }
        echo "<br/>";

        // Others Colours
        $other_colours = array(
            'aliceblue' => array ( 'colour_name' => 'Alice Blue', 'colour_selector' => 'AliceBlue', 'red_255' => '240', 'green_255' => '248', 'blue_255' => '255', 'red_ratio' => '0.94', 'green_ratio' => '0.97', 'blue_ratio' => '1.00', 'hex' => '#F0F8FF', 'colour_type' => 'Others' ),
            'antiquewhite' => array ( 'colour_name' => 'Antique White', 'colour_selector' => 'AntiqueWhite', 'red_255' => '250', 'green_255' => '235', 'blue_255' => '215', 'red_ratio' => '0.98', 'green_ratio' => '0.92', 'blue_ratio' => '0.84', 'hex' => '#FAEBD7', 'colour_type' => 'Others' ),
            'aquamarine' => array ( 'colour_name' => 'Aquamarine', 'colour_selector' => 'Aquamarine', 'red_255' => '127', 'green_255' => '255', 'blue_255' => '212', 'red_ratio' => '0.50', 'green_ratio' => '1.00', 'blue_ratio' => '0.83', 'hex' => '#7FFFD4', 'colour_type' => 'Others' ),
            'azure' => array ( 'colour_name' => 'Azure', 'colour_selector' => 'Azure', 'red_255' => '240', 'green_255' => '255', 'blue_255' => '255', 'red_ratio' => '0.94', 'green_ratio' => '1.00', 'blue_ratio' => '1.00', 'hex' => '#F0FFFF', 'colour_type' => 'Others' ),
            'beige' => array ( 'colour_name' => 'Beige', 'colour_selector' => 'Beige', 'red_255' => '245', 'green_255' => '245', 'blue_255' => '220', 'red_ratio' => '0.96', 'green_ratio' => '0.96', 'blue_ratio' => '0.86', 'hex' => '#F5F5DC', 'colour_type' => 'Others' ),
            'bisque' => array ( 'colour_name' => 'Bisque', 'colour_selector' => 'Bisque', 'red_255' => '255', 'green_255' => '228', 'blue_255' => '196', 'red_ratio' => '1.00', 'green_ratio' => '0.89', 'blue_ratio' => '0.77', 'hex' => '#FFE4C4', 'colour_type' => 'Others' ),
            'blanchedalmond' => array ( 'colour_name' => 'Blanched Almond', 'colour_selector' => 'BlanchedAlmond', 'red_255' => '255', 'green_255' => '235', 'blue_255' => '205', 'red_ratio' => '1.00', 'green_ratio' => '0.92', 'blue_ratio' => '0.80', 'hex' => '#FFEBCD', 'colour_type' => 'Others' ),
            'blueviolet' => array ( 'colour_name' => 'Blue Violet', 'colour_selector' => 'BlueViolet', 'red_255' => '138', 'green_255' => '43', 'blue_255' => '226', 'red_ratio' => '0.54', 'green_ratio' => '0.17', 'blue_ratio' => '0.89', 'hex' => '#8A2BE2', 'colour_type' => 'Others' ),
            'brown' => array ( 'colour_name' => 'Brown', 'colour_selector' => 'Brown', 'red_255' => '165', 'green_255' => '42', 'blue_255' => '42', 'red_ratio' => '0.65', 'green_ratio' => '0.16', 'blue_ratio' => '0.16', 'hex' => '#A52A2A', 'colour_type' => 'Others' ),
            'burlywood' => array ( 'colour_name' => 'Burly Wood', 'colour_selector' => 'BurlyWood', 'red_255' => '222', 'green_255' => '184', 'blue_255' => '135', 'red_ratio' => '0.87', 'green_ratio' => '0.72', 'blue_ratio' => '0.53', 'hex' => '#DEB887', 'colour_type' => 'Others' ),
            'cadetblue' => array ( 'colour_name' => 'Cadet Blue', 'colour_selector' => 'CadetBlue', 'red_255' => '95', 'green_255' => '158', 'blue_255' => '160', 'red_ratio' => '0.37', 'green_ratio' => '0.62', 'blue_ratio' => '0.63', 'hex' => '#5F9EA0', 'colour_type' => 'Others' ),
            'chartreuse' => array ( 'colour_name' => 'Chartreuse', 'colour_selector' => 'Chartreuse', 'red_255' => '127', 'green_255' => '255', 'blue_255' => '0', 'red_ratio' => '0.50', 'green_ratio' => '1.00', 'blue_ratio' => '0.00', 'hex' => '#7FFF00', 'colour_type' => 'Others' ),
            'chocolate' => array ( 'colour_name' => 'Chocolate', 'colour_selector' => 'Chocolate', 'red_255' => '210', 'green_255' => '105', 'blue_255' => '30', 'red_ratio' => '0.82', 'green_ratio' => '0.41', 'blue_ratio' => '0.12', 'hex' => '#D2691E', 'colour_type' => 'Others' ),
            'coral' => array ( 'colour_name' => 'Coral', 'colour_selector' => 'Coral', 'red_255' => '255', 'green_255' => '127', 'blue_255' => '80', 'red_ratio' => '1.00', 'green_ratio' => '0.50', 'blue_ratio' => '0.31', 'hex' => '#FF7F50', 'colour_type' => 'Others' ),
            'cornflowerblue' => array ( 'colour_name' => 'Cornflower Blue', 'colour_selector' => 'CornflowerBlue', 'red_255' => '100', 'green_255' => '149', 'blue_255' => '237', 'red_ratio' => '0.39', 'green_ratio' => '0.58', 'blue_ratio' => '0.93', 'hex' => '#6495ED', 'colour_type' => 'Others' ),
            'cornsilk' => array ( 'colour_name' => 'Cornsilk', 'colour_selector' => 'Cornsilk', 'red_255' => '255', 'green_255' => '248', 'blue_255' => '220', 'red_ratio' => '1.00', 'green_ratio' => '0.97', 'blue_ratio' => '0.86', 'hex' => '#FFF8DC', 'colour_type' => 'Others' ),
            'crimson' => array ( 'colour_name' => 'Crimson', 'colour_selector' => 'Crimson', 'red_255' => '220', 'green_255' => '20', 'blue_255' => '60', 'red_ratio' => '0.86', 'green_ratio' => '0.08', 'blue_ratio' => '0.24', 'hex' => '#DC143C', 'colour_type' => 'Others' ),
            'darkblue' => array ( 'colour_name' => 'Dark Blue', 'colour_selector' => 'DarkBlue', 'red_255' => '0', 'green_255' => '0', 'blue_255' => '139', 'red_ratio' => '0.00', 'green_ratio' => '0.00', 'blue_ratio' => '0.55', 'hex' => '#00008B', 'colour_type' => 'Others' ),
            'darkcyan' => array ( 'colour_name' => 'Dark Cyan', 'colour_selector' => 'DarkCyan', 'red_255' => '0', 'green_255' => '139', 'blue_255' => '139', 'red_ratio' => '0.00', 'green_ratio' => '0.55', 'blue_ratio' => '0.55', 'hex' => '#008B8B', 'colour_type' => 'Others' ),
            'darkgoldenrod' => array ( 'colour_name' => 'Dark Golden Rod', 'colour_selector' => 'DarkGoldenRod', 'red_255' => '184', 'green_255' => '134', 'blue_255' => '11', 'red_ratio' => '0.72', 'green_ratio' => '0.53', 'blue_ratio' => '0.04', 'hex' => '#B8860B', 'colour_type' => 'Others' ),
            'darkgray' => array ( 'colour_name' => 'Dark Gray', 'colour_selector' => 'DarkGray', 'red_255' => '169', 'green_255' => '169', 'blue_255' => '169', 'red_ratio' => '0.66', 'green_ratio' => '0.66', 'blue_ratio' => '0.66', 'hex' => '#A9A9A9', 'colour_type' => 'Others' ),
            'darkgrey' => array ( 'colour_name' => 'Dark Grey', 'colour_selector' => 'DarkGrey', 'red_255' => '169', 'green_255' => '169', 'blue_255' => '169', 'red_ratio' => '0.66', 'green_ratio' => '0.66', 'blue_ratio' => '0.66', 'hex' => '#A9A9A9', 'colour_type' => 'Others' ),
            'darkgreen' => array ( 'colour_name' => 'Dark Green', 'colour_selector' => 'DarkGreen', 'red_255' => '0', 'green_255' => '100', 'blue_255' => '0', 'red_ratio' => '0.00', 'green_ratio' => '0.39', 'blue_ratio' => '0.00', 'hex' => '#006400', 'colour_type' => 'Others' ),
            'darkkhaki' => array ( 'colour_name' => 'Dark Khaki', 'colour_selector' => 'DarkKhaki', 'red_255' => '189', 'green_255' => '183', 'blue_255' => '107', 'red_ratio' => '0.74', 'green_ratio' => '0.72', 'blue_ratio' => '0.42', 'hex' => '#BDB76B', 'colour_type' => 'Others' ),
            'darkmagenta' => array ( 'colour_name' => 'Dark Magenta', 'colour_selector' => 'DarkMagenta', 'red_255' => '139', 'green_255' => '0', 'blue_255' => '139', 'red_ratio' => '0.55', 'green_ratio' => '0.00', 'blue_ratio' => '0.55', 'hex' => '#8B008B', 'colour_type' => 'Others' ),
            'darkolivegreen' => array ( 'colour_name' => 'Dark Olive Green', 'colour_selector' => 'DarkOliveGreen', 'red_255' => '85', 'green_255' => '107', 'blue_255' => '47', 'red_ratio' => '0.33', 'green_ratio' => '0.42', 'blue_ratio' => '0.18', 'hex' => '#556B2F', 'colour_type' => 'Others' ),
            'darkorange' => array ( 'colour_name' => 'Dark Orange', 'colour_selector' => 'DarkOrange', 'red_255' => '255', 'green_255' => '140', 'blue_255' => '0', 'red_ratio' => '1.00', 'green_ratio' => '0.55', 'blue_ratio' => '0.00', 'hex' => '#FF8C00', 'colour_type' => 'Others' ),
            'darkorchid' => array ( 'colour_name' => 'Dark Orchid', 'colour_selector' => 'DarkOrchid', 'red_255' => '153', 'green_255' => '50', 'blue_255' => '204', 'red_ratio' => '0.60', 'green_ratio' => '0.20', 'blue_ratio' => '0.80', 'hex' => '#9932CC', 'colour_type' => 'Others' ),
            'darkred' => array ( 'colour_name' => 'Dark Red', 'colour_selector' => 'DarkRed', 'red_255' => '139', 'green_255' => '0', 'blue_255' => '0', 'red_ratio' => '0.55', 'green_ratio' => '0.00', 'blue_ratio' => '0.00', 'hex' => '#8B0000', 'colour_type' => 'Others' ),
            'darksalmon' => array ( 'colour_name' => 'Dark Salmon', 'colour_selector' => 'DarkSalmon', 'red_255' => '233', 'green_255' => '150', 'blue_255' => '122', 'red_ratio' => '0.91', 'green_ratio' => '0.59', 'blue_ratio' => '0.48', 'hex' => '#E9967A', 'colour_type' => 'Others' ),
            'darkseagreen' => array ( 'colour_name' => 'Dark Sea Green', 'colour_selector' => 'DarkSeaGreen', 'red_255' => '143', 'green_255' => '188', 'blue_255' => '143', 'red_ratio' => '0.56', 'green_ratio' => '0.74', 'blue_ratio' => '0.56', 'hex' => '#8FBC8F', 'colour_type' => 'Others' ),
            'darkslateblue' => array ( 'colour_name' => 'DarkSlate Blue', 'colour_selector' => 'DarkSlateBlue', 'red_255' => '72', 'green_255' => '61', 'blue_255' => '139', 'red_ratio' => '0.28', 'green_ratio' => '0.24', 'blue_ratio' => '0.55', 'hex' => '#483D8B', 'colour_type' => 'Others' ),
            'darkslategray' => array ( 'colour_name' => 'Dark Slate Gray', 'colour_selector' => 'DarkSlateGray', 'red_255' => '47', 'green_255' => '79', 'blue_255' => '79', 'red_ratio' => '0.18', 'green_ratio' => '0.31', 'blue_ratio' => '0.31', 'hex' => '#2F4F4F', 'colour_type' => 'Others' ),
            'darkslategrey' => array ( 'colour_name' => 'Dark Slate Grey', 'colour_selector' => 'DarkSlateGrey', 'red_255' => '47', 'green_255' => '79', 'blue_255' => '79', 'red_ratio' => '0.18', 'green_ratio' => '0.31', 'blue_ratio' => '0.31', 'hex' => '#2F4F4F', 'colour_type' => 'Others' ),
            'darkturquoise' => array ( 'colour_name' => 'Dark Turquoise', 'colour_selector' => 'DarkTurquoise', 'red_255' => '0', 'green_255' => '206', 'blue_255' => '209', 'red_ratio' => '0.00', 'green_ratio' => '0.81', 'blue_ratio' => '0.82', 'hex' => '#00CED1', 'colour_type' => 'Others' ),
            'darkviolet' => array ( 'colour_name' => 'Dark Violet', 'colour_selector' => 'DarkViolet', 'red_255' => '148', 'green_255' => '0', 'blue_255' => '211', 'red_ratio' => '0.58', 'green_ratio' => '0.00', 'blue_ratio' => '0.83', 'hex' => '#9400D3', 'colour_type' => 'Others' ),
            'deeppink' => array ( 'colour_name' => 'Deep Pink', 'colour_selector' => 'DeepPink', 'red_255' => '255', 'green_255' => '20', 'blue_255' => '147', 'red_ratio' => '1.00', 'green_ratio' => '0.08', 'blue_ratio' => '0.58', 'hex' => '#FF1493', 'colour_type' => 'Others' ),
            'deepskyblue' => array ( 'colour_name' => 'Deep Sky Blue', 'colour_selector' => 'DeepSkyBlue', 'red_255' => '0', 'green_255' => '191', 'blue_255' => '255', 'red_ratio' => '0.00', 'green_ratio' => '0.75', 'blue_ratio' => '1.00', 'hex' => '#00BFFF', 'colour_type' => 'Others' ),
            'dimgray' => array ( 'colour_name' => 'Dim Gray', 'colour_selector' => 'DimGray', 'red_255' => '105', 'green_255' => '105', 'blue_255' => '105', 'red_ratio' => '0.41', 'green_ratio' => '0.41', 'blue_ratio' => '0.41', 'hex' => '#696969', 'colour_type' => 'Others' ),
            'dimgrey' => array ( 'colour_name' => 'Dim Grey', 'colour_selector' => 'DimGrey', 'red_255' => '105', 'green_255' => '105', 'blue_255' => '105', 'red_ratio' => '0.41', 'green_ratio' => '0.41', 'blue_ratio' => '0.41', 'hex' => '#696969', 'colour_type' => 'Others' ),
            'dodgerblue' => array ( 'colour_name' => 'Dodger Blue', 'colour_selector' => 'DodgerBlue', 'red_255' => '30', 'green_255' => '144', 'blue_255' => '255', 'red_ratio' => '0.12', 'green_ratio' => '0.56', 'blue_ratio' => '1.00', 'hex' => '#1E90FF', 'colour_type' => 'Others' ),
            'firebrick' => array ( 'colour_name' => 'Fire Brick', 'colour_selector' => 'FireBrick', 'red_255' => '178', 'green_255' => '34', 'blue_255' => '34', 'red_ratio' => '0.70', 'green_ratio' => '0.13', 'blue_ratio' => '0.13', 'hex' => '#B22222', 'colour_type' => 'Others' ),
            'floralwhite' => array ( 'colour_name' => 'Floral White', 'colour_selector' => 'FloralWhite', 'red_255' => '255', 'green_255' => '250', 'blue_255' => '240', 'red_ratio' => '1.00', 'green_ratio' => '0.98', 'blue_ratio' => '0.94', 'hex' => '#FFFAF0', 'colour_type' => 'Others' ),
            'forestgreen' => array ( 'colour_name' => 'Forest Green', 'colour_selector' => 'ForestGreen', 'red_255' => '34', 'green_255' => '139', 'blue_255' => '34', 'red_ratio' => '0.13', 'green_ratio' => '0.55', 'blue_ratio' => '0.13', 'hex' => '#228B22', 'colour_type' => 'Others' ),
            'gainsboro' => array ( 'colour_name' => 'Gainsboro', 'colour_selector' => 'Gainsboro', 'red_255' => '220', 'green_255' => '220', 'blue_255' => '220', 'red_ratio' => '0.86', 'green_ratio' => '0.86', 'blue_ratio' => '0.86', 'hex' => '#DCDCDC', 'colour_type' => 'Others' ),
            'ghostwhite' => array ( 'colour_name' => 'Ghost White', 'colour_selector' => 'GhostWhite', 'red_255' => '248', 'green_255' => '248', 'blue_255' => '255', 'red_ratio' => '0.97', 'green_ratio' => '0.97', 'blue_ratio' => '1.00', 'hex' => '#F8F8FF', 'colour_type' => 'Others' ),
            'gold' => array ( 'colour_name' => 'Gold', 'colour_selector' => 'Gold', 'red_255' => '255', 'green_255' => '215', 'blue_255' => '0', 'red_ratio' => '1.00', 'green_ratio' => '0.84', 'blue_ratio' => '0.00', 'hex' => '#FFD700', 'colour_type' => 'Others' ),
            'goldenrod' => array ( 'colour_name' => 'Golden Rod', 'colour_selector' => 'GoldenRod', 'red_255' => '218', 'green_255' => '165', 'blue_255' => '32', 'red_ratio' => '0.85', 'green_ratio' => '0.65', 'blue_ratio' => '0.13', 'hex' => '#DAA520', 'colour_type' => 'Others' ),
            'green' => array ( 'colour_name' => 'Green', 'colour_selector' => 'Green', 'red_255' => '0', 'green_255' => '128', 'blue_255' => '0', 'red_ratio' => '0.00', 'green_ratio' => '0.50', 'blue_ratio' => '0.00', 'hex' => '#008000', 'colour_type' => 'Others' ),
            'greenyellow' => array ( 'colour_name' => 'Green Yellow', 'colour_selector' => 'GreenYellow', 'red_255' => '173', 'green_255' => '255', 'blue_255' => '47', 'red_ratio' => '0.68', 'green_ratio' => '1.00', 'blue_ratio' => '0.18', 'hex' => '#ADFF2F', 'colour_type' => 'Others' ),
            'honeydew' => array ( 'colour_name' => 'Honey Dew', 'colour_selector' => 'HoneyDew', 'red_255' => '240', 'green_255' => '255', 'blue_255' => '240', 'red_ratio' => '0.94', 'green_ratio' => '1.00', 'blue_ratio' => '0.94', 'hex' => '#F0FFF0', 'colour_type' => 'Others' ),
            'hotpink' => array ( 'colour_name' => 'Hot Pink', 'colour_selector' => 'HotPink', 'red_255' => '255', 'green_255' => '105', 'blue_255' => '180', 'red_ratio' => '1.00', 'green_ratio' => '0.41', 'blue_ratio' => '0.71', 'hex' => '#FF69B4', 'colour_type' => 'Others' ),
            'indianred' => array ( 'colour_name' => 'Indian Red', 'colour_selector' => 'IndianRed', 'red_255' => '205', 'green_255' => '92', 'blue_255' => '92', 'red_ratio' => '0.80', 'green_ratio' => '0.36', 'blue_ratio' => '0.36', 'hex' => '#CD5C5C', 'colour_type' => 'Others' ),
            'indigo' => array ( 'colour_name' => 'Indigo', 'colour_selector' => 'Indigo', 'red_255' => '75', 'green_255' => '0', 'blue_255' => '130', 'red_ratio' => '0.29', 'green_ratio' => '0.00', 'blue_ratio' => '0.51', 'hex' => '#4B0082', 'colour_type' => 'Others' ),
            'ivory' => array ( 'colour_name' => 'Ivory', 'colour_selector' => 'Ivory', 'red_255' => '255', 'green_255' => '255', 'blue_255' => '240', 'red_ratio' => '1.00', 'green_ratio' => '1.00', 'blue_ratio' => '0.94', 'hex' => '#FFFFF0', 'colour_type' => 'Others' ),
            'khaki' => array ( 'colour_name' => 'Khaki', 'colour_selector' => 'Khaki', 'red_255' => '240', 'green_255' => '230', 'blue_255' => '140', 'red_ratio' => '0.94', 'green_ratio' => '0.90', 'blue_ratio' => '0.55', 'hex' => '#F0E68C', 'colour_type' => 'Others' ),
            'lavender' => array ( 'colour_name' => 'Lavender', 'colour_selector' => 'Lavender', 'red_255' => '230', 'green_255' => '230', 'blue_255' => '250', 'red_ratio' => '0.90', 'green_ratio' => '0.90', 'blue_ratio' => '0.98', 'hex' => '#E6E6FA', 'colour_type' => 'Others' ),
            'lavenderblush' => array ( 'colour_name' => 'Lavender Blush', 'colour_selector' => 'LavenderBlush', 'red_255' => '255', 'green_255' => '240', 'blue_255' => '245', 'red_ratio' => '1.00', 'green_ratio' => '0.94', 'blue_ratio' => '0.96', 'hex' => '#FFF0F5', 'colour_type' => 'Others' ),
            'lawngreen' => array ( 'colour_name' => 'Lawn Green', 'colour_selector' => 'LawnGreen', 'red_255' => '124', 'green_255' => '252', 'blue_255' => '0', 'red_ratio' => '0.49', 'green_ratio' => '0.99', 'blue_ratio' => '0.00', 'hex' => '#7CFC00', 'colour_type' => 'Others' ),
            'lemonchiffon' => array ( 'colour_name' => 'Lemon Chiffon', 'colour_selector' => 'LemonChiffon', 'red_255' => '255', 'green_255' => '250', 'blue_255' => '205', 'red_ratio' => '1.00', 'green_ratio' => '0.98', 'blue_ratio' => '0.80', 'hex' => '#FFFACD', 'colour_type' => 'Others' ),
            'lightblue' => array ( 'colour_name' => 'Light Blue', 'colour_selector' => 'LightBlue', 'red_255' => '173', 'green_255' => '216', 'blue_255' => '230', 'red_ratio' => '0.68', 'green_ratio' => '0.85', 'blue_ratio' => '0.90', 'hex' => '#ADD8E6', 'colour_type' => 'Others' ),
            'lightcoral' => array ( 'colour_name' => 'Light Coral', 'colour_selector' => 'LightCoral', 'red_255' => '240', 'green_255' => '128', 'blue_255' => '128', 'red_ratio' => '0.94', 'green_ratio' => '0.50', 'blue_ratio' => '0.50', 'hex' => '#F08080', 'colour_type' => 'Others' ),
            'lightcyan' => array ( 'colour_name' => 'Light Cyan', 'colour_selector' => 'LightCyan', 'red_255' => '224', 'green_255' => '255', 'blue_255' => '255', 'red_ratio' => '0.88', 'green_ratio' => '1.00', 'blue_ratio' => '1.00', 'hex' => '#E0FFFF', 'colour_type' => 'Others' ),
            'lightgoldenrodyellow' => array ( 'colour_name' => 'Light Golden Rod Yellow', 'colour_selector' => 'LightGoldenRodYellow', 'red_255' => '250', 'green_255' => '250', 'blue_255' => '210', 'red_ratio' => '0.98', 'green_ratio' => '0.98', 'blue_ratio' => '0.82', 'hex' => '#FAFAD2', 'colour_type' => 'Others' ),
            'lightgray' => array ( 'colour_name' => 'Light Gray', 'colour_selector' => 'LightGray', 'red_255' => '211', 'green_255' => '211', 'blue_255' => '211', 'red_ratio' => '0.83', 'green_ratio' => '0.83', 'blue_ratio' => '0.83', 'hex' => '#D3D3D3', 'colour_type' => 'Others' ),
            'lightgrey' => array ( 'colour_name' => 'Light Grey', 'colour_selector' => 'LightGrey', 'red_255' => '211', 'green_255' => '211', 'blue_255' => '211', 'red_ratio' => '0.83', 'green_ratio' => '0.83', 'blue_ratio' => '0.83', 'hex' => '#D3D3D3', 'colour_type' => 'Others' ),
            'lightgreen' => array ( 'colour_name' => 'Light Green', 'colour_selector' => 'LightGreen', 'red_255' => '144', 'green_255' => '238', 'blue_255' => '144', 'red_ratio' => '0.56', 'green_ratio' => '0.93', 'blue_ratio' => '0.56', 'hex' => '#90EE90', 'colour_type' => 'Others' ),
            'lightpink' => array ( 'colour_name' => 'Light Pink', 'colour_selector' => 'LightPink', 'red_255' => '255', 'green_255' => '182', 'blue_255' => '193', 'red_ratio' => '1.00', 'green_ratio' => '0.71', 'blue_ratio' => '0.76', 'hex' => '#FFB6C1', 'colour_type' => 'Others' ),
            'lightsalmon' => array ( 'colour_name' => 'Light Salmon', 'colour_selector' => 'LightSalmon', 'red_255' => '255', 'green_255' => '160', 'blue_255' => '122', 'red_ratio' => '1.00', 'green_ratio' => '0.63', 'blue_ratio' => '0.48', 'hex' => '#FFA07A', 'colour_type' => 'Others' ),
            'lightseagreen' => array ( 'colour_name' => 'LightSeaGreen', 'colour_selector' => 'LightSeaGreen', 'red_255' => '32', 'green_255' => '178', 'blue_255' => '170', 'red_ratio' => '0.13', 'green_ratio' => '0.70', 'blue_ratio' => '0.67', 'hex' => '#20B2AA', 'colour_type' => 'Others' ),
            'lightskyblue' => array ( 'colour_name' => 'Light Sky Blue', 'colour_selector' => 'LightSkyBlue', 'red_255' => '135', 'green_255' => '206', 'blue_255' => '250', 'red_ratio' => '0.53', 'green_ratio' => '0.81', 'blue_ratio' => '0.98', 'hex' => '#87CEFA', 'colour_type' => 'Others' ),
            'lightslategray' => array ( 'colour_name' => 'Light Slate Gray', 'colour_selector' => 'LightSlateGray', 'red_255' => '119', 'green_255' => '136', 'blue_255' => '153', 'red_ratio' => '0.47', 'green_ratio' => '0.53', 'blue_ratio' => '0.60', 'hex' => '#778899', 'colour_type' => 'Others' ),
            'lightslategrey' => array ( 'colour_name' => 'Light Slate Grey', 'colour_selector' => 'LightSlateGrey', 'red_255' => '119', 'green_255' => '136', 'blue_255' => '153', 'red_ratio' => '0.47', 'green_ratio' => '0.53', 'blue_ratio' => '0.60', 'hex' => '#778899', 'colour_type' => 'Others' ),
            'lightsteelblue' => array ( 'colour_name' => 'Light Steel Blue', 'colour_selector' => 'LightSteelBlue', 'red_255' => '176', 'green_255' => '196', 'blue_255' => '222', 'red_ratio' => '0.69', 'green_ratio' => '0.77', 'blue_ratio' => '0.87', 'hex' => '#B0C4DE', 'colour_type' => 'Others' ),
            'lightyellow' => array ( 'colour_name' => 'Light Yellow', 'colour_selector' => 'LightYellow', 'red_255' => '255', 'green_255' => '255', 'blue_255' => '224', 'red_ratio' => '1.00', 'green_ratio' => '1.00', 'blue_ratio' => '0.88', 'hex' => '#FFFFE0', 'colour_type' => 'Others' ),
            'limegreen' => array ( 'colour_name' => 'Lime Green', 'colour_selector' => 'LimeGreen', 'red_255' => '50', 'green_255' => '205', 'blue_255' => '50', 'red_ratio' => '0.20', 'green_ratio' => '0.80', 'blue_ratio' => '0.20', 'hex' => '#32CD32', 'colour_type' => 'Others' ),
            'linen' => array ( 'colour_name' => 'Linen', 'colour_selector' => 'Linen', 'red_255' => '250', 'green_255' => '240', 'blue_255' => '230', 'red_ratio' => '0.98', 'green_ratio' => '0.94', 'blue_ratio' => '0.90', 'hex' => '#FAF0E6', 'colour_type' => 'Others' ),
            'maroon' => array ( 'colour_name' => 'Maroon', 'colour_selector' => 'Maroon', 'red_255' => '128', 'green_255' => '0', 'blue_255' => '0', 'red_ratio' => '0.50', 'green_ratio' => '0.00', 'blue_ratio' => '0.00', 'hex' => '#800000', 'colour_type' => 'Others' ),
            'mediumaquamarine' => array ( 'colour_name' => 'Medium Aqua Marine', 'colour_selector' => 'MediumAquaMarine', 'red_255' => '102', 'green_255' => '205', 'blue_255' => '170', 'red_ratio' => '0.40', 'green_ratio' => '0.80', 'blue_ratio' => '0.67', 'hex' => '#66CDAA', 'colour_type' => 'Others' ),
            'mediumblue' => array ( 'colour_name' => 'Medium Blue', 'colour_selector' => 'MediumBlue', 'red_255' => '0', 'green_255' => '0', 'blue_255' => '205', 'red_ratio' => '0.00', 'green_ratio' => '0.00', 'blue_ratio' => '0.80', 'hex' => '#0000CD', 'colour_type' => 'Others' ),
            'mediumorchid' => array ( 'colour_name' => 'Medium Orchid', 'colour_selector' => 'MediumOrchid', 'red_255' => '186', 'green_255' => '85', 'blue_255' => '211', 'red_ratio' => '0.73', 'green_ratio' => '0.33', 'blue_ratio' => '0.83', 'hex' => '#BA55D3', 'colour_type' => 'Others' ),
            'mediumpurple' => array ( 'colour_name' => 'Medium Purple', 'colour_selector' => 'MediumPurple', 'red_255' => '147', 'green_255' => '112', 'blue_255' => '219', 'red_ratio' => '0.58', 'green_ratio' => '0.44', 'blue_ratio' => '0.86', 'hex' => '#9370DB', 'colour_type' => 'Others' ),
            'mediumseagreen' => array ( 'colour_name' => 'Medium Sea Green', 'colour_selector' => 'MediumSeaGreen', 'red_255' => '60', 'green_255' => '179', 'blue_255' => '113', 'red_ratio' => '0.24', 'green_ratio' => '0.70', 'blue_ratio' => '0.44', 'hex' => '#3CB371', 'colour_type' => 'Others' ),
            'mediumslateblue' => array ( 'colour_name' => 'Medium Slate Blue', 'colour_selector' => 'MediumSlateBlue', 'red_255' => '123', 'green_255' => '104', 'blue_255' => '238', 'red_ratio' => '0.48', 'green_ratio' => '0.41', 'blue_ratio' => '0.93', 'hex' => '#7B68EE', 'colour_type' => 'Others' ),
            'mediumspringgreen' => array ( 'colour_name' => 'Medium Spring Green', 'colour_selector' => 'MediumSpringGreen', 'red_255' => '0', 'green_255' => '250', 'blue_255' => '154', 'red_ratio' => '0.00', 'green_ratio' => '0.98', 'blue_ratio' => '0.60', 'hex' => '#00FA9A', 'colour_type' => 'Others' ),
            'mediumturquoise' => array ( 'colour_name' => 'Medium Turquoise', 'colour_selector' => 'MediumTurquoise', 'red_255' => '72', 'green_255' => '209', 'blue_255' => '204', 'red_ratio' => '0.28', 'green_ratio' => '0.82', 'blue_ratio' => '0.80', 'hex' => '#48D1CC', 'colour_type' => 'Others' ),
            'mediumvioletred' => array ( 'colour_name' => 'Medium Violet Red', 'colour_selector' => 'MediumVioletRed', 'red_255' => '199', 'green_255' => '21', 'blue_255' => '133', 'red_ratio' => '0.78', 'green_ratio' => '0.08', 'blue_ratio' => '0.52', 'hex' => '#C71585', 'colour_type' => 'Others' ),
            'midnightblue' => array ( 'colour_name' => 'Midnight Blue', 'colour_selector' => 'MidnightBlue', 'red_255' => '25', 'green_255' => '25', 'blue_255' => '112', 'red_ratio' => '0.10', 'green_ratio' => '0.10', 'blue_ratio' => '0.44', 'hex' => '#191970', 'colour_type' => 'Others' ),
            'mintcream' => array ( 'colour_name' => 'Mint Cream', 'colour_selector' => 'MintCream', 'red_255' => '245', 'green_255' => '255', 'blue_255' => '250', 'red_ratio' => '0.96', 'green_ratio' => '1.00', 'blue_ratio' => '0.98', 'hex' => '#F5FFFA', 'colour_type' => 'Others' ),
            'mistyrose' => array ( 'colour_name' => 'Misty Rose', 'colour_selector' => 'MistyRose', 'red_255' => '255', 'green_255' => '228', 'blue_255' => '225', 'red_ratio' => '1.00', 'green_ratio' => '0.89', 'blue_ratio' => '0.88', 'hex' => '#FFE4E1', 'colour_type' => 'Others' ),
            'moccasin' => array ( 'colour_name' => 'Moccasin', 'colour_selector' => 'Moccasin', 'red_255' => '255', 'green_255' => '228', 'blue_255' => '181', 'red_ratio' => '1.00', 'green_ratio' => '0.89', 'blue_ratio' => '0.71', 'hex' => '#FFE4B5', 'colour_type' => 'Others' ),
            'navajowhite' => array ( 'colour_name' => 'Navajo White', 'colour_selector' => 'NavajoWhite', 'red_255' => '255', 'green_255' => '222', 'blue_255' => '173', 'red_ratio' => '1.00', 'green_ratio' => '0.87', 'blue_ratio' => '0.68', 'hex' => '#FFDEAD', 'colour_type' => 'Others' ),
            'navy' => array ( 'colour_name' => 'Navy', 'colour_selector' => 'Navy', 'red_255' => '0', 'green_255' => '0', 'blue_255' => '128', 'red_ratio' => '0.00', 'green_ratio' => '0.00', 'blue_ratio' => '0.50', 'hex' => '#000080', 'colour_type' => 'Others' ),
            'oldlace' => array ( 'colour_name' => 'Old Lace', 'colour_selector' => 'OldLace', 'red_255' => '253', 'green_255' => '245', 'blue_255' => '230', 'red_ratio' => '0.99', 'green_ratio' => '0.96', 'blue_ratio' => '0.90', 'hex' => '#FDF5E6', 'colour_type' => 'Others' ),
            'olive' => array ( 'colour_name' => 'Olive', 'colour_selector' => 'Olive', 'red_255' => '128', 'green_255' => '128', 'blue_255' => '0', 'red_ratio' => '0.50', 'green_ratio' => '0.50', 'blue_ratio' => '0.00', 'hex' => '#808000', 'colour_type' => 'Others' ),
            'olivedrab' => array ( 'colour_name' => 'Olive Drab', 'colour_selector' => 'OliveDrab', 'red_255' => '107', 'green_255' => '142', 'blue_255' => '35', 'red_ratio' => '0.42', 'green_ratio' => '0.56', 'blue_ratio' => '0.14', 'hex' => '#6B8E23', 'colour_type' => 'Others' ),
            'orange' => array ( 'colour_name' => 'Orange', 'colour_selector' => 'Orange', 'red_255' => '255', 'green_255' => '165', 'blue_255' => '0', 'red_ratio' => '1.00', 'green_ratio' => '0.65', 'blue_ratio' => '0.00', 'hex' => '#FFA500', 'colour_type' => 'Others' ),
            'orangered' => array ( 'colour_name' => 'Orange Red', 'colour_selector' => 'OrangeRed', 'red_255' => '255', 'green_255' => '69', 'blue_255' => '0', 'red_ratio' => '1.00', 'green_ratio' => '0.27', 'blue_ratio' => '0.00', 'hex' => '#FF4500', 'colour_type' => 'Others' ),
            'orchid' => array ( 'colour_name' => 'Orchid', 'colour_selector' => 'Orchid', 'red_255' => '218', 'green_255' => '112', 'blue_255' => '214', 'red_ratio' => '0.85', 'green_ratio' => '0.44', 'blue_ratio' => '0.84', 'hex' => '#DA70D6', 'colour_type' => 'Others' ),
            'palegoldenrod' => array ( 'colour_name' => 'Pale Golden Rod', 'colour_selector' => 'PaleGoldenRod', 'red_255' => '238', 'green_255' => '232', 'blue_255' => '170', 'red_ratio' => '0.93', 'green_ratio' => '0.91', 'blue_ratio' => '0.67', 'hex' => '#EEE8AA', 'colour_type' => 'Others' ),
            'palegreen' => array ( 'colour_name' => 'Pale Green', 'colour_selector' => 'PaleGreen', 'red_255' => '152', 'green_255' => '251', 'blue_255' => '152', 'red_ratio' => '0.60', 'green_ratio' => '0.98', 'blue_ratio' => '0.60', 'hex' => '#98FB98', 'colour_type' => 'Others' ),
            'paleturquoise' => array ( 'colour_name' => 'Pale Turquoise', 'colour_selector' => 'PaleTurquoise', 'red_255' => '175', 'green_255' => '238', 'blue_255' => '238', 'red_ratio' => '0.69', 'green_ratio' => '0.93', 'blue_ratio' => '0.93', 'hex' => '#AFEEEE', 'colour_type' => 'Others' ),
            'palevioletred' => array ( 'colour_name' => 'Pale Violet Red', 'colour_selector' => 'PaleVioletRed', 'red_255' => '219', 'green_255' => '112', 'blue_255' => '147', 'red_ratio' => '0.86', 'green_ratio' => '0.44', 'blue_ratio' => '0.58', 'hex' => '#DB7093', 'colour_type' => 'Others' ),
            'papayawhip' => array ( 'colour_name' => 'Papaya Whip', 'colour_selector' => 'PapayaWhip', 'red_255' => '255', 'green_255' => '239', 'blue_255' => '213', 'red_ratio' => '1.00', 'green_ratio' => '0.94', 'blue_ratio' => '0.84', 'hex' => '#FFEFD5', 'colour_type' => 'Others' ),
            'peachpuff' => array ( 'colour_name' => 'Peach Puff', 'colour_selector' => 'PeachPuff', 'red_255' => '255', 'green_255' => '218', 'blue_255' => '185', 'red_ratio' => '1.00', 'green_ratio' => '0.85', 'blue_ratio' => '0.73', 'hex' => '#FFDAB9', 'colour_type' => 'Others' ),
            'peru' => array ( 'colour_name' => 'Peru', 'colour_selector' => 'Peru', 'red_255' => '205', 'green_255' => '133', 'blue_255' => '63', 'red_ratio' => '0.80', 'green_ratio' => '0.52', 'blue_ratio' => '0.25', 'hex' => '#CD853F', 'colour_type' => 'Others' ),
            'pink' => array ( 'colour_name' => 'Pink', 'colour_selector' => 'Pink', 'red_255' => '255', 'green_255' => '192', 'blue_255' => '203', 'red_ratio' => '1.00', 'green_ratio' => '0.75', 'blue_ratio' => '0.80', 'hex' => '#FFC0CB', 'colour_type' => 'Others' ),
            'plum' => array ( 'colour_name' => 'Plum', 'colour_selector' => 'Plum', 'red_255' => '221', 'green_255' => '160', 'blue_255' => '221', 'red_ratio' => '0.87', 'green_ratio' => '0.63', 'blue_ratio' => '0.87', 'hex' => '#DDA0DD', 'colour_type' => 'Others' ),
            'powderblue' => array ( 'colour_name' => 'Powder Blue', 'colour_selector' => 'PowderBlue', 'red_255' => '176', 'green_255' => '224', 'blue_255' => '230', 'red_ratio' => '0.69', 'green_ratio' => '0.88', 'blue_ratio' => '0.90', 'hex' => '#B0E0E6', 'colour_type' => 'Others' ),
            'purple' => array ( 'colour_name' => 'Purple', 'colour_selector' => 'Purple', 'red_255' => '128', 'green_255' => '0', 'blue_255' => '128', 'red_ratio' => '0.50', 'green_ratio' => '0.00', 'blue_ratio' => '0.50', 'hex' => '#800080', 'colour_type' => 'Others' ),
            'rebeccapurple' => array ( 'colour_name' => 'Rebecca Purple', 'colour_selector' => 'RebeccaPurple', 'red_255' => '102', 'green_255' => '51', 'blue_255' => '153', 'red_ratio' => '0.40', 'green_ratio' => '0.20', 'blue_ratio' => '0.60', 'hex' => '#663399', 'colour_type' => 'Others' ),
            'rosybrown' => array ( 'colour_name' => 'Rosy Brown', 'colour_selector' => 'RosyBrown', 'red_255' => '188', 'green_255' => '143', 'blue_255' => '143', 'red_ratio' => '0.74', 'green_ratio' => '0.56', 'blue_ratio' => '0.56', 'hex' => '#BC8F8F', 'colour_type' => 'Others' ),
            'royalblue' => array ( 'colour_name' => 'Royal Blue', 'colour_selector' => 'RoyalBlue', 'red_255' => '65', 'green_255' => '105', 'blue_255' => '225', 'red_ratio' => '0.25', 'green_ratio' => '0.41', 'blue_ratio' => '0.88', 'hex' => '#4169E1', 'colour_type' => 'Others' ),
            'saddlebrown' => array ( 'colour_name' => 'Saddle Brown', 'colour_selector' => 'SaddleBrown', 'red_255' => '139', 'green_255' => '69', 'blue_255' => '19', 'red_ratio' => '0.55', 'green_ratio' => '0.27', 'blue_ratio' => '0.07', 'hex' => '#8B4513', 'colour_type' => 'Others' ),
            'salmon' => array ( 'colour_name' => 'Salmon', 'colour_selector' => 'Salmon', 'red_255' => '250', 'green_255' => '128', 'blue_255' => '114', 'red_ratio' => '0.98', 'green_ratio' => '0.50', 'blue_ratio' => '0.45', 'hex' => '#FA8072', 'colour_type' => 'Others' ),
            'sandybrown' => array ( 'colour_name' => 'Sandy Brown', 'colour_selector' => 'SandyBrown', 'red_255' => '244', 'green_255' => '164', 'blue_255' => '96', 'red_ratio' => '0.96', 'green_ratio' => '0.64', 'blue_ratio' => '0.38', 'hex' => '#F4A460', 'colour_type' => 'Others' ),
            'seagreen' => array ( 'colour_name' => 'Sea Green', 'colour_selector' => 'SeaGreen', 'red_255' => '46', 'green_255' => '139', 'blue_255' => '87', 'red_ratio' => '0.18', 'green_ratio' => '0.55', 'blue_ratio' => '0.34', 'hex' => '#2E8B57', 'colour_type' => 'Others' ),
            'seashell' => array ( 'colour_name' => 'Sea Shell', 'colour_selector' => 'SeaShell', 'red_255' => '255', 'green_255' => '245', 'blue_255' => '238', 'red_ratio' => '1.00', 'green_ratio' => '0.96', 'blue_ratio' => '0.93', 'hex' => '#FFF5EE', 'colour_type' => 'Others' ),
            'sienna' => array ( 'colour_name' => 'Sienna', 'colour_selector' => 'Sienna', 'red_255' => '160', 'green_255' => '82', 'blue_255' => '45', 'red_ratio' => '0.63', 'green_ratio' => '0.32', 'blue_ratio' => '0.18', 'hex' => '#A0522D', 'colour_type' => 'Others' ),
            'silver' => array ( 'colour_name' => 'Silver', 'colour_selector' => 'Silver', 'red_255' => '192', 'green_255' => '192', 'blue_255' => '192', 'red_ratio' => '0.75', 'green_ratio' => '0.75', 'blue_ratio' => '0.75', 'hex' => '#C0C0C0', 'colour_type' => 'Others' ),
            'skyblue' => array ( 'colour_name' => 'Sky Blue', 'colour_selector' => 'SkyBlue', 'red_255' => '135', 'green_255' => '206', 'blue_255' => '235', 'red_ratio' => '0.53', 'green_ratio' => '0.81', 'blue_ratio' => '0.92', 'hex' => '#87CEEB', 'colour_type' => 'Others' ),
            'slateblue' => array ( 'colour_name' => 'Slate Blue', 'colour_selector' => 'SlateBlue', 'red_255' => '106', 'green_255' => '90', 'blue_255' => '205', 'red_ratio' => '0.42', 'green_ratio' => '0.35', 'blue_ratio' => '0.80', 'hex' => '#6A5ACD', 'colour_type' => 'Others' ),
            'slategray' => array ( 'colour_name' => 'Slate Gray', 'colour_selector' => 'SlateGray', 'red_255' => '112', 'green_255' => '128', 'blue_255' => '144', 'red_ratio' => '0.44', 'green_ratio' => '0.50', 'blue_ratio' => '0.56', 'hex' => '#708090', 'colour_type' => 'Others' ),
            'slategrey' => array ( 'colour_name' => 'Slate Grey', 'colour_selector' => 'SlateGrey', 'red_255' => '112', 'green_255' => '128', 'blue_255' => '144', 'red_ratio' => '0.44', 'green_ratio' => '0.50', 'blue_ratio' => '0.56', 'hex' => '#708090', 'colour_type' => 'Others' ),
            'snow' => array ( 'colour_name' => 'Snow', 'colour_selector' => 'Snow', 'red_255' => '255', 'green_255' => '250', 'blue_255' => '250', 'red_ratio' => '1.00', 'green_ratio' => '0.98', 'blue_ratio' => '0.98', 'hex' => '#FFFAFA', 'colour_type' => 'Others' ),
            'springgreen' => array ( 'colour_name' => 'Spring Green', 'colour_selector' => 'SpringGreen', 'red_255' => '0', 'green_255' => '255', 'blue_255' => '127', 'red_ratio' => '0.00', 'green_ratio' => '1.00', 'blue_ratio' => '0.50', 'hex' => '#00FF7F', 'colour_type' => 'Others' ),
            'steelblue' => array ( 'colour_name' => 'Steel Blue', 'colour_selector' => 'SteelBlue', 'red_255' => '70', 'green_255' => '130', 'blue_255' => '180', 'red_ratio' => '0.27', 'green_ratio' => '0.51', 'blue_ratio' => '0.71', 'hex' => '#4682B4', 'colour_type' => 'Others' ),
            'tan' => array ( 'colour_name' => 'Tan', 'colour_selector' => 'Tan', 'red_255' => '210', 'green_255' => '180', 'blue_255' => '140', 'red_ratio' => '0.82', 'green_ratio' => '0.71', 'blue_ratio' => '0.55', 'hex' => '#D2B48C', 'colour_type' => 'Others' ),
            'teal' => array ( 'colour_name' => 'Teal', 'colour_selector' => 'Teal', 'red_255' => '0', 'green_255' => '128', 'blue_255' => '128', 'red_ratio' => '0.00', 'green_ratio' => '0.50', 'blue_ratio' => '0.50', 'hex' => '#008080', 'colour_type' => 'Others' ),
            'thistle' => array ( 'colour_name' => 'Thistle', 'colour_selector' => 'Thistle', 'red_255' => '216', 'green_255' => '191', 'blue_255' => '216', 'red_ratio' => '0.85', 'green_ratio' => '0.75', 'blue_ratio' => '0.85', 'hex' => '#D8BFD8', 'colour_type' => 'Others' ),
            'tomato' => array ( 'colour_name' => 'Tomato', 'colour_selector' => 'Tomato', 'red_255' => '255', 'green_255' => '99', 'blue_255' => '71', 'red_ratio' => '1.00', 'green_ratio' => '0.39', 'blue_ratio' => '0.28', 'hex' => '#FF6347', 'colour_type' => 'Others' ),
            'turquoise' => array ( 'colour_name' => 'Turquoise', 'colour_selector' => 'Turquoise', 'red_255' => '64', 'green_255' => '224', 'blue_255' => '208', 'red_ratio' => '0.25', 'green_ratio' => '0.88', 'blue_ratio' => '0.82', 'hex' => '#40E0D0', 'colour_type' => 'Others' ),
            'violet' => array ( 'colour_name' => 'Violet', 'colour_selector' => 'Violet', 'red_255' => '238', 'green_255' => '130', 'blue_255' => '238', 'red_ratio' => '0.93', 'green_ratio' => '0.51', 'blue_ratio' => '0.93', 'hex' => '#EE82EE', 'colour_type' => 'Others' ),
            'wheat' => array ( 'colour_name' => 'Wheat', 'colour_selector' => 'Wheat', 'red_255' => '245', 'green_255' => '222', 'blue_255' => '179', 'red_ratio' => '0.96', 'green_ratio' => '0.87', 'blue_ratio' => '0.70', 'hex' => '#F5DEB3', 'colour_type' => 'Others' ),
            'whitesmoke' => array ( 'colour_name' => 'White Smoke', 'colour_selector' => 'WhiteSmoke', 'red_255' => '245', 'green_255' => '245', 'blue_255' => '245', 'red_ratio' => '0.96', 'green_ratio' => '0.96', 'blue_ratio' => '0.96', 'hex' => '#F5F5F5', 'colour_type' => 'Others' ),
            'yellowgreen' => array ( 'colour_name' => 'Yellow Green', 'colour_selector' => 'YellowGreen', 'red_255' => '154', 'green_255' => '205', 'blue_255' => '50', 'red_ratio' => '0.60', 'green_ratio' => '0.80', 'blue_ratio' => '0.20', 'hex' => '#9ACD32', 'colour_type' => 'Others' )
        );

        echo "<p>Generate Other Colours</p>";
        foreach($other_colours as $colour)
        {
            $this->Web_safe_colour_model->insert($colour);
            echo "<div><small>Colour (" . $colour['colour_name'] . ", " . $colour['colour_type'] . ") created.</small></div>";
        }
        echo "<hr />";
    }
	
} // end 20161010100706_all_web_colours class