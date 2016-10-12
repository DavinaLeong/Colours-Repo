<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: new_web_safe_colour.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 03 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $colour
 * @var $web_safe_colours
 * @var $modal_subject
 * @var $delete_url
 */
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/_snippets/meta_admin'); ?>

    <?php $this->load->view('admin/_snippets/head_resources'); ?>
    <link href="<?=RESOURCES_FOLDER;?>datatables/dataTables.min.css" type="text/css" rel="stylesheet" />
    <style>
        .cr-red {
            color: #f00;
        }

        .cr-green {
            color: #0f0;
        }

        .cr-blue {
            color: #00f;
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
                <li class="active">Web Safe Colour ID: <?= $colour['colour_id']; ?></li>
            </ol>

            <h1 class="page-header"><i class="fa fa-globe fa-fw"></i> Web Safe Colours Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> View Web Safe Colour&nbsp;
                <div id="action-dropdown" class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a id="edit_record"
                               href="<?=site_url('admin/web_safe_colour/edit_web_safe_colour/' . $colour['colour_id']); ?>">
                                <i class="fa fa-pencil-square-o fa-fw"></i> Edit Web Safe Colour</a></li>
                        <li><a id="delete_record" class="cr-clickable" data-toggle="modal" data-target="#delete_modal">
                                <i class="fa fa-trash-o fa-fw"></i> Delete Web Safe Colour</a></li>
                    </ul>
                </div>
            </h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <form id="view_web_safe_colour_form" class="form-horizontal">
                            <input id="colour_id" type="hidden" value="<?= $colour['colour_id']; ?>" />

                            <fieldset>
                                <legend>Name</legend>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour_name">Name</label>
                                    <div class="col-md-10">
                                        <p id="color_name" class="form-control-static">
                                            <?=$colour['colour_name']; ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour_selector">Selector</label>
                                    <div class="col-md-10">
                                        <p id="colour_selector" class="form-control-static">
                                            <?= $colour['colour_selector']; ?></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour">Colour</label>
                                    <div class="col-md-10">
                                        <div class="row cr-colour-row">
                                            <div class="col-md-3 cr-colour-col" style="color: <?=$colour['hex'];?>">
                                                Foreground
                                            </div>
                                            <div class="col-md-3 cr-colour-col" style="background-color: <?=$colour['hex'];?>">
                                                Background
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour_type">Type</label>
                                    <div class="col-md-10">
                                        <p id="colour_type" class="form-control-static">
                                            <?= $colour['colour_type']; ?></p>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Values</legend>
                                <!-- RGB (0 - 255) -->
                                <div class="form-group">
                                    <label class="control-label col-md-2">RGB<br/>(0-255)</label>
                                    <div class="col-md-10">
                                        <p class="form-control-static">
                                            <p id="red_255" class="cr-red">R: <?=$colour['red_255'];?></p>
                                            <p id="green_255" class="cr-green">G: <?=$colour['green_255'];?></p>
                                            <p id="blue_255" class="cr-blue">B: <?=$colour['blue_255'];?></p>
                                        </p>
                                    </div>
                                </div>

                                <!-- RGB (0.00 - 1.00) -->
                                <div class="form-group">
                                    <label class="control-label col-md-2">RGB<br/>(0.00-1.00)</label>
                                    <div class="col-md-10">
                                        <p class="form-control-static">
                                            <p id="red_ratio" class="cr-red">R: <?=$colour['red_ratio'];?></p>
                                            <p id="green_ratio" class="cr-green">G: <?=$colour['green_ratio'];?></p>
                                            <p id="blue_ratio" class="cr-blue">B: <?=$colour['blue_ratio'];?></p>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="hex">Hex</label>
                                    <div class="col-md-10">
                                        <p id="hex" class="form-control-static"><?= $colour['hex']; ?></p>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend>Dates</legend>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="date_added">Date Added</label>
                                    <div class="col-md-10">
                                        <p id="date_added" class="form-control-static">
                                            <?= $this->datetime_helper->format_dd_mmm_yyyy_space($colour['date_added']) ;?>
                                        </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="last_updated">Last Updated</label>
                                    <div class="col-md-10">
                                        <p id="last_updated" class="form-control-static">
                                            <?= $this->datetime_helper->format_internet_standard($colour['last_updated']) ;?>
                                        </p>
                                    </div>
                                </div>
                            </fieldset>

                        </form>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="content-panel">

                                <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i>&nbsp;
                                    <strong style="color: <?=$colour['hex'];?>;border-bottom: thin dotted #ccc;">
                                        <?=$colour['colour_name'];?></strong> as Foreground Colour</h4>
                                <table id="table_foreground" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Colour Name</th>
                                        <th style="width: 40%">Colour Cell</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($web_safe_colours as $key=>$web_safe_colour): ?>
                                        <tr>
                                            <td><?= ($key + 1); ?></td>
                                            <td><?= $web_safe_colour['colour_name']; ?></td>
                                            <td class="cr-colour-bar" style="color: <?= $colour['hex']; ?>;
                                                background-color: <?= $web_safe_colour['hex']; ?>">Lorem Ipsum</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content-panel">

                                <h4 class="cr-content-panel-header"><i class="fa fa-angle-right fa-fw"></i>&nbsp;
                                    <strong style="color: <?=$colour['hex'];?>; border-bottom: thin dotted #ccc;">
                                        <?=$colour['colour_name'];?></strong> as Background Colour</h4>
                                <table id="table_background" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Colour Name</th>
                                        <th style="width: 40%">Colour Cell</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($web_safe_colours as $key=>$web_safe_colour): ?>
                                        <tr>
                                            <td><?= ($key + 1); ?></td>
                                            <td><?= $web_safe_colour['colour_name']; ?></td>
                                            <td class="cr-colour-bar" style="color: <?= $web_safe_colour['hex']; ?>;
                                                background-color: <?= $colour['hex']; ?>">Lorem Ipsum</td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <?php $this->load->view('admin/_snippets/generic_delete_modal');?>

                </div>
            </div>

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
<script src="<?=RESOURCES_FOLDER;?>datatables/dataTables.min.js"></script>
<script>
    $(document).ready(function()
    {
        $('#table_foreground').DataTable({
            "order": [[0, 'asc']]
        });
        $('#table_background').DataTable({
            "order": [[0, 'asc']]
        });
    });
</script>
</body>
</html>