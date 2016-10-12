<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: browse_migrations_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 11 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $migrations
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_snippets/meta_admin'); ?>

    <?php $this->load->view('admin/_snippets/head_resources'); ?>
    <link href="<?=RESOURCES_FOLDER;?>datatables/dataTables.min.css" type="text/css" rel="stylesheet" />
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
                <li class="active">Migrations</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-database fa-fw"></i> Migration Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Browse Migrations&nbsp;
                <div id="action-dropdown" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="run_current" href="<?=site_url('migrate/run_current');?>">
                                <i class="fa fa-play-circle fa-fw"></i> Run Current</a></li>
                        <li><a id="run_current" href="<?=site_url('migrate/run_latest');?>">
                                <i class="fa fa-play fa-fw"></i> Run Latest</a></li>
                    </ul>
                </div>
            </h3>
            <p class="lead">Click on a row to view run a Migration version.</p>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <table id="table_users" class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Version No</th>
                                <th>Current Version</th>
                                <th>Date Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if($migrations):
                                foreach($migrations as $migration): ?>
                                <tr id="run_migration<?=$migration['order_no'];?>" class="cr-clickable"
                                    onclick="window.open('<?=site_url("migrate/run_version/" . $migration["order_no"]); ?>', '_blank')">
                                    <td><?= $migration['order_no']; ?></td>
                                    <td><?= $migration['version_no']; ?></td>
                                    <td>
                                        <?php if($migration['current_version']): ?>
                                            <span class="label label-primary">Yes</span>
                                        <?php else: ?>
                                            <span class="label label-default">No</span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-sort="<?=$this->datetime_helper->format_internet_standard($migration['timestamp']);?>">
                                        <?= $this->datetime_helper->format_dd_mm_yyyy_hh_ii_ss($migration['timestamp']); ?></td>
                                </tr>
                            <?php
                                endforeach;
                            else: ?>
                                <tr>
                                    <td class="text-center" colspan="5">
                                        No Migrations found.
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
<script src="<?=RESOURCES_FOLDER;?>datatables/dataTables.min.js"></script>
<script>
    $('#table_users').DataTable({
        "order": [[3, 'desc']]
    });
</script>
</body>
</html>