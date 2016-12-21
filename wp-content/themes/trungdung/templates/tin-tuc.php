<?php
/**
 * Template Name: Bài viết
 *
 * @package hackademic
 * @subpackage templates
 * @since hackademic 1.0
 */
?>
<?php get_header(); ?>
    <div class="reservation_banner">
        <div class="main_title">BÀI VIẾT CỦA NHÀ HÀNG</div>
        <div class="divider"></div>
    </div>

    <div class="main">
        <div class="reservation_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="post1">
                            <?php
                            $type = 'post';
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => $type,
                                'post_status' => 'publish',
                                'paged' => $paged,
                                'posts_per_page' => 7,
                                'caller_get_posts' => 1
                            );
                            $temp = $wp_query;  // assign original query to temp variable for later use
                            $wp_query = null;
                            $wp_query = new WP_Query();
                            $wp_query->query($args);
                            if (have_posts()):
                                // $i = 0;
                                while (have_posts()) : the_post();
                                    //     if ($i%2==0) {
                                    //         echo '<div class="row">';
                                    //     }
                                    get_template_part('content', 'category');
                                    //     if ($i%2==1) {
                                    //         echo '</div>';
                                    //     }
                                    //     $i++;
                                endwhile;
                            // unset($i);
                            else :
                                echo 'Không tìm thấy bài viết nào trong chuyên mục này.';
                            endif;
                            ?>
                        </div>
                        <ul class="dc_pagination dc_paginationA dc_paginationA06">
                            <li><a href="#" class="current">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">19</a></li>
                            <li><a href="#">20</a></li>
                            <li><a href="#" class="current">Next</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <?PHP get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>