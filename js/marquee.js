var space = " ";
var speed = "200";
var position = 0;
var main_title = document.title+"  ";
function tr_marquee()
{
document.title = main_title.substring(position, main_title.length) + space + main_title.substring(0,position);
position++;
    if (position > main_title.length)
    {
        position = 0;
    }
window.setTimeout("tr_marquee()", speed);
}
tr_marquee();