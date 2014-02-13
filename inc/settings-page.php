<?php
error_reporting(0);
$opt_name=array("tr_radio"=>"tr_radio");
$opt_value=array("tr_radio_value"=>get_option($opt_name['tr_radio']));
if(isset($_POST['tr_radio_submit']))
{
	$opt_value=array("tr_radio_value"=>$_POST[$opt_name['tr_radio']]);
	update_option($opt_name['tr_radio'],$opt_value['tr_radio_value']);
?>
<div id="message" class="updated fade"><p><strong><?php _e('Option Saved. :)'); ?></strong></p></div>
<?php
}
?>
<script>
function check_radio(id)
{
    document.getElementById(id).checked=true;
}
</script>
<style>
th
{
	cursor: pointer;
}
</style>
<div class="wrap">
<h2><?php _e('Title Animator Settings')?></h2>
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
<table class="wp-list-table widefat plugins" cellspacing="2">
<tr ><th class="manage-column column-cbd" colspan="2">Choose An Option: </th></tr>
<tr><th><input id="type_write" type="radio" name="<?php echo $opt_name['tr_radio'];?>" value="type_write" <?php if($opt_value['tr_radio_value']=="type_write")
echo 'checked="checked"';
?>></th><th onclick="check_radio('type_write');">Type-Writer Effect</th></tr>
<tr><th><input id="blink" type="radio" name="<?php echo $opt_name['tr_radio'];?>" value="blink" <?php  if($opt_value['tr_radio_value']=="blink")
echo 'checked="checked"';
?>></th><th onclick="check_radio('blink');">Blink Effect</th></tr>
    <tr><th><input id="marquee" type="radio" name="<?php echo $opt_name['tr_radio'];?>" value="marquee" <?php  if($opt_value['tr_radio_value']=="marquee")
		   echo 'checked="checked"';
		    ?>></th><th onclick="check_radio('marquee');">Marquee Effect</th></tr>
    <tr><th><input id="split_vertical_in" type="radio" name="<?php echo $opt_name['tr_radio'];?>" value="split_vertical_in" <?php  if($opt_value['tr_radio_value']=="split_vertical_in")
		   echo 'checked="checked"';
		    ?>></th><th onclick="check_radio('split_vertical_in');">Spilt Vertical In Effect</th></tr>
    <tr><th><input id="slide_inout" type="radio" name="<?php echo $opt_name['tr_radio'];?>" value="slide_inout" <?php  if($opt_value['tr_radio_value']=="slide_inout")
		   echo 'checked="checked"';
		    ?>></th><th onclick="check_radio('slide_inout');">Slide InOut Effect</th></tr>
    
    </table>
    <p class="submit">
    <input id="submit" class="button button-primary" type="submit" value="Save" name="tr_radio_submit">
    </p>
</form>
</div>