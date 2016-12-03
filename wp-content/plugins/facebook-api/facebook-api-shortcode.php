<?php 

/**=======================================================
			Facebook Like Box Shortcode
========================================================**/

function facebook_likebox_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://www.facebook.com/FacebookDevelopers',
		'color' => 'light',
		'width' => 300,
		'height' => '',
		'faces' => 	true,
		'stream' => false,
		'header' => false,
		'border' => true,
	), $atts ) );

	return '<div class="fb-like-box" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$color.'" data-show-faces="'.$faces.'" data-header="'.$header.'" data-stream="'.$stream.'" data-show-border="'.$border.'"></div>';
}
add_shortcode('facebook_likebox', 'facebook_likebox_shortcode');


/**======================================================
			Facebook Embedded Posts Shortcode
========================================================**/

function facebook_embedded_post_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://www.facebook.com/FacebookDevelopers/posts/10151471074398553',
		'width' => '',
	), $atts ) );

	return '<div class="fb-post" data-href="'.$url.'" data-width="'.$width.'"></div>';
}
add_shortcode('facebook_post', 'facebook_embedded_post_shortcode');


/**======================================================
			Facebook Comments Shortcode
========================================================**/

function facebook_comment_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://developers.facebook.com/docs/plugins/comments/',
		'width' => '',
		'number' => 5,
		'color' => 'light',
	), $atts ) );

	return '<div class="fb-comments" data-href="'.$url.'" data-width="'.$width.'" data-numposts="'.$number.'" data-colorscheme="'.$color.'"></div>';
}
add_shortcode('facebook_comment', 'facebook_comment_shortcode');


/**======================================================
			Facebook Facepile Shortcode
========================================================**/

function facebook_facepile_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'id' => '',
		'url' => 'http://www.facebook.com/FacebookDevelopers',
		'width' => '',
		'height' => '',
		'row' => 1,
		'size' => 'medium',
		'color' => 'light',
		'count' => true,
	), $atts ) );

	return '<div class="fb-facepile" data-app-id="'.$id.'" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-max-rows="'.$row.'" data-colorscheme="'.$color.'" data-size="'.$size.'" data-show-count="'.$count.'"></div>';
}
add_shortcode('facebook_facepile', 'facebook_facepile_shortcode');


/**======================================================
			Facebook Follow Button Shortcode
========================================================**/

function facebook_follow_button_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://www.facebook.com/dipto01',
		'width' => '',
		'height' => '',
		'color' => 'light',
		'layout' => 'standard',
		'faces' => false,
	), $atts ) );

	return '<div class="fb-follow" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$color.'" data-layout="'.$style.'" data-show-faces="'.$faces.'"></div>';
}
add_shortcode('facebook_follow', 'facebook_follow_button_shortcode');


/**======================================================
			Facebook Like Button Shortcode
========================================================**/

function facebook_like_button_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://developers.facebook.com/docs/plugins/',
		'width' => '',
		'layout' => 'standard',
		'action' => 'like',
		'faces' => true,
		'share' => true,
	), $atts ) );

	return '<div class="fb-like" data-href="'.$url.'" data-width="'.$width.'" data-layout="'.$layout.'" data-action="'.$action.'" data-show-faces="'.$faces.'" data-share="'.$share.'"></div>';
}
add_shortcode('facebook_like', 'facebook_like_button_shortcode');


/**======================================================
			Facebook Share Button Shortcode
========================================================**/

function facebook_share_button_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://developers.facebook.com/docs/plugins/',
		'width' => '',
		'layout' => 'button_count',
	), $atts ) );

	return '<div class="fb-share-button" data-href="'.$url.'" data-layout="'.$layout.'"></div>';
}
add_shortcode('facebook_share', 'facebook_share_button_shortcode');


/**======================================================
			Facebook Send Button Shortcode
========================================================**/

function facebook_send_button_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'url' => 'http://developers.facebook.com/docs/plugins/',
		'width' => '',
		'height' => '',
		'color' => 'light',
	), $atts ) );

	return '<div class="fb-send" data-href="'.$url.'" data-width="'.$width.'" data-height="'.$height.'" data-colorscheme="'.$color.'"></div>';
}
add_shortcode('facebook_send', 'facebook_send_button_shortcode');


/**======================================================
			Facebook Login Button Shortcode
========================================================**/

function facebook_login_button_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
		'row' => 1,
		'size' => 'medium',
		'faces' => true,
		'logout' => true,
	), $atts ) );

	return '<div class="fb-login-button" data-max-rows="'.$row.'" data-size="'.$size.'" data-show-faces="'.$faces.'" data-auto-logout-link="'.$logout.'"></div>';
}
add_shortcode('facebook_login', 'facebook_login_button_shortcode');

