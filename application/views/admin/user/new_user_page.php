<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: new_user_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 29th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

/**
 * @var $access_options
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
                <li><a href="<?=site_url('admin/users/browse_user');?>">Users</a></li>
                <li class="active">New User</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> New User</h3>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <p class="lead">Fill up the form and click <span class="text-primary">Submit</span> to save.</p>

                        <form id="new_user_form" class="form-horizontal" method="post" data-parsley-validate>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Username"
                                           required maxlength="512" value="<?=set_value('username');?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Name"
                                           required maxlength="512" value="<?=set_value('name');?>" />
                                </div>
                            </div>
                            <br/>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="password">Password <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" id="password" name="password"
                                           required maxlength="512" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password"
                                           required maxlength="512" />
                                </div>
                            </div>
                            <br/>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="access">Access</label>
                                <div class="col-md-10">
                                    <select class="form-control" id="access" name="access" required>
                                        <?php foreach($access_options as $key=>$option): ?>
                                        <option value="<?=$key;?>" id="access_<?=$key;?>"
                                            <?=set_select('access', $option);?>><?=$option;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Status</label>
                                <div class="col-md-10">
                                    <p id="status" class="form-control-static">Active</p>
                                    <input type="hidden" name="status" value="Active" />
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