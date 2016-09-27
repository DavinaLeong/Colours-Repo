<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if(validation_errors()):?>
    <div id="validation_error_box" class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <?=validation_errors();?>
    </div>
<?php endif;?>