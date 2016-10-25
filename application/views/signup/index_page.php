<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: signup_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 25 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('_snippets/meta_headers'); ?>

    <?php $this->load->view('_snippets/head_resources'); ?>
</head>
<body>
<div style="height: 30px;">&nbsp;</div>
<div class="container">

    <div class="content-panel">
        <?php $this->load->view('_snippets/site_header'); ?>

        <h2 class="cr-content-panel-header"><i class="fa fa-user-plus fa-fw"></i> Sign Up</h2>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>

                <form id="signup_form" class="form-horizontal" method="post" data-parsley-validate>

                    <fieldset>
                        <legend>Name &amp; Username</legend>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Name <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" id="name" name="name" type="text" value="<?=set_value('name');?>"
                                       required maxlength="512" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="username">Username <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" id="username" name="username" type="text" value="<?=set_value('username');?>"
                                       required maxlength="512" pattern="<?=REGEX_PARSLEY_USERNAME;?>" />
                                <p class="help-block">Only letters, numbers, underscores and dashes allowed.</p>
                            </div>
                        </div>
                        <br/>
                    </fieldset>

                    <fieldset>
                        <legend>Password</legend>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="password">Password <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" id="password" name="password" type="password"
                                       required minlength="6" maxlength="512" data-parsley-type="alphanum" />
                                <p class="help-block">Only letters and numbers allowed.</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" id="confirm_password" name="confirm_password" type="password"
                                       required minlength="6" maxlength="512" data-parsley-type="alphanum" data-parsley-equalto="#password" />
                            </div>
                        </div>
                        <br/>
                    </fieldset>

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

        <?php $this->load->view('_snippets/footer'); ?>
    </div>

</div>
<div style="height: 30px;">&nbsp;</div>
<?php $this->load->view('_snippets/body_resources'); ?>
<script src="<?=RESOURCES_FOLDER;?>vendor/parsleyjs/parsley.min.js"></script>
</body>
</html>