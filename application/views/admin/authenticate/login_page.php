<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: login_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 23rd Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_snippets/meta_admin'); ?>

    <?php $this->load->view('admin/_snippets/head_resources'); ?>
    <link href="<?=RESOURCES_FOLDER;?>css/cr_styles_login.css" rel="stylesheet">
</head>

<body>

<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">

        <form class="form-login" method="post">
            <h2 class="form-login-heading">
                <img src="<?=RESOURCES_FOLDER;?>img/cr_img/webpage_icon.png" alt="colours repo icon" height="20px" /> Colours Repo
            </h2>
            <div class="login-wrap">
                <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                <?php $this->load->view('admin/_snippets/message_box'); ?>

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username"
                           placeholder="Username" autofocus />
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password"
                           placeholder="Password" />
                </div>
                <br/>

                <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
            </div>

        </form>

    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?=RESOURCES_FOLDER;?>js/jquery.js"></script>
<script src="<?=RESOURCES_FOLDER;?>js/bootstrap.min.js"></script>

<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="<?=RESOURCES_FOLDER;?>js/jquery.backstretch.min.js"></script>

</body>
</html>
