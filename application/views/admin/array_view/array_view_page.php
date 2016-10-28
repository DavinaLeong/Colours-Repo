<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: array_view_page.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 27 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $entries
 * @var $field_names
 * @var $array_name
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('admin/array_view/array_view_header'); ?>
</head>
<body>
<div class="container">
    <pre><code><?php
            $tab = '&nbsp;&nbsp;&nbsp;&nbsp;';
            $newline = '<br/>';
            $emptyline = $tab . $newline;

            echo "\$" . $array_name . " = array (" . $newline;
            foreach($entries as $key=>$entry)
            {
                echo $tab . "array (" . $newline;

                foreach($field_names as $field_key=>$field_name)
                {
                    if($field_key >= count($field_names) - 1)
                    {
                        echo $tab . $tab . "'" . $field_name. "' => '" . $entry[$field_name] . "'" . $newline;
                    }
                    else
                    {
                        echo $tab . $tab . "'" . $field_name. "' => '" . $entry[$field_name] . "'," . $newline;
                    }
                }

                if($key >= count($entries) - 1)
                {
                    echo $tab . ")" . $newline;
                }
                else
                {
                    echo $tab . ")," . $newline;
                }
            }
            echo ");" . $newline;
            ?></code></pre>
</div>
</body>
</html>