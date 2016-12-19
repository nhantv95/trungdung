<?php
/**
 * Template Name: Đặt hàng
 *
 * @package hackademic
 * @subpackage templates
 * @since hackademic 1.0
 */
?>
<?php get_header(); ?>
    <div class="reservation_banner">
        <div class="main_title">Đặt bàn tại nhà hàng Trung Dũng</div>
        <div class="divider"></div>
    </div>

    <div class="main">
        <div class="reservation_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?= do_shortcode("[booking-form]") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>