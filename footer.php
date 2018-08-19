	<?php global $minti_data; ?>
	
	<div id="footer-container">
     
    <div id="footer-nav">
      <div class="container">
       
        <?php if(has_nav_menu('footer_navigation')) {
              wp_nav_menu( array( 'theme_location' => 'footer_navigation' ) ); 
          } ?>
       
      </div><!-- .container -->
    </div><!-- end #footer-nav -->
        <div id="footer">
      <div class="container">
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets 1')); ?>
       <?php get_template_part('framework/inc/socialmedia' ); ?>
       
        <div id="footer-data">
        <?php if($minti_data['textarea_copyright'] != "") { ?>
            <?php echo wp_kses_post($minti_data['textarea_copyright']); ?>
          <?php } else { ?>
            &copy; <?php _e('Copyright', 'minti') ?> <?php echo esc_html(date("Y ")); esc_html(bloginfo('name')); ?>
          <?php } ?>
        </div><!-- end #footer-data -->
      </div>
    </div><!-- end #footer -->
  </div>
	
	</div><!-- end wrapall / boxed -->
	
	<?php if($minti_data['select_backtotop'] != 'hide') { ?>
	<div id="back-to-top"><a href="#"><i class="fa fa-chevron-up"></i></a></div>
	<?php } ?>
	
	<?php wp_footer(); ?>
</body>



<!--<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/jquery.formSelectStyle.js?ver=1519232435'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/functions.js?ver=1526319770'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/fontawesome-all.min.js?ver=1533848236'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/stickyicky.min.js?ver=1523423212'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/lightslider.js?ver=1519232435'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/jquery.smooth-scroll.js?ver=1519232436'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/remodal.min.js?ver=1519232437'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/wow.min.js?ver=1519232435'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/onAnimationEnd.min.js?ver=1519232436'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/js.cookie.js?ver=1519232435'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/jquery.flexverticalcenter.js?ver=1519232435'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-includes/js/imagesloaded.min.js?ver=3.2.0'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/lodash.min.js?ver=1519232437'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/select2.min.js?ver=1519232436'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/date.min.js?ver=1519232435'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/marketoMod.js?ver=1533312698'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/slant.js?ver=1527097274'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/for-animation.js?ver=1523423212'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/gs_elements-bg.min.js?ver=1527027069'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon/framework/js/isotope.pkgd.min.js?ver=4.9.8'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/gainsight.js?ver=1528227183'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon-child/framework/js/common_functions.min.js?ver=1527292278'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon/framework/js/jquery.easing.min.js?ver=4.9.8'></script>
<script type='text/javascript' defer="defer" src='https://www.gainsight.com/wp-content/themes/unicon/framework/js/prettyPhoto.js?ver=4.9.8'></script>-->


</html>