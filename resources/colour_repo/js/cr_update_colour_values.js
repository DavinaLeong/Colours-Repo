/**********************************************************************************
	- File Info -
		File name		: cr_update_colour_values.jpg
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 07 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
const MAX_VAL = 255;

// Avoid caching jQuery selectors more than once
var cr_forground_sample = $('#cr-foreground-sample');
var cr_background_sample = $('#cr-background-sample');

// Form Fields
var $red_255 = null;
var $green_255 = null;
var $blue_255 = null;

var $red_ratio = null;
var $green_ratio = null;
var $blue_ratio = null;

var $hex = null;

$(document).ready(function()
{
    // Avoid caching jQuery selectors more than once
    cr_forground_sample = $('#cr-foreground-sample');
    cr_background_sample = $('#cr-background-sample');

    // Form Fields
    $red_255 = $('#red_255');
    $green_255 = $('#green_255');
    $blue_255 = $('#blue_255');

    $red_ratio = $('#red_ratio');
    $green_ratio = $('#green_ratio');
    $blue_ratio = $('#blue_ratio');

    $hex = $('#hex');

    // OnChange functions
    $red_255.change(function()
    {
        $red_ratio.val(cr_convert_to_ratio($red_255.val()));
        cr_update_hex();
    });

    $green_255.change(function()
    {
        $green_ratio.val(cr_convert_to_ratio($green_255.val()));
        cr_update_hex();
    });

    $blue_255.change(function()
    {
        $blue_ratio.val(cr_convert_to_ratio($blue_255.val()));
        cr_update_hex();
    });
});

function cr_update_colour_sample()
{
    cr_forground_sample.attr('style', 'color: ' + $hex.val());
    cr_background_sample.attr('style', 'background-color: ' + $hex.val());
}

function cr_update_hex()
{
    // only update hex value if all RGB Values fields are filled
    if($red_255.val() !== '' &&
        $green_255.val() !== '' &&
        $blue_255.val() !== '')
    {
        var red = Math.abs($red_255.val()).toString(16);
        var green = Math.abs($green_255.val()).toString(16);
        var blue = Math.abs($blue_255.val()).toString(16);

        if(red.length < 2)
        {
            red += '0';
        }

        if(green.length < 2)
        {
            green += '0';
        }

        if(blue.length < 2)
        {
            blue += '0';
        }

        $hex.val('#' + red + green + blue);

        cr_update_colour_sample();

        red_255_changed = false;
        green_255_changed = false;
        blue_255_changed = false;
    }
}

function cr_convert_to_ratio(value)
{
    if(value >= 0 && value <= MAX_VAL)
    {
        return numeral(value / MAX_VAL).format('0.00');
    }
    else
    {
        throw 'InvalidValueError: Value must be between 0 and 255 (inclusive).';
    }
}