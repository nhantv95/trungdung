<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */

		get_header();
		
		?>
		
		<div id="primary_content">
			<h1 class="post_title error404_title">Error 404 - Not Found</h1>
			<div id="error404_search">
				<form id="error404_search_form" method="get" action="<?php bloginfo('home'); ?>">
					<fieldset id="error404_search_fieldset">
						<legend id="error404_search_legend">Search Form</legend>
						<div class="error404_search_item">
							<label for="error404_search_input">Search</label>
							<input type="text" name="s" id="error404_search_input" size="32" />
							<input type="submit" name="error404_search_submit" id="error404_search_submit" value="<?php esc_attr_e('Search'); ?>" />
						</div>
					</fieldset>
				</form>
			</div><!-- / error404_search -->
			<h2>Archives by Month:</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			<h2>Archives by Subject:</h2>
			<ul>
				 <?php wp_list_categories(); ?>
			</ul>
		</div><!-- /primary_content --><?php

		get_sidebar();
		get_footer();
		
		?>