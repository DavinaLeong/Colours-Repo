<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: change_password_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

/**
 * @var $personal_profile
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_snippets/meta_admin'); ?>

    <?php $this->load->view('admin/_snippets/head_resources'); ?>
</head>

<body>

<section id="container" >

    <?php $this->load->view('admin/_snippets/navbar_admin'); ?>

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <ol class="breadcrumb">
                <li><a href="<?=site_url(ADMIN_HOME_URL);?>">Home</a></li>
                <li><a href="<?=site_url('admin/personal_profile/view_personal_profile');?>">Personal Profile</a></li>
                <li><a href="<?=site_url('admin/personal_profile/edit_personal_profile');?>">Edit Personal Profile</a></li>
                <li class="active">Change Password</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Personal Profile</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Change Password</h3>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">

                        <form id="change_password_form" class="form-horizontal" method="post" data-parsley-validate>
                            <input id="user_id" type="hidden" value="<?=$this->session->userdata('user_id');?>" />

                            <fieldset>
                                <legend>Username &amp; Name</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="username">Username</label>
                                    <div class="col-md-10">
                                        <p id="username" class="form-control-static"><?= $personal_profile['username']; ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="name">Name</label>
                                    <div class="col-md-10">
                                        <p id="name" class="form-control-static"><?= $personal_profile['name']; ?></p>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Password</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="old_password">
                                        Old Password <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" id="old_password" name="old_password"
                                               required minlength="6" maxlength="512" />
                                        <p class="help-block">Only letters and numbers allowed.</p>
                                    </div>
                                </div>
                                <br/>

                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="new_password">New Password <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" id="new_password" name="new_password"
                                               required minlength="6" maxlength="512" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="confirm_new_password">
                                        Confirm New Password <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" id="confirm_new_password"
                                               name="confirm_new_password" required minlength="6" maxlength="512"
                                               data-parsley-equalto="#new_password" />
                                    </div>
                                </div>
                            </fieldset>
                            <br/>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Last Updated</label>
                                <div class="col-md-10">
                                    <p id="last_updated" class="form-control-static">
                                        <?=$this->datetime_helper->format_internet_standard($personal_profile['last_updated']);?>
                                    </p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <p class="text-danger">* required fields</p>
                                    <button id="submit_btn" class="btn btn-theme" type="submit">
                                        <i class="fa fa-check fa-fw"></i> Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
<script src="<?=RESOURCES_FOLDER;?>vendor/parsleyjs/parsley.min.js"></script>
</body>
</html>