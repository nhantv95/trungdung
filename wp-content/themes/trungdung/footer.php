<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>

		<!-- <hr />
		<div id="footer">
			<p>&copy; <?php bloginfo('name'); ?>. <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> | <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.</p>	
		</div> -->
		<!-- / footer -->
		<div class="footer">
         <div class="container">   	 
	       	<div class="footer_top">
	       	 	<div class="row">
	       	 	    <div class="col-md-4 footer_grid">
	       	 			<h4>Receive our Newsletter</h4>
	       	 			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
	       	 			<div class="search">
						  <form>
							   <input type="text" value="">
							   <input type="submit" value="">
						  </form>
					    </div>
	       	 		</div>
	       	 		<div class="col-md-4 footer_grid">
	       	 			<h4>Twitter Feed</h4>
	       	 			<div class="footer-list">
						 <ul>
							<li class="list_top"><i class="fa fa-twitter twt"></i>
							<p>Lorem ipsum <span class="yellow"><a href="#">consectetuer</a></span>vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatu</p></li><p></p>
							<li><i class="fa fa-twitter twt"></i>
							<p>Lorem ipsum <span class="yellow"><a href="#">consectetuer</a></span>vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatu</p></li><p></p>
		                 </ul>
					    </div>
	       	 		</div>
	       	 		<div class="col-md-4 footer_grid">
	       	 			<h4>Our Address</h4>
	       	 			<div class="company_address">
				     	        <p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span><a href="mailto:info@mycompany.com">info(at)mycompany.com</a></span></p>
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
						<p>© 2013 All Rights Reseverd Designed by <a href="http://w3layouts.com/">W3layouts</a> </p>
				   </div>
				   <div class="footer_nav">
				   	 <ul>
				   	 	<li><a href="index.html">Home</a></li>
				   	 	<li><a href="#">Terms of use</a></li>
				   	 	<li><a href="#">Privacy Policy</a></li>
				   	 	<li><a href="contact.html">Contact</a></li>
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