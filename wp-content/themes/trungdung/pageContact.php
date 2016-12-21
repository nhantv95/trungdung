<?php /* Template Name: Contact */ ?>
<?php addFeedback(); ?>

<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
get_header();

?>
    <div class="reservation_banner">
        <div class="main_title">Liên hệ/Phản hồi</div>
        <div class="divider"></div>
    </div>
    <div class="main">
        <div class="reservation_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="contact_left">
                            <h3>Thông tin liên lạc</h3>
                            <iframe width="460" height="360" frameborder="0" scrolling="no" marginheight="0"
                                    src="https://maps.google.com/maps?q=46 Trần Quốc Hoàn, Hà Nội, Cầu Giấy, Việt Nam, &t=&z=14&ie=UTF8&iwloc=&output=embed"
                                    marginwidth="0"><a class="addmaps" href="http://www.map-embed.com/it/"
                                                       id="get-map-data"
                                                       mce_href="http://maps.google.com/maps/api/js?sensor=false">map-embed.com</a>
                                <style>#gmap_canvas img {
                                        max-width: none !important;
                                        background: none !important
                                    }</style>
                            </iframe>
                            </a></small>
                            <address class="address">
                                <p>Cơ sở 1: 46 Trần Quốc Hoàn - Cầu Giấy - Hà Nội <br>Cơ sở 2: 16 Phạm Tuấn Tài - Cầu
                                    Giấy - Hà Nội</p>
                                <dl>
                                    <dt></dt>
                                    <div>Điện thoại:<span> 0968. 35. 36. 88</span></div>
                                    <div>Hotline:<span> 0986. 345. 188</span></div>

                                    <div>Email:&nbsp; <a href="trungdungrestaurant@yahoo.com">trungdungrestaurant@yahoo.com</a>
                                    </div>
                                </dl>
                            </address>
                        </div>
                    </div>
                    <div class="col-md-7 contact_right">
                        <h3>Để lại Feedback cho chúng tôi</h3>
                        <div class="contact-form">
                            <form method="post" action="">
                                <input required type="text" name="name" class="textbox" placeholder="Tên">
                                <input required type="email" name="mail" class="textbox" placeholder="Email">
                                <input required type="text" name="title" class="textbox" placeholder="Chủ đề">
                                <textarea required id="content" name="content" placeholder="Nội dung"></textarea>
                                <input id="submit" type="submit" value="Gửi phản hồi">
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <br>
                    <div class="col-md-12">
                        <hr style="background-color:#996633; color:#996633">
                    </div>
                    <br>
                    <div>
                        <h3>Khách hàng nói gì về chúng tôi</h3>
                        <?php
                        $args2 = array(
                            'post_type' => 'feedback',
                            'meta_key' => 'isPosted',
                            'meta_value' => 'a:1:{i:0;s:4:"true";}',
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
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / primary_content -->
<?php
get_footer();
?>