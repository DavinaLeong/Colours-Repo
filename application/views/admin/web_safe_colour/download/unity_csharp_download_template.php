<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: unity_csharp_download_template.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 12 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
header("Content-Type: application/php");
header("Content-Disposition: attachment; filename=WebSafeColours.cs");
header("Pragma: no-cache");
header("Expires: 0");

$this->load->view('admin/web_safe_colour/download/unity_csharp_script');