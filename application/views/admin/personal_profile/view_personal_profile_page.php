<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: view_personal_profile_page.php
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
                <li class="active">Personal Profile</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Personal Profile</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> View Personal Profile&nbsp;
                <div id="action-dropdown" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-gavel fa-fw"></i> Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="edit_profile" href="<?=site_url('admin/personal_profile/edit_personal_profile');?>">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit Personal Profile</a></li>
                        <li><a id="change_password" href="<?=site_url('admin/personal_profile/change_password/'); ?>">
                                <i class="fa fa-key fa-fw"></i> Change Password</a></li>
                    </ul>
                </div>
            </h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/message_box'); ?>
                </div>
            </div>

            <div class="row mt">
                <!-- Upload Profile Picture start -->
                <div class="col-lg-4 col-md-12">
                    <div class="content-panel">
                        <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Profile Picture</h4>

                        <div id="panel_profile_picture" class="panel panel-default">
                            <div class="panel-body">
                                <?php if($personal_profile['image_filename']): ?>
                                    <img class="img-circle cr-img-centered" src="<?=UPLOADS_FOLDER . $personal_profile['image_filename'];?>"
                                         alt="profile picture" />
                                <?php else: ?>
                                    <p class="cr-no-image">no image</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
                <!-- Upload Profile Picture end -->

                <!-- Details Panel start -->
                <div class="col-lg-8 col-md-12">
                    <div id="details_panel" class="content-panel">
                        <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Details</h4>

                        <form id="view_personal_profile_form" class="form-horizontal" method="post">
                            <input id="user_id" type="hidden" value="<?=$this->session->userdata('user_id');?>" />

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
                            <br/>

                            <div class="form-group">
                                <label class="col-md-2 control-label">Last Updated</label>
                                <div class="col-md-10">
                                    <p id="last_updated" class="form-control-static">
                                        <?=$this->datetime_helper->format_internet_standard($personal_profile['last_updated']);?>
                                    </p>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- Details Panel end -->
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