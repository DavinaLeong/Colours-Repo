<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: edit_personal_profile_page.php
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
    <link rel="stylesheet" type="text/css" href="<?=RESOURCES_FOLDER;?>css/parsley.css" />
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
                <li class="active">Edit Personal Profile</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Personal Profile</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Edit Personal Profile</h3>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">

                        <form id="edit_personal_profile_form" class="form-horizontal" method="post" data-parsley-validate>
                            <input id="user_id" type="hidden" value="<?=$this->session->userdata('user_id');?>" />

                            <fieldset>
                                <legend>Username &amp; Name</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="username">Username <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" id="username" name="username"
                                               placeholder="Username" required maxlength="512" data-parsley-type="alphanum"
                                               value="<?=set_value('username', $personal_profile['username']);?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="name">Name <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" id="name" name="name"
                                               placeholder="Name" required maxlength="512"
                                               value="<?=set_value('name', $personal_profile['name']);?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <a id="reset_password_btn" class="btn btn-default btn-default-border" href="<?=site_url('admin/personal_profile/change_password'); ?>"><i class="fa fa-key fa-fw"></i> Change Password</a>
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
<script src="<?=RESOURCES_FOLDER;?>js/parsley.min.js"></script>
</body>
</html>