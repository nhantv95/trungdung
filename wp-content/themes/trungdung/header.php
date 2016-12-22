<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- dẫn link css và js -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <link href="<?php echo get_template_directory_uri(); ?>/css/nav.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet'
          type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300:700' rel='stylesheet' type='text/css'>

    <!-- animated-css -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet" type="text/css"
          media="all">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/css/font-awesome.min.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="header">
    <div class="header_top">
        <div class="container">
            <div class="logo">
                <h1><a href="<?= esc_url(home_url('/')); ?>"><span>Nhà hàng</span>Trung Dũng</a></h1>
            </div>
            <div class="navigation">
                <div>
                    <label class="mobile_menu" for="mobile_menu">
                        <span>Menu</span>
                    </label>
                    <input id="mobile_menu" type="checkbox"/>
                    <ul class="nav">
                        <li><a href="<?= esc_url(home_url('/')); ?>">Trang chủ</a></li>
                        <li><a href="<?= get_permalink(75) ?>">Giới thiệu</a></li>
                        <li><a href="<?= get_permalink(4) ?>">Tin tức</a></li>
                        <li><a href="<?= get_permalink(38) ?>">Thực đơn</a></li>
                        <li><a href="<?= get_page_link(23) ?>">Đặt bàn</a></li>
                        <li><a href="<?= get_page_link(67) ?>">Liên hệ/Phản hồi</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>