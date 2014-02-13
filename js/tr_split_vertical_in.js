function tr_makeArray(n){
this.length = n;
return this.length;
}
tr_messages = new tr_makeArray(1);
tr_messages[0] = document.title;
tr_rptType = 'infinite';
tr_rptNbr = 5;
tr_speed = 100;
tr_delay = 2000;
var tr_counter=1;
var tr_currMsg=0;
var tr_timerID = null
var tr_bannerRunning = false
var tr_state = ""
tr_clearState()
function tr_stopBanner() {
if (tr_bannerRunning)
clearTimeout(tr_timerID)
tr_timerRunning = false
}
function tr_startBanner() {
tr_stopBanner()
tr_showBanner()
}
function tr_clearState() {
tr_state = ""
for (var i = 0; i < tr_messages[tr_currMsg].length; ++i) {
tr_state += "0"
}
}
function tr_showBanner() {
if (tr_getString()) {
tr_currMsg++
if (tr_messages.length <= tr_currMsg) {
if ((tr_rptType == 'finite') && (tr_counter==tr_rptNbr)){
tr_stopBanner();
return;
}
tr_counter++;
tr_currMsg=0;
}
tr_clearState()
tr_timerID = setTimeout("tr_showBanner()", tr_delay)
}
else {
var tr_str = ""
for (var j = 0; j < tr_state.length; ++j) {
tr_str += (tr_state.charAt(j) == "1") ? tr_messages[tr_currMsg].charAt(j) : "____"
}
document.title = tr_str
tr_timerID = setTimeout("tr_showBanner()", tr_speed)
}
}
function tr_getString() {
var full = true
for (var j = 0; j < tr_state.length; ++j) {
if (tr_state.charAt(j) == 0)
full = false
}
if (full) return true
while (1) {
var num = tr_getRandom(tr_messages[tr_currMsg].length)
if (tr_state.charAt(num) == "0")
break
}
tr_state = tr_state.substring(0, num) + "1" + tr_state.substring(num + 1, tr_state.length)
return false
}
function tr_getRandom(max) {
var now = new Date()
var num = now.getTime() * now.getSeconds() * Math.random()
return num % max
}
tr_startBanner()


