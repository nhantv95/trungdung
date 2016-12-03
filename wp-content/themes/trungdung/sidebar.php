<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>
	<!-- fuck yeah -->

	<div class="category_widget">
      <h3>Category</h3>
      <ul class="list-unstyled arrow">
        <li><?php the_category(' ', ', '); ?></li>
        <!-- <li><a href="#">Media <span class="badge pull-right">11</span></a></li>
        <li><a href="#">Marketing <span class="badge pull-right">31</span></a></li> -->
      </ul>
	</div>
	<!-- <div class="category_widget">
      <h3>Archive</h3>
      <ul class="list-unstyled arrow">
        <li><a href="#">August 2014 <span class="badge pull-right">16</span></a></li>
        <li><a href="#">September 2014 <span class="badge pull-right">9</span></a></li>
        <li><a href="#">July 2014 <span class="badge pull-right">22</span></a></li>
      </ul>
	</div> -->
	<ul class="blog-list1">
	  <h3>Tags</h3>
		<!-- <li><a href="#">Web Design</a></li>
		<li><a href="#">Html5</a></li>
		<li><a href="#">Wordpress</a></li>
		<li><a href="#">Logo</a></li>
		<li><a href="#">Web Design</a></li>
		<li><a href="#">Web Design</a></li>
		<li><a href="#">Wordpress</a></li>
		<li><a href="#">Web Design</a></li>
		<li><a href="#">Html5</a></li>
		<li><a href="#">Wordpress</a></li> -->
		<li><?php wp_tag_cloud( ); ?></li>
	</ul>
	<ul class="recent-list">
	  <h3>Bài viết gần đây</h3>
	  <!-- <li><a href="#">aliquam erat volutpat</a><br><span>25 April 2014</span></li>
	  <li><a href="#">aliquam erat volutpat</a><br><span>25 April 2014</span></li>
	  <li><a href="#">aliquam erat volutpat</a><br><span>25 April 2014</span></li>
	  <li><a href="#">aliquam erat volutpat</a><br><span>25 April 2014</span></li> -->
	  <?php
        $wp_query = new WP_Query( 'post_type=post&order=desc&posts_per_page=5' );
        if( $wp_query->have_posts() ) : while( $wp_query->have_posts() ):$wp_query->the_post();
        $myText = explode("/",(string)get_the_date()) ; ?>
            <li><a href="<?php the_permalink() ;?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> <br><span><?php echo $myText['0']; ?> tháng <?php echo $myText['1']; ?></span></li> </li>
        <?php endwhile; endif;?>
	</ul>
	<ul class="recent-list">
		<?php $a="[facebook_likebox url=\"https://www.facebook.com/trungdungrestaurant\" ]"; 
		echo do_shortcode($a);?>
	</ul>


		<!-- <hr />
		<div id="secondary_content">
			<div id="secondary_content_search">
				<form id="secondary_content_search_form" method="get" action="<?php bloginfo('home'); ?>">
					<fieldset id="secondary_content_search_fieldset">
						<legend id="secondary_content_search_legend">Search Form</legend>
						<div class="secondary_content_search_item">
							<label for="secondary_content_search_input">Search</label>
							<input type="text" name="s" id="secondary_content_search_input" size="32" />
							<input type="submit" name="secondary_content_search_submit" id="secondary_content_search_submit" value="<?php esc_attr_e('Search'); ?>" />
						</div>
					</fieldset>
				</form>
			</div>

			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar()){} else {} ?>
			
		</div> -->