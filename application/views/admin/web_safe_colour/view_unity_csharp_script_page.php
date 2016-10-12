<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: view_unity_csharp_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 12 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $default_colours
 * @var $other_colours
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_snippets/meta_admin'); ?>

    <?php $this->load->view('admin/_snippets/head_resources'); ?>
    <style type="text/css">
        pre {
            min-height: 50px;
            max-height: 800px;
            overflow-y: auto;
            font-family: "Consolas", "Courier New", "Courier", monospace;
            font-size: 10pt;
        }
    </style>
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
                <li><a href="<?=site_url('admin/web_safe_colour/browse_web_safe_colour');?>">Web Safe Colours</a></li>
                <li class="active">View Unity C# Script</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-globe fa-fw"></i> Web Safe Colours Module</h1>
            <h3>
                <i class="fa fa-angle-right fa-fw"></i> View <span class="text-primary">Unity C#</span> Script&nbsp;
                <div id="action-dropdown" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="export_css" href="<?=site_url('admin/web_safe_colour/view_css_script'); ?>">
                                <i class="fa fa-eye fa-fw"></i> View CSS Export Script</a></li>
                    </ul>
                </div>
            </h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <h4 class="cr-content-panel-header">
                            <i class="fa fa-angle-right fa-fw"></i> Preview Script&nbsp;
                            <a id="download_script" class="btn btn-info btn-sm"
                               href="<?=site_url('admin/web_safe_colour/download_as_unity_csharp');?>"
                               target="_blank"><i class="fa fa-download fa-fw"></i> Download</a>
                        </h4>

                        <pre><?php $this->load->view('admin/web_safe_colour/download/unity_csharp_script');?></pre>
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