<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: Authenticate.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 23rd Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

class Authenticate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        $this->load->view('admin/authenticate/login_page');
    }
	
} // end Authenticate controller class