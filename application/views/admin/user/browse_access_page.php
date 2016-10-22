<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: access_colours_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 08 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $access_options
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_snippets/meta_admin'); ?>

    <?php $this->load->view('admin/_snippets/head_resources'); ?>
    <link href="<?=RESOURCES_FOLDER;?>vendor/datatables/dataTables.min.css" type="text/css" rel="stylesheet" />
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
                <li><a href="<?=site_url('admin/user/browse_user');?>">Users</a></li>
                <li class="active">Access Colours</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-users fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Access Colours</h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <table id="table_access" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                                <th>Hexadecimal</th>
                                <th>Colour</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($access_options as $key=>$access_option): ?>
                            <tr>
                                <td><?=$access_option['name'];?></td>
                                <td><?=$key;?></td>
                                <td><?=$access_option['hex'];?></td>
                                <td data-sort="<?=$access_option['hex'];?>" class="cr-colour-bar"
                                    style="background: <?=$access_option['hex'];?>;">&nbsp;</td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
<script src="<?=RESOURCES_FOLDER;?>vendor/datatables/dataTables.min.js"></script>
<script>
    $(document).ready(function()
    {
        $('#table_access').DataTable({
            "order": [[0, 'asc']]
        });
    });
</script>
</body>
</html>