<?php
/**
 * Template: Content single menu item
 *
 * @since  1.0.0
 * @version 1.0.1
 */
$thumb_width = wprm_get_option('thumbnail_width');
$thumb_height = wprm_get_option('thumbnail_height');
?>
<div class="wprm_shortcode wprm_single_menu_item <?php echo wprm_get_option('menu_style');?>">
	<ul>
	    <li id="wprm-menu-item-<?php echo get_the_id();?>">
	        <?php do_action( 'wprm_single_menu_item_part_before' ); ?>
	        <div class="inner">
	            <?php 
	                if(has_post_thumbnail()) :
	                    $post_thumbnail_id = get_post_thumbnail_id();
	                    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
	                    $thumb = wprm_thumb($post_thumbnail_url, $thumb_width, $thumb_height); // Crops from bottom right
	                    echo '<img class="wp-post-image" src="'.$thumb.'">';
	                endif;
	           ?>
	            <div class="content">
	                <div class="head">
	                    	<p class="title"><?php the_title();?></p>
	                    	<p class="price"><?php echo wprm_get_item_price(); ?></p>
	                </div>
	                <p class="description"><?php the_content();?></p>
	                <?php if(!wprm_get_option('disable_vegetarian') && get_post_meta( get_the_id(), '_wprm_is_vegetarian', true ) == 'yes') : ?>
                    	<span class="wprm-veg"><?php _e('V','wprm');?></span>
                	<?php endif; ?>
	                <?php if(!wprm_get_option('disable_spicy') && get_post_meta( get_the_id(), '_wprm_spicy_level', true ) >= '0') : ?>
                    	<span class="wprm-chilly-level wprm-chilly-level-<?php echo get_post_meta( get_the_id(), '_wprm_spicy_level', true ); ?>"><?php _e('Hot','wprm');?></span>
                	<?php endif; ?>
	            </div>
	            
	            <div class="wprm-clearfix"></div>

	            <?php if ( !wprm_get_option('disable_details') ) : ?>

	        		<?php if( get_post_meta( get_the_id(), '_wprm_calories', true ) || get_post_meta( get_the_id(), '_wprm_cholesterol', true ) || get_post_meta( get_the_id(), '_wprm_fiber', true ) || get_post_meta( get_the_id(), '_wprm_sodium', true ) || get_post_meta( get_the_id(), '_wprm_carbohydrates', true ) || get_post_meta( get_the_id(), '_wprm_fat', true ) || get_post_meta( get_the_id(), '_wprm_protein', true ) ) : ?>

			            <h4><?php _e('Nutritional Information', 'wprm');?></h4>
			            <table class="nutritional_attributes">
						    <tbody>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_calories', true )) : ?>
						        <tr class="">
						            <th><?php _e('Calories','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_calories', true );?></p>
						            </td>
						        </tr>
						    	<?php endif; ?>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_cholesterol', true )) : ?>
						        <tr class="alt">
						            <th><?php _e('Cholesterol','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_cholesterol', true );?></p>
						            </td>
						        </tr>
						    	<?php endif; ?>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_fiber', true )) : ?>
						        <tr class="">
						            <th><?php _e('Fiber','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_fiber', true );?></p>
						            </td>
						        </tr>
						    	<?php endif ;?>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_sodium', true )) :?>
						        <tr class="alt">
						            <th><?php _e('Sodium','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_sodium', true );?></p>
						            </td>
						        </tr>
						    	<?php endif; ?>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_carbohydrates', true )) : ?>
						        <tr class="">
						            <th><?php _e('Carbohydrates','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_carbohydrates', true );?></p>
						            </td>
						        </tr>
						    	<?php endif; ?>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_fat', true )):?>
						        <tr class="alt">
						            <th><?php _e('Fat','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_fat', true );?></p>
						            </td>
						        </tr>
						    	<?php endif; ?>
						    	<?php if(get_post_meta( get_the_id(), '_wprm_protein', true )) : ?>
						         <tr class="">
						            <th><?php _e('Protein','wprm');?></th>
						            <td>
						                <p><?php echo get_post_meta( get_the_id(), '_wprm_protein', true );?></p>
						            </td>
						        </tr>
						    	<?php endif; ?>
						    </tbody>
						</table>

					<?php endif; ?>
			
				<?php endif ; ?>
	        </div>
	        <?php do_action( 'wprm_single_menu_item_part_after' ); ?>
	    </li>
	</ul>
</div>