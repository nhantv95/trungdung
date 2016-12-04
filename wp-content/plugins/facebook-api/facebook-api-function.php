<?php 
/**
 * @package Facebook_API
 * @version 1.0
 */
/*
Plugin Name: Facebook API
Plugin URI: http://wordpress.org/plugins/facebook-api
Description: This is a facebook api plugin. You can easily use facebook like box, website comment, share, send button, embedded post and more feature use this wordpress plugin.
Author: Dipto Paul
Version: 1.0
Author URI: http://webprojectbd.blogspot.com
*/


/**=====================================================
				Facebook API JavaScript
======================================================**/

function facebook_api_javascript_plugin() {
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_US/sdk.js#xfbml=1&appId=310860795753134&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php

}
add_action('wp_head', 'facebook_api_javascript_plugin');


/**=====================================================
				Facebook API CSS
======================================================**/

function facebook_api_custom_css() {

    wp_enqueue_style( 'facebook_api_css', plugins_url( '/css/facebook-api-style.css', __FILE__ ));
}
add_action('admin_head','facebook_api_custom_css');

/**=====================================================
				Shortcode Support in Widget
======================================================**/

add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');

/**=====================================================
				Facebook API Files
======================================================**/

define( 'FACEBOOK_API_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require_once( FACEBOOK_API_PLUGIN_DIR . 'facebook-api-widget.php' );
require_once( FACEBOOK_API_PLUGIN_DIR . 'facebook-api-shortcode.php' );


/**=====================================================
				Facebook API TinyMce on Editor
======================================================**/

function facebook_api_tinymce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'fB_api_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'fb_api_register_mce_button' );
	}
}
add_action('admin_head', 'facebook_api_tinymce_button');

// Declare script for new button
function fB_api_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['facebook_api_tinymce'] = plugin_dir_url( __FILE__ ) . 'js/shortcode-tinymce-button.js';
	return $plugin_array;
}

// Register new button in the editor
function fb_api_register_mce_button( $buttons ) {
	array_push( $buttons, 'facebook_api_tinymce' );
	return $buttons;
}
	
	
?>