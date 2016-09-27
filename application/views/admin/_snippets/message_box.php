<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if($this->session->userdata('message')):?>
    <div id="message_box" class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <?= $this->session->userdata('message') ?>
    </div>
    <?php $this->session->unset_userdata('message') ?>
<?php endif;?>