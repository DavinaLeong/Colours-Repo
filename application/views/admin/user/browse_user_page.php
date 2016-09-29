<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: browse_user_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 29th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $users
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

            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> User Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> Browse Users</h3>
            <p class="lead">Click on a row to view a User record.</p>

            <div class="row mt">
                <div class="col-lg-12">

                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <table id="table_users" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Access</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <tr id="view_user_<?=$user['user_id'];?>" class="cr-clickable"
                                    onclick="window.open('<?=site_url("admin/user/view_user/" . $user["user_id"]); ?>', '_blank')">
                                    <td><?= $user['username']; ?></td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['access_str']; ?></td>
                                    <td><?= $user['status']; ?></td>
                                    <td><?= $this->datetime_helper->format_dd_mm_yyyy_dash($user['last_updated']); ?></td>
                                </tr>
                            <?php endforeach; ?>
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