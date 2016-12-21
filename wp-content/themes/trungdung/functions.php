<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
automatic_feed_links();
function addFeedback(){
    if( 'POST' == $_SERVER['REQUEST_METHOD'] && isset ($_POST['mail']) ) {
        // Do some minor form validation to make sure there is content
        if (isset ($_POST['title'])) {
            $title =  $_POST['title'];
        } else {
            echo 'Please enter the wine name';
        }
        if (isset ($_POST['content'])) {
            $description = $_POST['content'];
        } else {
            echo 'Please enter some notes';
        }
        if (isset ($_POST['name'])) {
            $name = $_POST['name'];
        }
        if (isset ($_POST['mail'])) {
            $email = $_POST['mail'];
        }
        $tags = $_POST['post_tags'];
        // ADD THE FORM INPUT TO $new_post ARRAY
        $new_post = array(
            'post_title'    =>   $title,
            'post_content'  =>   $description,
            'post_status'   =>   'publish',           // Choose: publish, preview, future, draft, etc.
            'post_type' =>   'feedback',  //'post',page' or use a custom post type if you want to
            'meta_input' => array(
                'name' => $name,
                'email' => $email,
            )
        );



        //echo $_POST['content'] +"           ";
        //SAVE THE POST
        $pid = wp_insert_post($new_post);
        var_dump($_POST);
        echo"<br>";
        var_dump($new_post);
        var_dump($pid);
        header('Location: /trungdung/contact');
        exit();
    } // END THE IF STATEMENT THAT STARTED THE WHOLE FORM
    //POST THE POST YO
}
add_action( 'init', 'addFeedback' );
if(function_exists('register_sidebar'))
    register_sidebar(array(
        'before_widget' => '<div id="%1$s" class="secondary_content_widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="secondary_content_widget_title">',
        'after_title' => '</h3>',
    ));
// Custom comment loop
function custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    ?>

<li class="comment_li" id="comment_<?php comment_ID(); ?>">
    <div class="comment_wrap">
        <?php

        if($comment->comment_approved == '0'):

            ?>

            <p class="awaiting_moderation">Your comment is awaiting moderation.</p><?php

        endif;

        if($args['avatar_size'] != 0) {

            ?>

            <div class="comment_author_avatar"><?php echo get_avatar($comment, $args['avatar_size']); ?></div>
            <?php

        }

        comment_text();

        ?>

        <p class="comment_meta">
            <span class="comment_author"><?php comment_author_link() ?></span>
            &#8212;
            <span class="comment_date"><?php comment_date('M jS, Y'); ?></span>
        </p>
        <p class="comment_reply"><?php echo comment_reply_link(array('before' => '', 'after' => '', 'reply_text' => 'Reply to this comment', 'depth' => $depth, 'max_depth' => $args['max_depth'])); ?></p>
    </div><!-- / comment_<?php comment_ID(); ?> -->
    <?php
}
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1200, 9999 );

?>