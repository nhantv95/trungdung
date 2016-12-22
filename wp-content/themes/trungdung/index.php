<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */

get_header();

?>
        <!--
    <div id="primary_content" class="index">
        <?php

//		if ( have_posts() ):
//			while ( have_posts() ):
//				the_post();

?>

<!--                <div id="post_--><?php //the_ID(); ?><!--" --><?php //post_class() ?><!-->
    <!--                    <h2 class="post_title"><a href="--><?php //the_permalink() ?><!--" rel="bookmark"-->
    <!--                                              class="post_title_link">--><?php //the_title(); ?><!--</a></h2>-->
    <!--                    <p class="post_meta">Published in --><?php //the_category( ',' ) ?><!-- on --><?php //the_date(); ?><!--.</p>-->
    <!--                    <p class="post_tags">--><?php //the_tags( __( 'Tags: ' ), ', ', '' ); ?><!--</p>-->
    <!--                    <div class="post_content">-->
    <!--						--><?php //the_content( __( '(more...)' ) ); ?>

    <!--                    </div><!-- / post_content -->
    <!--                    <p class="post_comments">--><?php //comments_popup_link( __( 'Comments (0)' ), __( 'Comments (1)' ), __( 'Comments (%)' ) ); ?><!--</p>-->
    <!--                </div><!-- / post_--><?php //the_ID(); ?><!-- --><?php

//				comments_template();

//			endwhile;
//		endif;

//		posts_nav_link( ' &#8212; ', __( '&laquo; Newer Posts' ), __( 'Older Posts &raquo;' ) );

?>

    <!--    </div>-->

    <div class="container">
        <div class="row grids text-center">
            <div class="col-md-4">
                <?php
                $args2 = array(
                    'post_type' => 'thuc-don',
                    'posts_per_page' => 4,
                );
                $wp_query = new WP_Query($args2);
                ?>

                <?php
                //var_dump($wp_query);
                if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post();
                    ?>
                    <div class="post1 col-md-6">
                        <h4> <?php echo get_field('name'); ?> </h4>
                        <div class="post1_header">
                            Chủ đề: <?php the_title(); ?>
                        </div>
                        <p>
                            <?php echo get_the_content(); ?>
                        </p>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>
    <div class="reservation wow fadeInLeft" data-wow-delay="0.4s" id="work">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="main-reservation-text"><h3>Liên hệ <span>0968 353 688</span> hoặc đặt bàn trước
                            ngay bây giờ!</h3>
                        <p>Nhà hàng Trung Dũng hân hạnh được phục vụ quý khách.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="<?= site_url('dat-ban')?>" title="Online Reservation"
                       class="btn btn-primary btn-normal btn-inline " target="_self">Đặt bàn</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-bottom wow fadeInLeft" data-wow-delay="0.4s" id="work">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="welcome_desc">
                        <h3>Khách hàng nhận xét</h3>
                        <div class="course_demo">
<!--                            <ul id="flexiselDemo3">-->
                                <?php
                                $args2 = array(
                                    'post_type' => 'feedback',
                                    'meta_key' => 'isPosted',
                                    'meta_value' => 'a:1:{i:0;s:4:"true";}',
                                    'posts_per_page' => 3,
                                );
                                $wp_query = new WP_Query($args2);
                                ?>

                                <?php
                                //var_dump($wp_query);
                                if ($wp_query->have_posts()) : while ($wp_query->have_posts()):$wp_query->the_post();
                                    ?>
                                    <div class="post1 col-md-6">
                                        <p>
                                            <?php echo get_the_content(); ?>
                                        </p>
                                        <h4> <?php echo get_field('name'); ?> </h4>
                                        <div class="post1_header">
                                            Chủ đề: <?php the_title(); ?>
                                        </div>
                                    </div>
                                <?php endwhile; endif; ?>
<!--                            </ul>-->
<!--                            <script type="text/javascript">-->
<!--                                $(window).load(function () {-->
<!--                                    $("#flexiselDemo3").flexisel({-->
<!--                                        visibleItems: 4,-->
<!--                                        animationSpeed: 1000,-->
<!--                                        autoPlay: true,-->
<!--                                        autoPlaySpeed: 3000,-->
<!--                                        pauseOnHover: true,-->
<!--                                        enableResponsiveBreakpoints: true,-->
<!--                                        responsiveBreakpoints: {-->
<!--                                            portrait: {-->
<!--                                                changePoint: 480,-->
<!--                                                visibleItems: 1-->
<!--                                            },-->
<!--                                            landscape: {-->
<!--                                                changePoint: 640,-->
<!--                                                visibleItems: 2-->
<!--                                            },-->
<!--                                            tablet: {-->
<!--                                                changePoint: 768,-->
<!--                                                visibleItems: 2-->
<!--                                            }-->
<!--                                        }-->
<!--                                    });-->
<!---->
<!--                                });-->
<!--                            </script>-->
<!--                            <script type="text/javascript" src="js/jquery.flexisel.js"></script>-->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 middle_right">
                    <h3>Thông tin nhà hàng</h3>
                    <ul id="general-info">
                        <li><i class="fa fa-clock-o"> </i>Giờ mở cửa: 9h - 22h</li>
                        <li><i class="fa fa-globe"> </i>Miễn phí mạng wifi</li>
                        <!--                            <li><i class="fa fa-cutlery"> </i>In Room Dining Available from <br>06:00pm to 10:30pm</li>-->
                        <li><i class="fa fa-truck"> </i>Trông đỗ xe miễn phí</li>
                        <li><i class="fa fa-picture-o"> </i>Nằm trên đường Trần Quốc Hoàn và Phạm Tuấn Tài - Cầu
                            Giấy - Hà Nội
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="company_logos wow bounceIn" data-wow-delay="0.4s">
        <a href="<?= site_url('galleries')?>"><h3>Thư viện ảnh</h3></a>
        <div class="ocarousel_slider">
            <div class="ocarousel example_photos">
                <div class="ocarousel_window">
                    <?php
                    $args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_status' => null,
                    'post_parent' => null, // any parent
                    );
                    $attachments = get_posts($args);
                    if ($attachments) {
                    foreach ($attachments as $post) {
                    setup_postdata($post);
                    the_title();
                    the_attachment_link($post->ID, false);
                    the_excerpt();
                    }
                    }?>
                </div>
<!--                <span>-->
<!--			                <a href="#" data-ocarousel-link="left" class="prev"><i class="fa fa-angle-left"></i> </a>-->
<!--			                <a href="#" data-ocarousel-link="right" class="next"> <i class="fa fa-angle-right"></i></a>-->
<!--			               </span>-->
            </div>
        </div>
    </div>
    <!-- / primary_content -->
<?php get_footer(); ?>