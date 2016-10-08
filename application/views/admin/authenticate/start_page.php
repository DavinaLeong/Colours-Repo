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
                        <div class="alert alert-warning">
                            <h4 style="font-weight: bold;"><i class="fa fa-minus-circle fa-fw"></i> Beta</h4>
                            <p>Components are ready; not all features fully implemented yet.</p>
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

                        <!-- Task Accordion start -->
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Code Improvement -->
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="heading_zero">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_zero" aria-expanded="true" aria-controls="collapse_zero">
                                            <i class="fa fa-check fa-fw"></i> 0. Code Improvement
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_zero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_zero">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> Refactor Resources Structure</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Use Bower</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Use Migrations</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Site UI -->
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="heading_one">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                         href="#collapse_one" aria-expanded="true" aria-controls="collapse_one">
                                            <i class="fa fa-check fa-fw"></i> 1. Site UI
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_one" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_one">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Import DashGum</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Implement DataTables</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Login Page -->
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="heading_two">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_two" aria-expanded="false" aria-controls="collapse_two">
                                            <i class="fa fa-check fa-fw"></i> 2. Login Page
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_two">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Page UI</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Login Functionality</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- User Module -->
                            <div class="panel panel-warning">
                                <div class="panel-heading" role="tab" id="heading_three">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_three" aria-expanded="false" aria-controls="collapse_three">
                                            <i class="fa fa-minus fa-fw"></i> 3. User Module
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_three" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_three">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Browse Users</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> New User</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> View User</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Edit User</li>
                                        <li class="list-group-item text-success"><i class="fa fa-check-circle fa-fw"></i> Reset Password</li>
                                        <li class="list-group-item text-danger"><i class="fa fa-times-circle fa-fw"></i> Access Colours</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Personal Profile Module -->
                            <div class="panel panel-success">
                                <div class="panel-heading" role="tab" id="heading_four">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_four" aria-expanded="false" aria-controls="collapse_four">
                                            <i class="fa fa-check fa-fw"></i> 4. Personal Profile Module
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_four" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_four">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> View Personal Profile</li>
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> Edit Personal Profile</li>
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> Change Password</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Web Safe Colour Module -->
                            <div class="panel panel-warning">
                                <div class="panel-heading" role="tab" id="heading_five">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_five" aria-expanded="false" aria-controls="collapse_five">
                                            <i class="fa fa-minus fa-fw"></i> 5. Web Safe Colour Module
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_five" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_five">
                                    <ul class="list-group">
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> Browse Web Safe Colours</li>
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> New Web Safe Colours</li>
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> View Web Safe Colours</li>
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> Edit Web Safe Colours</li>
                                        <li class="list-group-item text-success">
                                            <i class="fa fa-check-circle fa-fw"></i> Delete Web Safe Colours</li>
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> Export to CSS</li>
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> Export to Unity C#</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Standard Colour Module -->
                            <div class="panel panel-danger">
                                <div class="panel-heading" role="tab" id="heading_six">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapse_six" aria-expanded="false" aria-controls="collapse_six">
                                            <i class="fa fa-times fa-fw"></i> 6. Standard Colour Module
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse_six" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_six">
                                    <ul class="list-group">
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> Browse Standard Colours</li>
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> New Standard Colours</li>
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> View Standard Colours</li>
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> Edit Standard Colours</li>
                                        <li class="list-group-item text-danger">
                                            <i class="fa fa-times-circle fa-fw"></i> Delete Standard Colours</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Task Accordion end -->
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