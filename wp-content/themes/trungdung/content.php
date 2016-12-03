<h3><a href="<?php the_permalink() ?>"><?php echo $post->post_title;?></a></h3>
<div class="post1_header">
    <?php $myText = explode("/",(string)get_the_date()) ; ?>
    <span class="post1_header_date">
        <time title="date">Bài viết đăng ngày <?php echo $myText['0']; ?> tháng <?php echo $myText['1']; ?> </time>
    </span>
    <!-- <span class="post1_header_by" title="admin">By <a href="#">Admin</a></span> -->
    <!-- <span class="post1_header_in" title="bookmark"><a href="#">In aenean nonummy</a></span> -->
    <!-- <span class="post1_header_comments" title="comment"><a href="#"><?php comments_number( ); ?> </a></span> -->
</div>
<a href="<?php the_permalink() ?>" class="mask"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="image" class="img-responsive zoom-img"></a>

<!-- <p>Quisque euismod velit luctus tellus dignissim, sed aliquam tellus porttitor. Suspendisse feugiat, orci sed iaculis tristique, est neque tempus sem, ut iaculis mi augue sed enim. Nunc nec consectetur mi. Aenean nisl augue, laoreet vel justo nec, auctor congue metus. Vestibulum aliquet, eros non iaculis lobortis, velit lectus imperdiet turpis, id blandit nisi mauris nec turpis.</p> -->

<p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 600, '...');?> </p>


<nav class="cl-effect-7" id="cl-effect-7">
<a href="<?php the_permalink() ?>">Read more </a>
</nav>
<br><br>