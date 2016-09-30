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
                <li><a href="<?=site_url('admin/users/browse_user');?>">Users</a></li>
                <li class="active">New User</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> View User</h3>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">

                        <form id="view_user_form" class="form-horizontal" method="post">
                            <input id="user_id" type="hidden" value="<?=$user['user_id'];?>" />

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <p id="username" class="form-control-static"><?= $user['username']; ?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="name">Name <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <p id="name" class="form-control-static"><?= $user['name']; ?></p>
                                </div>
                            </div>
                            <br/>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="access">Access</label>
                                <div class="col-md-10">
                                    <p id="access" class="form-control-static"><?= $user['access_str']; ?></p>
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
</body>
</html>