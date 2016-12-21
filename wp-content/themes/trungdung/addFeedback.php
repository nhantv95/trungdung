<?php 
function addfb($title, $description,$name,$mail){
	
 
			// Do some minor form validation to make sure there is content
			
		 
			// ADD THE FORM INPUT TO $new_post ARRAY
			$new_post = array(
			'post_title'    =>   $title,
			'post_content'  =>   $description,	
			'post_status'   =>   'publish',           // Choose: publish, preview, future, draft, etc.
			'post_type' =>   'feedback',  //'post',page' or use a custom post type if you want to
			'meta_input' => array(
				'name' => $name,
				'mail' => $mail,
				)
			);
		 
			//SAVE THE POST
			$pid = wp_insert_post($new_post);
		 
					 //SET OUR TAGS UP PROPERLY
			//REDIRECT TO THE NEW POST ON SAVE
		 
		 // END THE IF STATEMENT THAT STARTED THE WHOLE FORM
		 
		//POST THE POST YO
		do_action('wp_insert_post', 'wp_insert_post');
}
?>