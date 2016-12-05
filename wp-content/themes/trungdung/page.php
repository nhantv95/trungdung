<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */

		get_header();
		
		?>
		
		<div id="primary_content" class="page"><?php
	
		if(have_posts()):
			while(have_posts()):
				the_post();
				
				?>
		
			<div id="page_<?php the_ID(); ?>" <?php post_class() ?>>
				<h1 class="post_title page_title"><a href="<?php the_permalink() ?>" rel="bookmark" class="post_title_link page_title_link"><?php the_title(); ?></a></h1>
				<div class="post_content page_content">
					<?php the_content(); ?>
					
				</div><!-- / post_content page_content -->
			</div><!-- / page_<?php the_ID(); ?> --><?php
		
			comments_template();
			
			endwhile;	
		endif;
				
		?>
		
		</div><!-- / primary_content --><?php
		
		get_sidebar();
		get_footer();
		
		?>