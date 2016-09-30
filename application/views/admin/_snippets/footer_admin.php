<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: footer_admin.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 28th Sep 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
?><!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        <?php $today = new DateTime('today', new DateTimeZone(DATE_TIME_ZONE)); ?>
        <?= $today->format('Y'); ?> &#8226; Colour Repo
        <a href="blank.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->