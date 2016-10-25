<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: reset_password_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/

/**
 * @var $user
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
                <li><a href="<?=site_url('admin/user/browse_user');?>">Users</a></li>
                <li><a href="<?=site_url('admin/user/view_user/' . $user['user_id']);?>">
                        User ID: <?=$user['user_id'];?></a></li>
                <li class="active">Reset Password</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-users fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Reset Password</h3>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <p class="lead">Fill up the form and click <span class="text-primary">Submit</span> to save.</p>

                        <form id="reset_password_form" class="form-horizontal" method="post" data-parsley-validate>

                            <input id="user_id" type="hidden" value="<?=$user['user_id'];?>" />

                            <fieldset>
                                <legend>Username &amp; Name</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="username">Username</label>
                                    <div class="col-md-10">
                                        <p id="username" class="form-control-static"><?= $user['username']; ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Name</label>
                                    <div class="col-md-10">
                                        <p id="name" class="form-control-static"><?= $user['name']; ?></p>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Password</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="new_password">New Password <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" id="new_password" name="new_password"
                                               required minlength="6" maxlength="512" data-parsley-type="alphanum" />
                                        <p class="help-block">Only letters and numbers allowed.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="confirm_new_password">
                                        Confirm New Password <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="password" id="confirm_new_password"
                                               name="confirm_new_password" required minlength="6" maxlength="512" data-parsley-type="alphanum"
                                               data-parsley-equalto="#new_password" />
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Admin</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="access">Access</label>
                                    <div class="col-md-10">
                                        <p id="access" class="form-control-static">
                                            <span class="badge" style="background: <?=$user['access_col'];?>;"><?= $user['access_str']; ?></span></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Status</label>
                                    <div class="col-md-10">
                                        <p id="status" class="form-control-static">
                                            <?php if($user['status'] == 'Active'): ?>
                                                <span class="label label-success"><?= $user['status']; ?></span>
                                            <?php else: ?>
                                                <span class="label label-danger"><?= $user['status']; ?></span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                            </fieldset>

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
<script src="<?=RESOURCES_FOLDER;?>vendor/parsleyjs/parsley.min.js"></script>
</body>
</html>