<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><script src="<?=RESOURCES_FOLDER;?>js/jquery.js"></script>
<script src="<?=RESOURCES_FOLDER;?>js/bootstrap.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>js/jquery.ui.touch-punch.min.js"></script>
<script class="include" type="text/javascript" src="<?=RESOURCES_FOLDER;?>js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?=RESOURCES_FOLDER;?>js/jquery.scrollTo.min.js"></script>
<script src="<?=RESOURCES_FOLDER;?>js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="<?=RESOURCES_FOLDER;?>js/common-scripts.js"></script>

<!--script for this page-->

<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>