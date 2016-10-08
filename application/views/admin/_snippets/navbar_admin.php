<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: navbar_admin.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 23rd Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
?><!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
<!--header start-->
<header class="header black-bg">
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="<?= site_url('admin/authenticate/start'); ?>" class="logo">
        <img src="<?=RESOURCES_FOLDER;?>colour_repo/img/webpage_icon.png" alt="Website Logo" height=20px" /> <b>Colour Repo</b></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
    </div>
    <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li><a class="logout" href="<?= site_url('admin/authenticate/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
        </ul>
    </div>
</header>
<!--header end-->

<!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <div id="profile_anchor">
                <p class="centered"><img src="<?=RESOURCES_FOLDER;?>colour_repo/img/webpage_icon.png"
                                         alt="Website Logo" height="60px" /></p>
                <h5 class="centered"><?=$this->session->userdata('name');?></h5>
                <h6 class="centered"><?=$this->session->userdata('username');?></h6>
                <div class="centered"><a id="view_profile" class="btn btn-theme03 btn-sm" href="<?=site_url('admin/personal_profile/view_personal_profile');?>"><i class="fa fa-user fa-fw"></i> View Profile</a></div>
            </div>

            <li class="mt">
                <a href="<?= site_url(ADMIN_HOME_URL); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
                <ul class="sub">
                    <li><a href="<?= site_url('admin/user/browse_user'); ?>">Browse Users</a></li>
                    <li><a href="<?= site_url('admin/user/new_user'); ?>">New User</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-globe"></i>
                    <span>Web Safe Colours</span>
                </a>
                <ul class="sub">
                    <li><a href="<?= site_url('admin/web_safe_colour/browse_web_safe_colour'); ?>">
                            Browse Web Safe Colours</a></li>
                    <li><a href="<?= site_url('admin/web_safe_colour/new_web_safe_colour'); ?>">
                            New Web Safe Colour</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->