<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: 20161008175800_default_web_colours.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 08 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/* Migration version:
 * 08 Oct 2016, 5:58PM
 * 20161008175800
 */
class Migration_Default_web_colours extends CI_Model
{
	// Public Functions ----------------------------------------------------------------
	public function up()
	{
		$this->_generate_web_safe_colours();
	}

	// Private Functions ---------------------------------------------------------------
	private function _generate_web_safe_colours()
	{
		$this->load->model('Web_safe_colour_model');
		$default_colours = array(
			'black' => array(
				'colour_name' => 'Black',
				'colour_selector' => 'Black',
				'red_255' => 0,
				'green_255' => 0,
				'blue_255' => 0,
				'red_ratio' => 0,
				'green_ratio' => 0,
				'blue_ratio' => 0,
				'hex' => '#000000',
				'colour_type' => 'Default'
			),
			'white' => array(
				'colour_name' => 'White',
				'colour_selector' => 'White',
				'red_255' => 255,
				'green_255' => 255,
				'blue_255' => 255,
				'red_ratio' => 1,
				'green_ratio' => 1,
				'blue_ratio' => 1,
				'hex' => '#FFFFFF',
				'colour_type' => 'Default'
			),
			'gray' => array(
				'colour_name' => 'Gray',
				'colour_selector' => 'Gray',
				'red_255' => 128,
				'green_255' => 128,
				'blue_255' => 128,
				'red_ratio' => 0.5,
				'green_ratio' => 0.5,
				'blue_ratio' => 0.5,
				'hex' => '#888888',
				'colour_type' => 'Default'
			),
			'grey' => array(
				'colour_name' => 'Grey',
				'colour_selector' => 'Grey',
				'red_255' => 128,
				'green_255' => 128,
				'blue_255' => 128,
				'red_ratio' => 0.5,
				'green_ratio' => 0.5,
				'blue_ratio' => 0.5,
				'hex' => '#888888',
				'colour_type' => 'Default'
			),
			'red' => array(
				'colour_name' => 'Red',
				'colour_selector' => 'Red',
				'red_255' => 255,
				'green_255' => 0,
				'blue_255' => 0,
				'red_ratio' => 1,
				'green_ratio' => 0,
				'blue_ratio' => 0,
				'hex' => '#FF0000',
				'colour_type' => 'Default'
			),
			'lime' => array(
				'colour_name' => 'Lime',
				'colour_selector' => 'Lime',
				'red_255' => 0,
				'green_255' => 255,
				'blue_255' => 0,
				'red_ratio' => 0,
				'green_ratio' => 1,
				'blue_ratio' => 0,
				'hex' => '#00FF00',
				'colour_type' => 'Default'
			),
			'blue' => array(
				'colour_name' => 'Blue',
				'colour_selector' => 'Blue',
				'red_255' => 0,
				'green_255' => 0,
				'blue_255' => 255,
				'red_ratio' => 0,
				'green_ratio' => 0,
				'blue_ratio' => 1,
				'hex' => '#0000FF',
				'colour_type' => 'Default'
			),
			'yellow' => array(
				'colour_name' => 'Yellow',
				'colour_selector' => 'Yellow',
				'red_255' => 255,
				'green_255' => 255,
				'blue_255' => 0,
				'red_ratio' => 1,
				'green_ratio' => 1,
				'blue_ratio' => 0,
				'hex' => '#FFFF00',
				'colour_type' => 'Default'
			),
			'aqua' => array(
				'colour_name' => 'Aqua',
				'colour_selector' => 'Aqua',
				'red_255' => 0,
				'green_255' => 255,
				'blue_255' => 255,
				'red_ratio' => 0,
				'green_ratio' => 1,
				'blue_ratio' => 1,
				'hex' => '#00FFFF',
				'colour_type' => 'Default'
			),
			'cyan' => array(
				'colour_name' => 'Cyan',
				'colour_selector' => 'Cyan',
				'red_255' => 0,
				'green_255' => 255,
				'blue_255' => 255,
				'red_ratio' => 0,
				'green_ratio' => 1,
				'blue_ratio' => 1,
				'hex' => '#00FFFF',
				'colour_type' => 'Default'
			),
			'magenta' => array(
				'colour_name' => 'Magenta',
				'colour_selector' => 'Magenta',
				'red_255' => 255,
				'green_255' => 0,
				'blue_255' => 255,
				'red_ratio' => 1,
				'green_ratio' => 0,
				'blue_ratio' => 1,
				'hex' => '#FF00FF',
				'colour_type' => 'Default'
			),
			'fuchsia' => array(
				'colour_name' => 'Fuchsia',
				'colour_selector' => 'Fuchsia',
				'red_255' => 255,
				'green_255' => 0,
				'blue_255' => 255,
				'red_ratio' => 1,
				'green_ratio' => 0,
				'blue_ratio' => 1,
				'hex' => '#FF00FF',
				'colour_type' => 'Default'
			)
		);

		foreach($default_colours as $colour)
		{
			$this->Web_safe_colour_model->insert($colour);
			echo "<div><small>Colour (" . $colour['colour_name'] . ", " . $colour['colour_type'] . ") created.</small></div>";
		}
		echo "<hr />";
	}

} // end Migration_Default_web_colours class
