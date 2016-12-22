<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>

<!--		<hr />-->
<!--		<div id="footer">-->
<!--			<p>&copy; --><?php //bloginfo('name'); ?><!--. <a href="--><?php //bloginfo('rss2_url'); ?><!--">Entries (RSS)</a> | <a href="--><?php //bloginfo('comments_rss2_url'); ?><!--">Comments (RSS)</a>.</p>-->
<!--		</div>-->
		<!-- / footer -->

		<div class="footer">
         <div class="container">
	       	<div class="footer_top">
	       	 	<div class="row">
	       	 	    <div class="col-md-4 footer_grid">
	       	 			<h4>Facebook Feed</h4>
				        <?php $a="[facebook_likebox url=\"https://www.facebook.com/trungdungrestaurant\" ]";
				        echo do_shortcode($a);?>
	       	 		</div>
                    <div class="col-md-4 footer_grid">
                        <h4>CÔNG TY TNHH TD TRUNG DŨNG</h4>
                        <iframe width="300" height="200" frameborder="0" scrolling="no" marginheight="0"
                                src="https://maps.google.com/maps?q=46 Trần Quốc Hoàn, Hà Nội, Cầu Giấy, Việt Nam, &t=&z=14&ie=UTF8&iwloc=&output=embed"
                                marginwidth="0"><a class="addmaps" href="http://www.map-embed.com/it/"
                                                   id="get-map-data"
                                                   mce_href="http://maps.google.com/maps/api/js?sensor=false">map-embed.com</a>
                            <style>#gmap_canvas img {
                                    max-width: none !important;
                                    background: none !important
                                }</style>
                        </iframe>
                    </div>
                    <div class="col-md-4 footer_grid">
	       	 			<h4>Địa chỉ</h4>
	       	 			<div class="company_address">
				     	        <p>46 Trần Quốc Hoàn - Cầu Giấy - Hà Nội</p>
						   		<p>16 Phạm Tuấn Tài - Cầu Giấy - Hà Nội</p>
						   		<p>Việt Nam</p>
				   		<p>Điện thoại: 0968 353 688</p>
				   		<p>Hotline: 0986 345 188</p>
				 	 	<p>Email: <span><a href="mailto:trungdungrestaurant@yahoo.com">trungdungrestaurant@yahoo.com</a></span></p>
				   		</div>
				      <ul class="socials">
	                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
	                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
	                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
	                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
	                  </ul>
	       	 		</div>
	       	 		<div class="clearfix"></div>
	       	    </div>
       	    </div>
            <div class="footer_bottom">
		           <div class="copy_right">
						<p>© 2016+ All Rights Reseverd Developed by 3C13-NPTPD
				   </div>
				   <div class="footer_nav">
				   	 <ul>
				   	 	<li><a href="<?= esc_url(home_url('/')); ?>">Trang chủ</a></li>
				   	 	<li><a href="#">Terms of use</a></li>
				   	 	<li><a href="#">Privacy Policy</a></li>
				   	 	<li><a href="#">Liên hệ</a></li>
				   	 </ul>
				    </div>
				  <div class="clearfix"></div>
				</div>
		   </div>
   		</div>
		<?php wp_footer(); ?>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.openCarousel.js" type="text/javascript"></script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/fwslider.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
			    $('#slider').fwslider({
			        auto:     true,  //auto start
			        speed:    300,   //transition speed
			        pause:    4000,  //pause duration
			        panels:   5,     //number of image panels
			        width:    1680,
			        height:   500,
			        nav:      true   //show navigation
			    });
			});
		</script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
		<script>
			 new WOW().init();
		</script>
		<script>
			$(function() {
		    var button = $('#loginButton');
		    var box = $('#loginBox');
		    var form = $('#loginForm');
		    button.removeAttr('href');
		    button.mouseup(function(login) {
		        box.toggle();
		        button.toggleClass('active');
		    });
		    form.mouseup(function() {
		        return false;
		    });
		    $(this).mouseup(function(login) {
		        if(!($(login.target).parent('#loginButton').length > 0)) {
		            button.removeClass('active');
		            box.hide();
		        }
		    });
		});
		</script>
	</body>
</html>