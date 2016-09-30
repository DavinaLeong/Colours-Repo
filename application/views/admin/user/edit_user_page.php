<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: edit_user_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

/**
 * @var $user
 * @var $access_options
 * @var $status_options
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
                <li><a href="<?=site_url('admin/user/browse_user');?>">Users</a></li>
                <li><a href="<?=site_url('admin/user/view_user/' . $user['user_id']);?>">User ID: <?=$user['user_id'];?></a></li>
                <li class="active">Edit User</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-users fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Edit User</h3>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <p class="lead">Fill up the form and click <span class="text-primary">Submit</span> to save.</p>

                        <form id="edit_user_form" class="form-horizontal" method="post" data-parsley-validate>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Username"
                                           required maxlength="512" value="<?=set_value('username', $user['username']);?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                           required maxlength="512" value="<?=set_value('name', $user['name']);?>" />
                                </div>
                            </div>
                            <br/>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <a id="reset_password_btn" class="btn btn-default btn-default-border" href="<?=site_url('admin/user/reset_password/' . $user['user_id']); ?>"><i class="fa fa-key fa-fw"></i> Reset Password</a>
                                </div>
                            </div>
                            <br/>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="access">Access <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" id="access" name="access" required>
                                        <option value="" id="access_none">&nbsp;</option>
                                        <?php foreach($access_options as $key=>$option): ?>
                                        <option value="<?=$key;?>" id="access_<?=$key;?>"
                                            <?=set_select('access', $option, ($user['access'] == $key));?>
                                            ><?=$option;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="status">Status <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" id="status_none">&nbsp;</option>
                                        <?php foreach($status_options as $key=>$option): ?>
                                            <option value="<?=$option;?>" id="status_<?=$key;?>"
                                                <?=set_select('status', $option, ($user['status'] == $option));?>
                                                ><?=$option;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Last Updated</label>
                                <div class="col-md-10">
                                    <p id="last_updated" class="form-control-static">
                                        <?=$this->datetime_helper->format_internet_standard($user['last_updated']);?>
                                    </p>
                                </div>
                            </div>
                            <br/>

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