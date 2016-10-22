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
    <link href="<?=RESOURCES_FOLDER;?>colour_repo/source/css/cr_styles_login.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
*********************************************************************************************************************************************************** -->

<div id="login-page">
    <div class="container">

        <form class="form-login" method="post" data-parsley-validate>
            <h2 class="form-login-heading">
                <img class="login-img" src="<?=RESOURCES_FOLDER;?>colour_repo/img/webpage_icon.png" alt="colours repo icon" width="64px" />
                Colours Repo
            </h2>
            <div class="login-wrap">
                <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                <?php $this->load->view('admin/_snippets/message_box'); ?>

                <form id="login_form" method="post" data-parsley-validate>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username"
                               placeholder="Username" required autofocus />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password" required />
                    </div>
                    <br/>

                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                </form>

            </div>

        </form>

    </div>
</div>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script src="<?=RESOURCES_FOLDER;?>dashgum/js/jquery.backstretch.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>vendor/parsleyjs/parsley.min.js"></script>
</body>
</html>
