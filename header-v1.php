<?php global $minti_data; ?>

<?php
// Add transparent header class
$transparentClass = NULL;
if (!is_search() && !is_404() && !is_archive() && !is_author() && !is_home()) {
	if ( (get_post_meta( get_the_ID(), 'minti_titlebar', true ) == 'transparent' || get_post_meta( get_the_ID(), 'minti_titlebar', true ) == 'transparentimage') || (get_post_meta( get_the_ID(), 'minti_titlebar', true ) == 'default' && $minti_data['titlebar_layout'] == 'transparentimage')  ){
		$transparentClass = 'header-transparent';
	}
}
if (is_search() || is_404() || is_archive() || is_home()) {
	if ($minti_data['titlebar_layout'] == 'transparentimage'){
		$transparentClass = 'header-transparent';
	}
}
if(function_exists('is_woocommerce') && is_woocommerce()){
	if ($minti_data['titlebar_layout'] == 'transparentimage'){
		$transparentClass = 'header-transparent';
	}
}
if(function_exists('is_bbpress') && is_bbpress()){
	if ($minti_data['titlebar_layout'] == 'transparentimage'){
		$transparentClass = 'header-transparent';
	}
}

// Add dark header class if selected
if((rwmb_meta('minti_titlebar') != 'default' && rwmb_meta('minti_titlebar') != '') && !is_search() && !is_404() && !is_archive() && ! is_author() && !is_home() ){
	if( rwmb_meta('minti_headercolor') == 'dark' ){
		$headerClass = 'darkheader';
	} else {
		$headerClass = '';
	}
} else {
	if ($minti_data['titlebar_color'] == 'dark'){
		$headerClass =  'darkheader';
	} else {
		$headerClass =  '';
	}
}
?>
<header id="header" class="header header-v1 header-v1-only clearfix <?php echo esc_attr($transparentClass); ?> <?php echo esc_attr($headerClass); ?>">
		
	<div class="container">
	
		<div id="logo-navigation" class="sixteen columns">
			
			<div id="logo" class="logo">
				<?php if(isset($minti_data['media_logo']['url']) && ($minti_data['media_logo']['url'] != "")) { ?>
					<a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url($minti_data['media_logo']['url']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" class="logo_standard" /></a>
					<?php if($minti_data['media_logo_transparent']['url'] != '') { ?><a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url($minti_data['media_logo_transparent']['url']); ?>" alt="<?php esc_attr(esc_attr(bloginfo('name'))); ?>" class="logo_transparent" /></a><?php } ?>
					<?php if($minti_data['media_logo_retina']['url'] != '') { ?><a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url($minti_data['media_logo_retina']['url']); ?>" width="<?php echo esc_attr($minti_data['media_logo']['width']); ?>" height="<?php echo esc_attr($minti_data['media_logo']['height']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" class="logo_retina" /></a><?php } ?>
					<?php if($minti_data['media_logo_retina_transparent']['url'] != '') { ?><a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url($minti_data['media_logo_retina_transparent']['url']); ?>" width="<?php echo esc_attr($minti_data['media_logo_transparent']['width']); ?>" height="<?php echo esc_attr($minti_data['media_logo_transparent']['height']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" class="logo_retina_transparent" /></a><?php } ?>
				<?php } else { ?>
					<a href="<?php echo esc_url(home_url()); ?>/"><?php esc_html(bloginfo('name')); ?></a>
				<?php } ?>
			</div>

			<div id="navigation" class="clearfix">	

			<div class="header-cta">
				<?php if($minti_data['switch_searchform'] == 1) { ?>
					<a href="#" id="search-btn"><svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg></a>
				<?php } ?>
                  <a class="displayPhone" href="#"><svg class="svg-inline--fa fa-phone fa-w-16 fa-flip-horizontal" style="" aria-hidden="true" data-prefix="fa" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg></a>
                  <a href="/demo" class="btn">Get A Demo</a>
				</div>		
				<!--<div class="header-icons">
				<?php if($minti_data['switch_searchform'] != 0 || $minti_data['switch_shoppingicon'] != 0) { ?>
					<div class="header-icons-divider"></div>
				<?php } ?>
				<?php if($minti_data['switch_searchform'] == 1) { ?>
					<a href="#" id="search-btn"><i class="icon-minti-search"></i></a>
				<?php } ?>
				
				<?php if (class_exists('Woocommerce')) { ?>
					<?php if($minti_data['switch_shoppingicon'] == 1) { ?>
					<?php global $woocommerce; ?>
					<span class="cart-popup">
					<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" id="shopping-btn" class="cart-contents"><i class="icon-minti-cart"></i><?php if ( sizeof( $woocommerce->cart->cart_contents ) != 0 ) { ?><span><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span><?php } ?></a>
					</span>
					<?php } ?>
				<?php } ?>
				</div>	-->

				<?php 
					if(has_nav_menu('main_navigation')) {
						wp_nav_menu( array(
							 'theme_location' => 'main_navigation',
							 'container' =>false,
							 'menu_id' => 'nav',
							 'echo' => true,
							 'menu_class' => 'menu',
							 'before' => '',
							 'after' => '',
							 'link_before' => '',
							 'link_after' => '',
							 'depth' => 0
							)
						); 
					}
					else {
						echo '<ul><li><a href=""><strong>NO MENU ASSIGNED</strong> <span>Go To Appearance > Menus and create a Menu</span></a></li></ul>';
					}
				?>
			</div>
			
		</div>
		
		<?php if($minti_data['switch_searchform'] == 1) { ?>
		<div id="search-top" class="sixteen columns clearfix">
			<form action="<?php echo esc_url(home_url()) ?>" method="GET">
	      		<input type="text" name="s" value="" placeholder="<?php echo __('To Search start typing...', 'minti') ?>" autocomplete="off" />
			</form>
			<a href="#" id="close-search-btn"><i class="icon-minti-close"></i></a>
		</div>
		<?php } ?>

		<?php if (class_exists('Woocommerce')) { ?>
		<?php global $woocommerce; ?>
		<?php if ( sizeof( $woocommerce->cart->cart_contents ) != 0 ) { ?>
			<?php if ( version_compare( WOOCOMMERCE_VERSION, "2.0.0" ) >= 0 ) { the_widget( 'WC_Widget_Cart', 'title= ' ); } ?>
		<?php } ?>	
	<?php } ?>	

	</div>	
	
</header>

<div id="mobile-header" class="mobile-header-v1">
	<div class="container">
		<div class="sixteen columns">
			<div id="mobile-logo" class="logo">
				<?php if(isset($minti_data['media_logo']['url']) && ($minti_data['media_logo']['url'] != "")) { ?>
					<a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url($minti_data['media_logo']['url']); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" class="logo_standard" /></a>
					<?php if($minti_data['media_logo_retina']['url'] != '') { ?><a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url($minti_data['media_logo_retina']['url']); ?>" width="<?php echo esc_attr($minti_data['media_logo']['width']); ?>" height="<?php echo esc_attr($minti_data['media_logo']['height']); ?>" alt="<?php esc_html(bloginfo('name')); ?>" class="logo_retina" /></a><?php } ?>
				<?php } else { ?>
					<a href="<?php echo esc_url(home_url()); ?>/"><?php esc_html(bloginfo('name')); ?></a>
				<?php } ?>
			</div>
			<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>
			<?php if (class_exists('Woocommerce')) { ?>
				<?php if($minti_data['switch_shoppingicon'] == 1) { ?>
					<?php global $woocommerce; ?>
					<a href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" id="mobile-shopping-btn" ><i class="icon-minti-cart"></i></a>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>

<div id="mobile-navigation">
	<div class="container">
		<div class="sixteen columns">
			<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'menu_id' => 'mobile-nav')); ?>
			
			<?php if($minti_data['switch_searchformmobile'] == 1) { ?>
			<form action="<?php echo esc_url(home_url()) ?>" method="GET">
	      		<input type="text" name="s" value="" placeholder="<?php echo __('Search..', 'minti') ?>"  autocomplete="off" />
			</form> 
			<?php } ?>	
		</div>
	</div>
</div>