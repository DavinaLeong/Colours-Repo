<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: css_script.php
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 12 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
/**
 * @var $default_colours
 * @var $other_colours
 */

$newline = "\n";
$tab = "\t";
$emptyline = $tab . $newline;

#region File Header
echo "/**********************************************************************************" . $newline;
echo $tab . "- File Info -" . $newline;
echo $tab . $tab . "File name" . $tab . $tab . ": web_safe_colours.css" . $newline;
echo $tab . $tab . "Author(s)" . $tab . $tab . ": DAVINA Leong Shi Yun" . $newline;
echo $tab . $tab . "Date Created" . $tab . ": " . $this->datetime_helper->today('d M Y') . $newline;
echo $emptyline;
echo $tab . "- Contact Info -" . $newline;
echo $tab . $tab . "Email" . $tab . ": leong.shi.yun@gmail.com" . $newline;
echo $tab . $tab . "Mobile" . $tab . ": (+65) 9369 3752 [Singapore]" . $newline;
echo $emptyline;
echo "***********************************************************************************/" . $newline;
#endregion
echo $emptyline;
echo $emptyline;

#region Default Colours
echo "/*=====================*/" . $newline;
echo "/*   Default Colours   */" . $newline;
echo "/*=====================*/" . $newline;
echo $emptyline;
#region Foreground
echo "/*--- Foreground ---*/" . $newline;
foreach($default_colours as $key=>$colour)
{
    echo ".wsc-colour-" . strtolower($colour['colour_selector']) ." {" . $newline;
    echo $tab . "color: " . $colour['hex'] . ";" . $newline;
    echo "}" . $newline;
}
#endregion
echo $emptyline;

#region Background
echo "/*--- Background ---*/" . $newline;
foreach($default_colours as $key=>$colour)
{
    echo ".wsc-background-" . strtolower($colour['colour_selector']) ." {" . $newline;
    echo $tab . "background-color: " . $colour['hex'] . ";" . $newline;
    echo "}" . $newline;
}
#endregion
#endregion
echo $emptyline;
echo $emptyline;

#region Other Colours
echo "/*===================*/" . $newline;
echo "/*   Other Colours   */" . $newline;
echo "/*===================*/" . $newline;
echo $emptyline;
#region Foreground
echo "/*--- Foreground ---*/" . $newline;
foreach($other_colours as $key=>$colour)
{
    echo ".wsc-colour-" . strtolower($colour['colour_selector']) ." {" . $newline;
    echo $tab . "color: " . $colour['hex'] . ";" . $newline;
    echo "}" . $newline;
}
#endregion
echo $emptyline;

#region Background
echo "/*--- Background ---*/" . $newline;
foreach($other_colours as $key=>$colour)
{
    echo ".wsc-background-" . strtolower($colour['colour_selector']) ." {" . $newline;
    echo $tab . "background-color: " . $colour['hex'] . ";" . $newline;
    echo "}" . $newline;
}
#endregion
#endregion
echo $emptyline;

echo '/*   - end of file -   */';