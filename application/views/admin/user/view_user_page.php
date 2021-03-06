<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: view_user_page.php
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
                <li class="active">User ID: <?=$user['user_id'];?></li>
            </ol>

            <h1 class="page-header"><i class="fa fa-users fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> View User&nbsp;
                <div id="action-dropdown" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-gavel fa-fw"></i> Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="edit_record" href="<?=site_url('admin/user/edit_user/' . $user['user_id']);?>">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit User</a></li>
                        <?php if( $this->User_log_model->validate_access_custom("A", $this->session->userdata('access')) ): ?>
                        <li><a id="reset_password" href="<?=site_url('admin/user/reset_password/' . $user['user_id']); ?>">
                                <i class="fa fa-key fa-fw"></i> Reset Password</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/message_box'); ?>
                </div>
            </div>

            <div class="row mt">
                <!-- Profile Picture start -->
                <div class="col-lg-4 col-md-12">
                    <div id="panel_profile_picture" class="content-panel">
                        <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Profile Picture</h4>

                        <div id="panel_profile_picture" class="panel panel-default">
                            <div class="panel-body">
                                <?php if($user['image_filename']): ?>
                                    <img class="img-circle cr-img-centered" src="<?=UPLOADS_FOLDER . $user['image_filename'];?>"
                                         alt="profile picture" />
                                <?php else: ?>
                                    <p class="cr-no-image">no image</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
                <!-- Profile Picture end -->

                <!-- User's Details start -->
                <div class="col-lg-8 col-md-12">
                    <div id="panel_details" class="content-panel">
                        <form id="view_user_form" class="form-horizontal" method="post">
                            <input id="user_id" type="hidden" value="<?=$user['user_id'];?>" />

                            <fieldset>
                                <legend>Username &amp; Name</legend>
                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="username">Username</label>
                                    <div class="col-md-10">
                                        <p id="username" class="form-control-static"><?= $user['username']; ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label"
                                           for="name">Name</label>
                                    <div class="col-md-10">
                                        <p id="name" class="form-control-static"><?= $user['name']; ?></p>
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

                        </form>
                    </div>
                </div>
                <!-- User's Details end -->
            </div>

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
</body>
</html>