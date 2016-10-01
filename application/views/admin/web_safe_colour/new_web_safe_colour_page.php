<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: new_web_safe_colour.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 30th Sep 2016

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
                        <h2>About this Repo</h2>
                        <p>Click on the links on the sidebar to the left to begin.</p>
                        <p><strong>Colour Repo</strong> serves as a database of commonly used colours like Web Safe colours, 'Paint' colours, etc.</p>
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