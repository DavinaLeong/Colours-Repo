<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: error_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 26 Oct 2016

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

                <div class="alert alert-danger">
                    <h3><i class="fa fa-times-circle fa-fw"></i> Error!</h3>
                    <p>An error has occurred. Please try again later.</p>
                    <p><a href="<?=site_url('signup');?>"><i class="fa fa-caret-left"></i> Go back</a></p>
                </div>

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