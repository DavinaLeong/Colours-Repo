<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: generic_delete_modal.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 03 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $modal_title
 * @var $delete_url
 */
?><!-- Modal -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal_label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button id="close_modal_btn" type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="delete_modal_label"><?= $modal_title; ?></h3>
            </div>
            <div class="modal-body">
                <h4 class="text-danger"><i class="fa fa-exclamation-triangle fa-fw"></i> Are You Sure?</h4>
                <p>This action cannot be undone.</p>
                <p>Do you still want to delete this record?</p>
            </div>
            <div class="modal-footer">
                <a id="modal_delete_btn" type="button" class="btn btn-danger" href="<?= $delete_url; ?>">
                    <i class="fa fa-trash-o fa-fw"></i> Delete
                </a>
                <button id="modal_cancel_btn" type="button" class="btn btn-default cr-btn-default-border" data-dismiss="modal">
                    <i class="fa fa-ban fa-fw"></i> Cancel
                </button>
            </div>
        </div>
    </div>
</div>