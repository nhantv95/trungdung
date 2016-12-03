<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>
		
			<div id="comments"><?php
			
				if(post_password_required()):
				
					?>
					
					<p>Enter your password to view comments.</p><?php
					
					return;
				endif;
				
				?>
				
				<h2 id="comments_title_replies" class="comments_title"><?php comments_number(__('Comments'), __('1 Comment so far'), __('% Comments')); ?></h2><?php
				
				if(have_comments()):
				
				?>
				
				<ol id="comments_list_replies" class="comments_list">
					<?php wp_list_comments('avatar_size=32&callback=custom_comment'); ?>
					
				</ol><?php
									
					if($comments_by_type['pings']):
					
					?>
				
				<h2 id="comments_title_pings" class="comments_title">Trackbacks/Pingbacks</h2>
				<ol id="comments_list_pings" class="comments_list">
					<?php wp_list_comments('type=pings'); ?>
				
				</ol><?php
					
					endif;
				
				else: // If there are no comments yet
				
				?>
				
				<p class="no_comments_yet">No comments yet.</p><?php
				
				endif;
				
				?>
				
				<p class="comments_rss"><?php post_comments_feed_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.')); ?></p><?php
				
				if(pings_open()): // If pingbackss are open
				
				?>
				
				<p class="comments_pings"><a href="<?php trackback_url(); ?>" rel="trackback">TrackBack <abbr title="Universal Resource Locator">URL</abbr></a></p><?php
				
				endif;
				
				if(comments_open()): // If comments are open
				
				?>
				
				<h2 id="reply_title">Leave a reply</h2><?php
				
				if(get_option('comment_registration') && !is_user_logged_in()): // If logged-in is required, but user is not logged in
				
				?>
				
				<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(get_permalink())); ?></p><?php
				
				else: // If logged-in is not required OR user is logged in
				
				?>
				
				<form id="reply_form" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
					<fieldset id="reply_form_fieldset">
						<legend id="reply_form_legend">Comment Form</legend><?php
				
						if(is_user_logged_in()): // If user is logged in
						
						?>
						
						<p class="logged_in_as"><?php printf(__('Logged in as %s.'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>'); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account" class="log_out_link">Log out &raquo;</a></p><?php
					
						else: // If user is not logged in
						
						?>
						
						<div class="reply_form_item">
							<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" />
							<label for="author"><?php _e('Name'); ?> <?php if ($req) _e('(required)'); ?></label>
						</div>
						<div class="reply_form_item">
							<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" />
							<label for="email"><?php _e('Mail (will not be published)');?> <?php if ($req) _e('(required)'); ?></label>
						</div>
						<div class="reply_form_item">
							<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
							<label for="url"><?php _e('Website'); ?></label>
						</div><?php
						
						endif;
						
						?>
						
						<!--<p><strong>XHTML:</strong> <?php printf(__('You can use these tags: %s'), allowed_tags()); ?></p>-->
						<div class="reply_form_item">
							<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
						</div>
						<div class="reply_form_item">
							<input name="submit" type="submit" id="submit" tabindex="5" value="<?php esc_attr_e('Submit Comment'); ?>" />
						</div>
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					</fieldset>
					<?php do_action('comment_form', $post->ID); ?>
				
				</form><?php
				
				endif; // End if registration required but user not logged in
				else: // If comments are closed
				
				?>
				
				<p>Sorry, the comment form is closed at this time.</p><?php
				
				endif;
				
				?>
			
			</div><!-- / comments -->