<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: new_web_safe_colour.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 01 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $colour_type_options
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
                <li><a href="<?=site_url('admin/web_safe_colour/browse_web_safe_colour');?>">Web Safe Colours</a></li>
                <li class="active">New Web Safe Colour</li>
            </ol>

            <h1 class="page-header"><i class="fa fa-globe fa-fw"></i> Web Safe Colours Module</h1>
            <h3><i class="fa fa-angle-right fa-fw"></i> New Web Safe Colour</h3>

            <div class="row mt">
                <div class="col-lg-12">
                    <?php $this->load->view('admin/_snippets/validation_errors_box'); ?>
                    <?php $this->load->view('admin/_snippets/message_box'); ?>

                    <div class="content-panel">
                        <form id="new_web_safe_colour_form" class="form-horizontal" method="post" data-parsley-validate>

                            <fieldset>
                                <legend>Name</legend>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour_name">
                                        Name <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" id="colour_name" name="colour_name"
                                               placeholder="Name" required minlength="3" maxlength="512"
                                               value="<?=set_value('colour_name');?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour_selector">
                                        Selector <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" id="colour_selector"
                                               name="colour_selector" placeholder="Name" required minlength="3"
                                               maxlength="512" data-parsley-type="alphanum"
                                               value="<?=set_value('colour_selector');?>" />
                                        <p class="help-block">Only letters and numbers allowed.</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2" for="colour_type">Type <span class="text-danger">*</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="colour_type" name="colour_type" required>
                                            <option value="" id="colour_type_none"></option>
                                            <?php foreach($colour_type_options as $key=>$option): ?>
                                            <option value="<?=$option;?>" id="colour_type_<?=$key;?>"
                                                <?=set_select("colour_type", $option);?>><?=$option;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <br/>
                            <div id="RgbColourFields"></div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-2">
                                    <button id="submit_btn" class="btn btn-theme" type="submit">
                                        <i class="fa fa-check fa-fw"></i> Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php $this->load->view('admin/_snippets/footer_admin'); ?>
</section>

<?php $this->load->view('admin/_snippets/body_resources'); ?>
<script src="<?=RESOURCES_FOLDER;?>vendor/parsleyjs/parsley.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>vendor/numeral/numeral.min.js"></script>

<!-- React start -->
<script src="<?=RESOURCES_FOLDER;?>vendor/react/react-with-addons.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>vendor/react/react-dom.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>colour_repo/dist/jsx/RgbColourFields.min.js"></script>
<script>
    var element = React.createElement(RgbColourFields, {
        REGEX_PARSLEY_COLOUR_HEX: "<?=REGEX_PARSLEY_COLOUR_HEX;?>"
    });
    ReactDOM.render(
        element,
        document.getElementById('RgbColourFields')
    );
</script>
<!-- React end -->
</body>
</html>