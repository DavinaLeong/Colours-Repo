<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**********************************************************************************
	- File Info -
		File name		: unity_csharp_script.php
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
echo $tab . $tab . "File name" . $tab . $tab . ": WebSafeColours.cs" . $newline;
echo $tab . $tab . "Author(s)" . $tab . $tab . ": DAVINA Leong Shi Yun" . $newline;
echo $tab . $tab . "Date Created" . $tab . ": " . $this->datetime_helper->today('d M Y') . $newline;
echo $emptyline;
echo $tab . "- Contact Info -" . $newline;
echo $tab . $tab . "Email" . $tab . ": davina_leong@outlook.com.sg" . $newline;
echo $tab . $tab . "Mobile" . $tab . ": (+65) 9369 3752 [Singapore]" . $newline;
echo $emptyline;
echo "***********************************************************************************/" . $newline;
#endregion

#region File Imports
echo "using UnityEngine;" . $newline;
echo "using System.Collections;" . $newline;
echo $newline;
#endregion

#region Static Class
echo "public static class WebSafeColours" . $newline;
echo "{" . $newline;
echo $tab . "public const string CLASS_NAME = \"WebSafeColours\";" . $newline;
echo $emptyline;

#region Colour Values
echo $tab . "#region Default Colour Values" . $newline;
foreach($default_colours as $colour)
{
    $rgb = $colour['red_ratio'] . 'f, ' . $colour['green_ratio'] . 'f, ' . $colour['blue_ratio'] . 'f, 1f';
    echo $tab . "public static Color " . $colour['colour_selector'] . $newline;
    echo $tab . "{" . $newline;
    echo $tab . $tab . "get" . $newline;
    echo $tab . $tab . "{" . $newline;
    echo $tab . $tab . $tab . "return new Color(" . $rgb. ");" . $newline;
    echo $tab . $tab . "}" . $newline;
    echo $tab . "}" . $newline;
}
echo $tab . "public static Color Clear" . $newline;
echo $tab . "{" . $newline;
echo $tab . $tab . "get" . $newline;
echo $tab . $tab . "{" . $newline;
echo $tab . $tab . $tab . "return new Color(0f, 0f, 0f, 0f);" . $newline;
echo $tab . $tab . "}" . $newline;
echo $tab . "}" . $newline;
echo $tab . "#endregion" . $newline;
echo $emptyline;

echo $tab . "#region Other Colour Values" . $newline;
foreach($other_colours as $colour)
{
    $rgb = $colour['red_ratio'] . 'f, ' . $colour['green_ratio'] . 'f, ' . $colour['blue_ratio'] . 'f, 1f';
    echo $tab . "public static Color " . $colour['colour_selector'] . $newline;
    echo $tab . "{" . $newline;
    echo $tab . $tab . "get" . $newline;
    echo $tab . $tab . "{" . $newline;
    echo $tab . $tab . $tab . "return new Color(" . $rgb. ");" . $newline;
    echo $tab . $tab . "}" . $newline;
    echo $tab . "}" . $newline;
}
echo $tab . "#endregion" . $newline;
#endregion
echo $emptyline;

echo "} // end WebSafeColours class";
#endregion