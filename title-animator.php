<?php
/*
Plugin Name: Title Animator
Plugin URI: https://wordpress.org/plugins/title-animator/
Description: Animated Title (Title tag) in Wordpress.
Version:1.0
Author: Arkaprava Majumder
Author URI: http://arkapravamajumder.com
License: GPL
*/
error_reporting(0);
define('TR_PLUGIN_DIR_NAME','title-animator');
class TitleAnimator
{
    function __construct()
    {
        add_action('admin_menu',array(&$this,'tr_dashboard'));
        add_action('wp_enqueue_scripts',array(&$this,'tr_jsintegrate'));
		add_action('admin_enqueue_scripts',array(&$this,'tr_jsintegrate'));
		register_activation_hook( __FILE__, array( &$this, 'tr_activation' ) );
		register_deactivation_hook( __FILE__, array( &$this, 'tr_deactivation' ) );
    }
    function tr_activation()
    {
		update_option( 'tr_radio','marquee' ); 
    }
    function tr_dashboard()
    {
        add_options_page( 'Title Animator','Title Animator','manage_options','title_animator', array( &$this, 'settings_page' ) );
    }
    function settings_page()
    {
        include "inc/settings-page.php";
    }
    function tr_jsintegrate()
    {
        $option=get_option('tr_radio');
        switch($option)
        {
            case "type_write":
                wp_register_script('type_writejs',plugins_url(TR_PLUGIN_DIR_NAME.'/js/type_write.js'),'','',true);
		wp_enqueue_script('type_writejs');
                break;
            case "blink":
                wp_register_script('blinkjs',plugins_url(TR_PLUGIN_DIR_NAME.'/js/blink.js'),'','',true);
		wp_enqueue_script('blinkjs');
                break;
            case "marquee":
                wp_register_script('marqueejs',plugins_url(TR_PLUGIN_DIR_NAME.'/js/marquee.js'),'','',true);
		wp_enqueue_script('marqueejs');
                break;
            case "split_vertical_in":
                wp_register_script('split_vertical_injs',plugins_url(TR_PLUGIN_DIR_NAME.'/js/tr_split_vertical_in.js'),'','',true);
		wp_enqueue_script('split_vertical_injs');
                break;
	    case "slide_inout":
                wp_register_script('slide_inoutjs',plugins_url(TR_PLUGIN_DIR_NAME.'/js/slide_inout.js'),'','',true);
		wp_enqueue_script('slide_inoutjs');
                break;
        }
    }
    function tr_deactivation()
    {
		delete_option( 'tr_radio' ); 
    }
}
new TitleAnimator;


