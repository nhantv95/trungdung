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
<!--                <div class="view view-tenth">-->
<!--                    <a href="single.html">-->
<!--                        <div class="inner_content clearfix">-->
<!--                            <div class="product_image">-->
<!--                                <img src="images/pic2.jpg" class="img-responsive" alt=""/>-->
<!--                                <div class="label-product">-->
<!--                                    <span class="new">From 150$</span></div>-->
<!--                                <div class="mask">-->
<!--                                    <h2>Room with one Bedroom</h2>-->
<!--                                    <h3>A wonderful serenity has taken possession of my entire soul</h3>-->
<!--                                    <div class="info"><i class="fa fa-search-plus"></i></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="product_container wow bounceIn" data-wow-delay="0.4s">-->
<!--                    <h3><a href="#">King Size Bedroom</a></h3>-->
<!--                    <div class="underheader-line"></div>-->
<!--                    <ul class="person">-->
<!--                        <h4>Max Person:</h4>-->
<!--                        <li><i class="fa fa-male"> </i></li>-->
<!--                        <li><i class="fa fa-male"> </i></li>-->
<!--                        <li><i class="fa fa-male"> </i></li>-->
<!--                    </ul>-->
<!--                    <p>Beds:3 Single Beds</p>-->
<!--                </div>-->
                <?= do_shortcode('[gallery id="49" type="circle"]')?>
            </div>
        </div>
    </div>
    <div class="reservation wow fadeInLeft" data-wow-delay="0.4s" id="work">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div id="main-reservation-text"><h3>Liên hệ <span>+1 2547 487 8974</span> hoặc đặt bàn trước
                            ngay bây giờ!</h3>
                        <p>vestibulum eu euismod quam nullam at accumsan orci aenean ullamcorper nulla ut sapien
                            ultrices dignissim</p>
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
                        <h3>Visitor Experienced</h3>
                        <div class="course_demo">
                            <ul id="flexiselDemo3">
                                <!--                                    <li><img src="images/v5.jpg" class="img-responsive"/>-->
                                <!--                                        <div class="desc">-->
                                <!--                                            <h3>Lorem Ipsum</h3>-->
                                <!--                                            <p>Lorem ipsum dolor<br> sit amet, consectetuer.</p>-->
                                <!--                                        </div>-->
                                <!--                                    </li>-->
                            </ul>
                            <script type="text/javascript">
                                $(window).load(function () {
                                    $("#flexiselDemo3").flexisel({
                                        visibleItems: 4,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,
                                        pauseOnHover: true,
                                        enableResponsiveBreakpoints: true,
                                        responsiveBreakpoints: {
                                            portrait: {
                                                changePoint: 480,
                                                visibleItems: 1
                                            },
                                            landscape: {
                                                changePoint: 640,
                                                visibleItems: 2
                                            },
                                            tablet: {
                                                changePoint: 768,
                                                visibleItems: 2
                                            }
                                        }
                                    });

                                });
                            </script>
                            <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 middle_right">
                    <h3>Info</h3>
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
            <div class="ocarousel example_photos" data-ocarousel-perscroll="3">
                <div class="ocarousel_window">
                    <?= do_shortcode('[gallery type="circle" id="57"]') ?>

                </div>
                <span>
			                <a href="#" data-ocarousel-link="left" class="prev"><i class="fa fa-angle-left"></i> </a>
			                <a href="#" data-ocarousel-link="right" class="next"> <i class="fa fa-angle-right"></i></a>
			               </span>
            </div>
        </div>
    </div>
    <!-- / primary_content -->
<?php get_footer(); ?>