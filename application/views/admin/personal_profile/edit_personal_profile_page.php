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
                    <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                    <?php if($this->session->userdata('upload_errors')):?>
                        <div id="upload_errors_box" class="alert alert-info" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <?= $this->session->userdata('upload_errors') ?>
                        </div>
                        <?php $this->session->unset_userdata('upload_errors') ?>
                    <?php endif;?>
                    <?php $this->load->view('admin/_snippets/message_box'); ?>
                </div>
            </div>

            <div class="row mt">
                <!-- Upload Profile Picture start -->
                <div class="col-lg-4 col-md-12">
                    <div id="panel_profile_picture" class="content-panel">
                        <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Profile Picture</h4>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php if($personal_profile['image_filename']): ?>
                                    <img class="img-circle cr-img-centered" src="<?=UPLOADS_FOLDER . $personal_profile['image_filename'];?>"
                                         alt="profile picture" />
                                <?php else: ?>
                                    <p class="cr-no-image">no image</p>
                                <?php endif; ?>
                                <button id="upload_modal_btn" class="btn btn-default cr-btn-default-border" type="button"
                                        data-toggle="modal" data-target="#upload_image_modal">
                                    <i class="fa fa-upload fa-fw"></i> Upload Image</button>
                            </div>
                        </div>
                    </div>
                    <br/>
                </div>
                <!-- Upload Profile Picture end -->

                <!-- Personal Profile Details start -->
                <div class="col-lg-8 col-md-12">
                    <div id="panel_details" class="content-panel">
                        <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Details</h4>

                        <form id="edit_personal_profile_form" class="form-horizontal" method="post" data-parsley-validate>
                            <input id="user_id" type="hidden" value="<?=$this->session->userdata('user_id');?>" />

                            <div class="form-group">
                                <label class="col-md-2 control-label"
                                       for="username">Username <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" id="username" name="username"
                                           placeholder="Username" required maxlength="512" pattern="<?=REGEX_PARSLEY_USERNAME;?>"
                                           value="<?=set_value('username', $personal_profile['username']);?>" />
                                    <p class="help-block">Only letters, numbers, dashes and underscores allowed.</p>
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
                                    <a id="reset_password_btn" class="btn btn-default cr-btn-default-border" href="<?=site_url('admin/personal_profile/change_password'); ?>"><i class="fa fa-key fa-fw"></i> Change Password</a>
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
                <!-- Personal Profile Details end -->
            </div>

            <!-- Upload Image Modal start -->
            <div class="modal fade" id="upload_image_modal" tabindex="-1" role="dialog" aria-labelledby="upload_image_modal_title">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="upload_image_modal_title"><i class="fa fa-picture-o fa-fw"></i> Upload Image</h4>
                        </div>
                        <form id="upload_image_form" method="post" enctype="multipart/form-data"
                              action="<?=site_url('admin/personal_profile/upload_profile_picture');?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input id="profile_picture" name="profile_picture" type="file" />
                                    <p class="help-block">Valid format: .jpg .gif .png .bmp</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="upload_btn" type="submit" class="btn btn-primary">
                                    <i class="fa fa-upload fa-fw"></i> Upload</button>
                                <button id="cancel_upload_btn" type="button" class="btn btn-default cr-btn-default-border"
                                        data-dismiss="modal"><i class="fa fa-ban fa-fw"></i> Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Upload Image Modal end -->

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
<script src="<?=RESOURCES_FOLDER;?>vendor/parsleyjs/parsley.min.js"></script>
<script>

</script>
</body>
</html>