/**********************************************************************************
	- File Info -
		File name		: cr-clock.jpg
		Author(s)		: DAVINA Leong Shi Yun
		Date Created	: 14 Oct 2016

	- Contact Info -
		Email	: leong.shi.yun@gmail.com
		Mobile	: (+65) 9369 3752 [Singapore]

***********************************************************************************/
var $cr_show_now = null;
$(document).ready(function()
{
    $cr_show_now = $('.cr-clock');
    setInterval(show_now, 1000);
});

function show_now()
{
    var day_names = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var month_names = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var now = new Date();
    var day_str = day_names[now.getDay()];

    var date_str = leading_zeros(now.getDate());
    var month_str = month_names[now.getMonth()];
    var year_str = now.getFullYear().toString();

    var hours_str = leading_zeros(now.getHours());
    var minutes_str = leading_zeros(now.getMinutes());
    var seconds_str = leading_zeros(now.getSeconds());

    var space_str = ' ';

    var datetime_str = day_str + ', ' + date_str + space_str + month_str + space_str + year_str + space_str + hours_str + ':' + minutes_str + ':' + seconds_str;
    $cr_show_now.html(datetime_str);
}

function leading_zeros(value)
{
    if(isNaN(value))
    {
        return 0;
    }
    else if(value < 10)
    {
        return '0' + value.toString();
    }
    else
    {
        return value.toString();
    }
}