<?php 

//wp_enqueue_style( 'consulting-style', get_template_directory_uri() . '/style.css', array( 'bootstrap' ), CONSULTING_THEME_VERSION, 'all' );

wp_enqueue_style( 'style-override', get_stylesheet_directory_uri() . '/framework/css/style-override.css');
wp_enqueue_style( 'responsive-override', get_stylesheet_directory_uri() . '/framework/css/responsive-override.css');

function mytheme_custom_scripts(){
    if ( is_home() || is_front_page()) {
        wp_enqueue_script( 'common_functions.min', get_stylesheet_directory_uri() . '/framework/js/common_functions.min.js');
            /*wp_enqueue_script( 'common_functions.min', get_stylesheet_directory_uri() . '/framework/js/common_functions.min.js');
            wp_enqueue_script( 'banner-gdpr', get_stylesheet_directory_uri() . '/framework/js/banner-gdpr.js');
            wp_enqueue_script( 'careers6326', get_stylesheet_directory_uri() . '/framework/js/careers6326.js');
          	wp_enqueue_script( 'common_vars.min1d99', get_stylesheet_directory_uri() . '/framework/js/common_vars.min1d99.js');
            wp_enqueue_script( 'date.min2b7d', get_stylesheet_directory_uri() . '/framework/js/date.min2b7d.js');
            wp_enqueue_script( 'elements52c6', get_stylesheet_directory_uri() . '/framework/js/elements52c6.js');
            wp_enqueue_script( 'for-animationcfc7', get_stylesheet_directory_uri() . '/framework/js/for-animationcfc7.js');
            wp_enqueue_script( 'functionse770', get_stylesheet_directory_uri() . '/framework/js/functionse770.js');
            wp_enqueue_script( 'gainsightcd30', get_stylesheet_directory_uri() . '/framework/js/gainsightcd30.js');
            wp_enqueue_script( 'gs_elements-bg.min5082', get_stylesheet_directory_uri() . '/framework/js/gs_elements-bg.min5082.js');
            wp_enqueue_script( 'jquery.flexverticalcenter2b7d', get_stylesheet_directory_uri() . '/framework/js/jquery.flexverticalcenter2b7d.js');
            wp_enqueue_script( 'jquery.formSelectStyle', get_stylesheet_directory_uri() . '/framework/js/jquery.formSelectStyle.js');
            wp_enqueue_script( 'jquery.formSelectStyle2b7d', get_stylesheet_directory_uri() . '/framework/js/jquery.formSelectStyle2b7d.js');
            wp_enqueue_script( 'jquery.smooth-scrollccd9', get_stylesheet_directory_uri() . '/framework/js/jquery.smooth-scrollccd9.js');
            wp_enqueue_script( 'js.cookie2b7d', get_stylesheet_directory_uri() . '/framework/js/js.cookie2b7d.js');
            wp_enqueue_script( 'lightslider2b7d', get_stylesheet_directory_uri() . '/framework/js/lightslider2b7d.js');
            wp_enqueue_script( 'lodash.min8536', get_stylesheet_directory_uri() . '/framework/js/lodash.min8536.js');
            wp_enqueue_script( 'marketoMod117b', get_stylesheet_directory_uri() . '/framework/js/marketoMod117b.js');
            wp_enqueue_script( 'onAnimationEnd.minccd9', get_stylesheet_directory_uri() . '/framework/js/onAnimationEnd.minccd9.js');
            wp_enqueue_script( 'partners-finder9afe', get_stylesheet_directory_uri() . '/framework/js/partners-finder9afe.js');
            wp_enqueue_script( 'remodal.min8536', get_stylesheet_directory_uri() . '/framework/js/remodal.min8536.js');
            wp_enqueue_script( 'select2.minccd9', get_stylesheet_directory_uri() . '/framework/js/select2.minccd9.js');
            wp_enqueue_script( 'single6195', get_stylesheet_directory_uri() . '/framework/js/single6195.js');
            wp_enqueue_script( 'single-customer6195', get_stylesheet_directory_uri() . '/framework/js/single-customer6195.js');
            wp_enqueue_script( 'single-meetup9602', get_stylesheet_directory_uri() . '/framework/js/single-meetup9602.js');
            wp_enqueue_script( 'slanta56f', get_stylesheet_directory_uri() . '/framework/js/slanta56f.js');
            wp_enqueue_script( 'stickyicky.mincfc7', get_stylesheet_directory_uri() . '/framework/js/stickyicky.mincfc7.js');
            wp_enqueue_script( 'wow.min2b7d', get_stylesheet_directory_uri() . '/framework/js/wow.min2b7d.js');*/

           /* wp_enqueue_script( 'jquery.formSelectStyle', get_stylesheet_directory_uri() . '/framework/js/jquery.formSelectStyle.js');
            wp_enqueue_script( 'functions', get_stylesheet_directory_uri() . '/framework/js/functions.js');
            wp_enqueue_script( 'fontawesome-all.min', get_stylesheet_directory_uri() . '/framework/js/fontawesome-all.min.js');
          	//wp_enqueue_script( 'stickyicky.min', get_stylesheet_directory_uri() . '/framework/js/stickyicky.min.js');
            wp_enqueue_script( 'lightslider', get_stylesheet_directory_uri() . '/framework/js/lightslider.js');
            wp_enqueue_script( 'jquery.smooth-scroll', get_stylesheet_directory_uri() . '/framework/js/jquery.smooth-scroll.js');
            wp_enqueue_script( 'remodal.min', get_stylesheet_directory_uri() . '/framework/js/remodal.min.js');
            wp_enqueue_script( 'wow.min', get_stylesheet_directory_uri() . '/framework/js/wow.min.js');
            wp_enqueue_script( 'onAnimationEnd.min', get_stylesheet_directory_uri() . '/framework/js/onAnimationEnd.min.js');
            wp_enqueue_script( 'js.cookie', get_stylesheet_directory_uri() . '/framework/js/js.cookie.js');
            wp_enqueue_script( 'jquery.flexverticalcenter', get_stylesheet_directory_uri() . '/framework/js/jquery.flexverticalcenter.js');
            wp_enqueue_script( 'imagesloaded.min', get_stylesheet_directory_uri() . '/framework/js/imagesloaded.min.js');
            wp_enqueue_script( 'lodash.min', get_stylesheet_directory_uri() . '/framework/js/lodash.min.js');
            wp_enqueue_script( 'select2.min', get_stylesheet_directory_uri() . '/framework/js/select2.min.js');
            wp_enqueue_script( 'date.min', get_stylesheet_directory_uri() . '/framework/js/date.min.js');
           // wp_enqueue_script( 'marketoMod.', get_stylesheet_directory_uri() . '/framework/js/marketoMod.js');
            wp_enqueue_script( 'slant', get_stylesheet_directory_uri() . '/framework/js/slant.js');
           // wp_enqueue_script( 'for-animation', get_stylesheet_directory_uri() . '/framework/js/for-animation.js');
            wp_enqueue_script( 'gs_elements-bg', get_stylesheet_directory_uri() . '/framework/js/gs_elements-bg.min.js');
            wp_enqueue_script( 'isotope.pkgd.min', get_stylesheet_directory_uri() . '/framework/js/isotope.pkgd.min.js');
            wp_enqueue_script( 'gainsight', get_stylesheet_directory_uri() . '/framework/js/gainsight.js');
            wp_enqueue_script( 'common_functions.min', get_stylesheet_directory_uri() . '/framework/js/common_functions.min.js');
            wp_enqueue_script( 'jquery.easing', get_stylesheet_directory_uri() . '/framework/js/jquery.easing.min.js');
            wp_enqueue_script( 'prettyPhoto', get_stylesheet_directory_uri() . '/framework/js/prettyPhoto.js');*/
    }
}
add_action( 'wp_enqueue_scripts', 'mytheme_custom_scripts' );
?>