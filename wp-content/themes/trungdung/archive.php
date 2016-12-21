<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
get_header();

?>

<div id="primary_content">
    <div class="reservation_banner">
        <div class="main_title">BÀI VIẾT CỦA NHÀ HÀNG</div>
        <div class="divider"></div>
    </div>

    <div class="main">
        <div class="reservation_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php

                        if (have_posts()):
                        $post = $posts[0]; // Hack. Set $post so that the_date() works

                        if (is_category()) { //If this is a category archive

                            ?>

                            <h1 class="post_title archive_title">Archive for the &#8216;<?php single_cat_title(); ?>
                            &#8217; Category</h1><?php

                        } elseif (is_tag()) { // If this is a tag archive

                            ?>

                            <h1 class="post_title archive_title">Posts Tagged &#8216;<?php single_tag_title(); ?>
                            &#8217;</h1><?php

                        } elseif (is_day()) { //If this is a daily archive

                            ?>

                            <h1 class="post_title archive_title">Archive for <?php the_time('F jS, Y'); ?></h1><?php

                        } elseif (is_month()) { // If this is a monthly archive

                            ?>

                            <h1 class="post_title archive_title">Archive for <?php the_time('F, Y'); ?></h1><?php

                        }
                        elseif (is_year()) { // If this is a yearly archive

                        ?>

                        <h1 class="post_title archive_title">Archive for <?php the_time('Y'); ?></h1>
                            <?php

                            } elseif (is_author()) { // If this is an author archive

                                ?>

                                <h1 class="post_title archive_title">Author Archive</h1><?php

                            } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { // If this is a paged archive

                                ?>

                                <h1 class="post_title archive_title">Blog Archives</h1><?php

                            }

                            ?>


                            <div class="post_navigation">
                                <div class="post_navigation_next"><?php next_posts_link('&laquo; Older Entries') ?></div>
                                <div class="post_navigation_prev"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                            </div><!-- /post_navigation --><?php

                            while (have_posts()):
                                the_post();
                                // get_template_part( 'content');

                                ?>

                                <div <?php post_class() ?>>
                                    <!-- <h2 id="archive_item_<?php the_ID(); ?>" class="post_title archive_item_title"><a href="<?php the_permalink() ?>" rel="bookmark" class=" post_title_link archive_item_title_link"><?php the_title(); ?></a></h2>
			<p class="post_meta archive_item_meta">Published in <?php the_category(', ') ?> on <?php the_time('l, F jS, Y') ?></p>
			<p class="post_tags archive_item_tags"><?php the_tags('Tags: ', ', ', ''); ?></p>
			<p class="post_comments archive_item_comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			<div class="post_content archive_item_content">
				<?php the_content() ?>
			</div> -->
                                    <div class="post1">
                                        <?php get_template_part('content'); ?>
                                    </div>
                                    <!-- / post_content archive_item_content -->
                                </div><!-- / <?php post_class() ?> --><?php

                            endwhile;

                            ?>

                            <div class="post_navigation">
                                <div class="post_navigation_next"><?php next_posts_link('&laquo; Older Entries') ?></div>
                                <div class="post_navigation_prev"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                            </div><!-- /post_navigation --><?php

                            else:

                                if (is_category()) { // If this is a category archive
                                    printf("<h2 class=\"post_title archive_item_title\">Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('', false));
                                } else if (is_date()) { // If this is a date archive
                                    echo("<h2 class=\"post_title archive_item_title\">Sorry, but there aren't any posts with this date.</h2>");
                                } else if (is_author()) { // If this is a category archive
                                    $userdata = get_userdatabylogin(get_query_var('author_name'));
                                    printf("<h2 class=\"post_title archive_item_title\">Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
                                } else {
                                    echo("<h2 class=\"post_title archive_item_title\">No posts found.</h2>");
                                }

                                ?>

                                <div id="archive_search">
                                    <form id="archive_search_form" method="get" action="<?php bloginfo('home'); ?>">
                                        <fieldset id="archive_search_fieldset">
                                            <legend id="archive_search_legend">Search Form</legend>
                                            <div class="archive_search_item">
                                                <label for="archive_search_input">Search</label>
                                                <input type="text" name="s" id="archive_search_input" size="32"/>
                                                <input type="submit" name="archive_search_submit"
                                                       id="archive_search_submit"
                                                       value="<?php esc_attr_e('Search'); ?>"/>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div><!-- / archive_search --><?php

                            endif;

                            ?>

                    </div>

                    <!-- </div> -->
                    <div class="col-md-4">
                        <?PHP get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    get_footer();

    ?>
