<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */

		get_header();
		
		?>
		
		<div id="primary_content" class="index"><?php
	
		if(have_posts()):
			while(have_posts()):
				the_post();
				
				?>
		
			<div id="post_<?php the_ID(); ?>" <?php post_class() ?>>
				<h2 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" class="post_title_link"><?php the_title(); ?></a></h2>
				<p class="post_meta">Published in <?php the_category(',') ?> on <?php the_date(); ?>.</p>
				<p class="post_tags"><?php the_tags(__('Tags: '), ', ', ''); ?></p>
				<div class="post_content">
					<?php the_content(__('(more...)')); ?>
					
				</div><!-- / post_content -->
				<p class="post_comments"><?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?></p>
			</div><!-- / post_<?php the_ID(); ?> --><?php
		
			comments_template();
			
			endwhile;
		endif;
		
		posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;'));
		
		?>
		
		</div><!-- / primary_content --><?php
		
		get_sidebar();
		get_footer();
		
		?>