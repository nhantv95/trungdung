<?php


function facebook_api_plugin_widget() {
    register_widget( 'Facebook_Like_Box_widget' );
    register_widget( 'Facebook_Embedded_posts_widget' );
    register_widget( 'Facebook_Follow_Button_widget' );
    register_widget( 'Facebook_Login_Button_widget' );
}
add_action( 'widgets_init', 'facebook_api_plugin_widget' );

/**=======================================================
			Facebook Like Box Widget
========================================================**/

class Facebook_Like_Box_widget extends WP_Widget {

    public function __construct() {
 
        parent::__construct(
            'facebook_likebox_widget',       // Base ID
            'FB Like Box',        // Name
            array(
                'classname'     =>   'facebook_likebox_widget',
                'description'   =>   ('Add facebook like box on sidebar.')
            )
        );
 
    } // end constructor
	
	public function widget( $args, $instance ) {
		extract( $args );
	 
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
	 
		$this->facebook_url = $instance['page_url'];
		$this->facebook_width = $instance['width'];
		$this->facebook_height = $instance['height'];
		$this->facebook_color = $instance['color'];
		$this->facebook_faces = ($instance['faces'] == "2" ? "true" : "false");
		$this->facebook_stream = ($instance['stream'] == "1" ? "true" : "false");
		$this->facebook_header = ($instance['header'] == "1" ? "true" : "false");
		$this->facebook_border = ($instance['border'] == "2" ? "true" : "false");
	 
		/* Display the widget title if one was input (before and after defined by themes). */
		echo $before_widget;
		if ( $this->facebook_url ) :
			echo $before_title.$title.$after_title;
	 
		/* Like Box */
		?>
			<div class="fb-like-box" 
				data-href="<?php echo $this->facebook_url; ?>" 
				data-width="<?php echo $this->facebook_width; ?>" 
				data-height="<?php echo $this->facebook_height; ?>" 
				data-colorscheme="<?php echo $this->facebook_color; ?>" 
				data-show-faces="<?php echo $this->facebook_faces; ?>" 
				data-header="<?php echo $this->facebook_header; ?>" 
				data-stream="<?php echo $this->facebook_stream; ?>" 
				data-show-border="<?php echo $this->facebook_border; ?>">
			</div>
		<?php
		
			echo $after_widget;
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	 
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['page_url'] = strip_tags( $new_instance['page_url'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );	 
		$instance['color'] = strip_tags( $new_instance['color'] );	 
		$instance['faces'] = (bool)$new_instance['faces'];
		$instance['header'] = (bool)$new_instance['header'];
		$instance['stream'] = (bool)$new_instance['stream'];
		$instance['border'] = (bool)$new_instance['border'];
	 
		return $instance;
	}

	function form( $instance ) {
	 
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'page_url' => 'http://www.facebook.com/FacebookDevelopers',
			'width' => '300',
			'height' => '',
			'color' => 'light',
			'faces' => true,
			'header' => false,
			'stream' => false,
			'border' => true
		);
	 
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'page_url' ); ?>">Facebook Page URL:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_url' ); ?>" name="<?php echo $this->get_field_name( 'page_url' ); ?>" value="<?php echo $instance['page_url']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>">Width:</label>			
			<input type="text" size="6" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>">Height:</label>			
			<input type="text" size="6" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('color'); ?>">Color Scheme:</label> 
			<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" class="widefat">
				<option <?php if ('light' == $instance['color']) echo 'selected="selected"'; ?>>light</option>
				<option <?php if ('dark' == $instance['color']) echo 'selected="selected"'; ?>>dark</option>
			</select>
		</p>
	 
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" value="1" <?php echo ($instance['faces'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'faces' ); ?>">Show Faces</label><br>
			
			<input type="checkbox" id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' ); ?>" value="1" <?php echo ($instance['header'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'header' ); ?>">Show Header</label><br>
			
			<input type="checkbox" id="<?php echo $this->get_field_id( 'stream' ); ?>" name="<?php echo $this->get_field_name( 'stream' ); ?>" value="1" <?php echo ($instance['stream'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'stream' ); ?>">Show Stream</label><br>
			
			<input type="checkbox" id="<?php echo $this->get_field_id( 'border' ); ?>" name="<?php echo $this->get_field_name( 'border' ); ?>" value="1" <?php echo ($instance['border'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'border' ); ?>">Show Border</label>
		</p>
	 
		<?php
	}
}


/**=======================================================
			Facebook Embedded Posts Widget
========================================================**/

class Facebook_Embedded_posts_widget extends WP_Widget {

    public function __construct() {
 
        parent::__construct(
            'facebook_embedded_widget',       // Base ID
            'FB Embedded Post',        // Name
            array(
                'classname'     =>   'facebook_embedded_widget',
                'description'   =>   ('Add facebook embedded post on sidebar.')
            )
        );
 
    } // end constructor
	
	public function widget( $args, $instance ) {
		extract( $args );
	 
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
	 
		$this->facebook_url = $instance['post_url'];
		$this->facebook_width = $instance['width'];
	 
		/* Display the widget title if one was input (before and after defined by themes). */
		echo $before_widget;
		if ( $this->facebook_url ) :
			echo $before_title.$title.$after_title;
	 
		/* Embedded Post */
		?>
			<div class="fb-post" 
				data-href="<?php echo $this->facebook_url; ?>" 
				data-width="<?php echo $this->facebook_width; ?>">
			</div>
		<?php
		
			echo $after_widget;
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	 
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_url'] = strip_tags( $new_instance['post_url'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
	 
		return $instance;
	}

	function form( $instance ) {
	 
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'post_url' => 'http://www.facebook.com/FacebookDevelopers/posts/10151471074398553',
			'width' => '',
		);
	 
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'post_url' ); ?>">Facebook Post URL:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'post_url' ); ?>" name="<?php echo $this->get_field_name( 'post_url' ); ?>" value="<?php echo $instance['post_url']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>">Width:</label>			
			<input type="text" size="6" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" />
		</p>
	 
		<?php
	}
}

/**=======================================================
			Facebook Follow Button Widget
========================================================**/

class Facebook_Follow_Button_widget extends WP_Widget {

    public function __construct() {
 
        parent::__construct(
            'facebook_follow_widget',       // Base ID
            'FB Follow Button',        // Name
            array(
                'classname'     =>   'facebook_follow_widget',
                'description'   =>   ('Add facebook follow button on sidebar.')
            )
        );
 
    } // end constructor
	
	public function widget( $args, $instance ) {
		extract( $args );
	 
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
	 
		$this->facebook_url = $instance['profile_url'];
		$this->facebook_width = $instance['width'];
		$this->facebook_height = $instance['height'];
		$this->facebook_color = $instance['color'];
		$this->facebook_layout = $instance['layout'];
		$this->facebook_faces = ($instance['faces'] == "1" ? "true" : "false");
	 
		/* Display the widget title if one was input (before and after defined by themes). */
		echo $before_widget;
		if ( $this->facebook_url ) :
			echo $before_title.$title.$after_title;
	 
		/* Follow Button */
		?>
			<div class="fb-follow" 
				data-href="<?php echo $this->facebook_url; ?>" 
				data-width="<?php echo $this->facebook_width; ?>" 
				data-height="<?php echo $this->facebook_height; ?>" 
				data-colorscheme="<?php echo $this->facebook_color; ?>" 
				data-layout="<?php echo $this->facebook_layout; ?>" 
				data-show-faces="<?php echo $this->facebook_faces; ?>">
			</div>
		<?php
		
			echo $after_widget;
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	 
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['profile_url'] = strip_tags( $new_instance['profile_url'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );	 
		$instance['color'] = strip_tags( $new_instance['color'] );	 
		$instance['layout'] = strip_tags( $new_instance['layout'] );	 
		$instance['faces'] = (bool)$new_instance['faces'];
	 
		return $instance;
	}

	function form( $instance ) {
	 
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'profile_url' => 'http://www.facebook.com/dipto01',
			'width' => '',
			'height' => '',
			'color' => 'light',
			'layout' => 'standard',
			'faces' => false,
		);
	 
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'profile_url' ); ?>">Facebook Profile URL:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'profile_url' ); ?>" name="<?php echo $this->get_field_name( 'profile_url' ); ?>" value="<?php echo $instance['profile_url']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>">Width:</label>			
			<input type="text" size="6" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>">Height:</label>			
			<input type="text" size="6" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('color'); ?>">Color Scheme:</label> 
			<select id="<?php echo $this->get_field_id('color'); ?>" name="<?php echo $this->get_field_name('color'); ?>" class="widefat">
				<option <?php if ('light' == $instance['color']) echo 'selected="selected"'; ?>>light</option>
				<option <?php if ('dark' == $instance['color']) echo 'selected="selected"'; ?>>dark</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('layout'); ?>">Layout:</label> 
			<select id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" class="widefat">
				<option <?php if ('standard' == $instance['layout']) echo 'selected="selected"'; ?>>standard</option>
				<option <?php if ('box_count' == $instance['layout']) echo 'selected="selected"'; ?>>box_count</option>
				<option <?php if ('button_count' == $instance['layout']) echo 'selected="selected"'; ?>>button_count</option>
				<option <?php if ('button' == $instance['layout']) echo 'selected="selected"'; ?>>button</option>
			</select>
		</p>
	 
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" value="1" <?php echo ($instance['faces'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'faces' ); ?>">Show Faces</label><br>
		</p>
	 
		<?php
	}
}

/**=======================================================
			Facebook Login Button Widget
========================================================**/

class Facebook_Login_Button_widget extends WP_Widget {

    public function __construct() {
 
        parent::__construct(
            'facebook_login_widget',       // Base ID
            'FB Login Button',        // Name
            array(
                'classname'     =>   'facebook_login_widget',
                'description'   =>   ('Add facebook login button on sidebar.')
            )
        );
 
    } // end constructor
	
	public function widget( $args, $instance ) {
		extract( $args );
	 
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
	 
		$this->facebook_row = $instance['row'];
		$this->facebook_size = $instance['size'];
		$this->facebook_faces = ($instance['faces'] == "2" ? "true" : "false");
		$this->facebook_logout = ($instance['logout'] == "2" ? "true" : "false");
	 
		/* Display the widget title if one was input (before and after defined by themes). */
		echo $before_widget;
		if ( $this->facebook_row ) :
			echo $before_title.$title.$after_title;
	 
		/* Login Button */
		?>			
			<div class="fb-login-button" 
				data-max-rows="<?php echo $this->facebook_row; ?>" 
				data-size="<?php echo $this->facebook_size; ?>" 
				data-show-faces="<?php echo $this->facebook_faces; ?>" 
				data-auto-logout-link="<?php echo $this->facebook_logout; ?>">
			</div>
		<?php
		
			echo $after_widget;
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	 
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['row'] = strip_tags( $new_instance['row'] );
		$instance['size'] = strip_tags( $new_instance['size'] );	 
		$instance['faces'] = (bool)$new_instance['faces'];
		$instance['logout'] = (bool)$new_instance['logout'];
	 
		return $instance;
	}

	function form( $instance ) {
	 
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => '',
			'row' => '1',
			'size' => 'medium',
			'faces' => true,
			'logout' => true,
		);
	 
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'row' ); ?>">Row:</label>			
			<input type="text" size="6" id="<?php echo $this->get_field_id( 'row' ); ?>" name="<?php echo $this->get_field_name( 'row' ); ?>" value="<?php echo $instance['row']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('size'); ?>">Size:</label> 
			<select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" class="widefat">
				<option <?php if ('medium' == $instance['size']) echo 'selected="selected"'; ?>>medium</option>
				<option <?php if ('small' == $instance['size']) echo 'selected="selected"'; ?>>small</option>
				<option <?php if ('large' == $instance['size']) echo 'selected="selected"'; ?>>large</option>
			</select>
		</p>
	 
		<p>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" value="1" <?php echo ($instance['faces'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'faces' ); ?>">Show Faces</label><br>
			
			<input type="checkbox" id="<?php echo $this->get_field_id( 'logout' ); ?>" name="<?php echo $this->get_field_name( 'logout' ); ?>" value="1" <?php echo ($instance['logout'] == "true" ? "checked='checked'" : ""); ?> />
			<label for="<?php echo $this->get_field_id( 'logout' ); ?>">Show Logout</label>
		</p>
	 
		<?php
	}
}