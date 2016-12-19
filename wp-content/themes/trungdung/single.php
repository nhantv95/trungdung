<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */

get_header();

?>
    <div class="reservation_banner">
        <div class="main_title"><?php the_title(); ?></div>
        <div class="divider"></div>
    </div>

    <div class="main">
        <div class="reservation_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="post1">
                                <h3><a href="single.html"><?php the_title(); ?></a></h3>
                                <div class="post1_header">
                                    <?php $myText = explode("/", (string)get_the_date()); ?>
                                    <span class="post1_header_date">
						        <time title="date">Bài viết đăng ngày <?php echo $myText['0']; ?>
                                    tháng <?php echo $myText['1']; ?> </time>
						    </span>
                                    <!-- <span class="post1_header_date">
                                        <time datetime="2014-01-01" title="date">14 July 2014</time>
                                    </span>
                                    <span class="post1_header_by" title="admin">By <a href="#">Admin</a></span>
                                    <span class="post1_header_in" title="bookmark"><a href="#">In aenean nonummy</a></span>
                                    <span class="post1_header_comments" title="comment"><a href="#">6 Comments</a></span> -->
                                </div>
                                <a href="single.html"><img
                                            src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>"
                                            class="img-responsive" alt=""/></a>
                                <p><?php the_content(); ?></p>
                                <?php echo do_shortcode("[facebook_comment url=\"https://www.facebook.com/trungdungrestaurant\" ]"); ?>
                            </div>
                        <?php endwhile; ?><?php endif; ?>
                        <!-- <ul class="comment-list">
                              <h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author">admin</a></h5>
                               <li><img src="images/avatar.png" class="img-responsive" alt="">
                                 <div class="desc">
                                  <p>View all posts by: <a href="#" title="Posts by admin" rel="author">admin</a></p>
                                 </div>
                                 <div class="clearfix"></div>
                               </li>
                           </ul> -->
                        <!-- <div class="comments-area">
                              <h3>Add New Comment</h3>
                            <form>
                                <p>
                                    <label>Name</label>
                                    <span>*</span>
                                    <input type="text" value="">
                                </p>
                                <p>
                                    <label>Email</label>
                                    <span>*</span>
                                    <input type="text" value="">
                                </p>
                                <p>
                                    <label>Website</label>
                                    <input type="text" value="">
                                </p>
                                <p>
                                    <label>Subject</label>
                                    <span>*</span>
                                    <textarea></textarea>
                                </p>
                                <p>
                                    <input type="submit" value="Submit Comment">
                                </p>
                            </form>
                          </div> -->
                    </div>
                    <div class="col-md-4">
                        <?PHP get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>