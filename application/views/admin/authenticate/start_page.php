<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: start_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 28th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
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
                <li class="active">Home</li>
            </ol>

            <h1><i class="fa fa-dashboard fa-fw"></i> Welcome, <strong><?= $this->session->userdata('name'); ?></strong></h1>
            <p><small>Today: <?= $this->datetime_helper->now('r'); ?></small></p>
            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <h3 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Status</h3>
                        <div class="alert alert-danger">
                            <h4 style="font-weight: bold;"><i class="fa fa-times-circle-o fa-fw"></i> Alpha</h4>
                            <p>Repo not ready</p>
                        </div>
                    </div>
                    <br/>

                    <div class="content-panel">
                        <h3 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> About this Repo</h3>
                        <p>Click on the links on the sidebar to the left to begin.</p>
                        <p><strong>Colour Repo</strong> serves as a database of commonly used colours like Web Safe colours,
                            'Paint' colours, etc.</p>
                    </div>
                    <br/>

                    <div class="content-panel">
                        <h3 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i> Tasks</h3>
                        <ol class="cr-no-bullets">
                            <li class="text-danger"><i class="fa fa-times fa-fw"></i> Site Template</li>
                            <li class="text-success"><i class="fa fa-check fa-fw"></i> Login Screen</li>
                            <li class="text-success"><i class="fa fa-check fa-fw"></i> User Module
                                <ol class="cr-no-bullets">
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Browse Users</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> New User</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> View User</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Edit User</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Reset User</li>
                                </ol>
                            </li>
                            <li class="text-success"><i class="fa fa-check fa-fw"></i> Personal Profile Module
                                <ol class="cr-no-bullets">
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> View Personal Profile</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Edit Personal Profile</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Change Password</li>
                                </ol>
                            </li>
                            <li class="text-danger"><i class="fa fa-times fa-fw"></i> Web Safe Colours Module
                                <ol class="cr-no-bullets">
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Browse Web Safe Colours</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> New Web Safe Colour (RGB Values)</li>
                                    <li class="text-danger"><i class="fa fa-times-circle fa-fw"></i> New Web Safe Colour (Colour Picker)</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> View Web Safe Colour</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Edit Web Safe Colour (RGB Values)</li>
                                    <li class="text-danger"><i class="fa fa-times-circle fa-fw"></i> Edit Web Safe Colour (Colour Picker)</li>
                                    <li class="text-success"><i class="fa fa-check-circle fa-fw"></i> Delete Web Safe Colour</li>
                                </ol>
                            </li>
                        </ol>
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