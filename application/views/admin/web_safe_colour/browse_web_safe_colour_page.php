<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: browse_web_safe_colour_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 29th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $web_safe_colours
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
                <li class="active">Users</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-globe fa-fw"></i> Web Safe Colour Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Web Safe Colours Users</h3>
            <p class="lead">Click on a row to view a Web Safe Colour.</p>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <table id="table_users" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Selector</th>
                                <th>Hex</th>
                                <th style="width: 20%;">Colour</th>
                                <th>Last Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($web_safe_colours):
                                foreach($web_safe_colours as $colour): ?>
                                <tr id="view_web_safe_colour_<?=$colour['colour_id'];?>" class="cr-clickable"
                                    onclick="location.href = '<?=site_url("admin/web_safe_colour/view_web_safe_colour/" . $colour["colour_id"]); ?>'">
                                    <td><?= $colour['colour_name']; ?></td>
                                    <td><?= $colour['colour_selector']; ?></td>
                                    <td><?= $colour['hex']; ?></td>
                                    <td style="width: 20%; background: <?=$colour['hex']; ?>;">&nbsp;</td>
                                    <td><?= $this->datetime_helper->format_dd_mm_yyyy_dash($colour['last_updated']); ?></td>
                                </tr>
                            <?php
                                endforeach;
                            else:
                            ?>
                                <tr>
                                    <td class="text-center" colspan="5">
                                        No Web Safe Colour records found.<br/>
                                        <a href="<?=site_url('admin/web_safe_colour/new_web_safe_colour'); ?>">Add a Web Safe Colour</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section><!-- /wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
</body>
</html>