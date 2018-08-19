<?php get_header();
// Layout
$sidebar = get_post_meta( get_the_ID(), 'minti_layout', true );
if($sidebar == 'default'){
	$sidebarlayout = 'sixteen columns';
}
elseif($sidebar == 'fullwidth'){
	$sidebarlayout = 'page-section nopadding';
}
elseif($sidebar == 'sidebar-left'){
	$sidebarlayout = 'sidebar-left twelve alt columns';
}
elseif($sidebar == 'sidebar-right'){
	$sidebarlayout = 'sidebar-right twelve alt columns';
}
else{
	$sidebarlayout = 'sixteen columns';
} ?>
<div id="page-wrap" <?php if($sidebar != 'fullwidth'){ echo 'class="container"'; } ?> >
	<div id="content" class="<?php echo esc_attr($sidebarlayout); ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
		<?php if($minti_data['switch_comments'] == 1) { ?>
		<?php comments_template(); ?>
		<?php } ?>
		<?php endwhile; endif; ?>
		<?php
		global $post;
		$post_slug=$post->post_name;
		
		if($post_slug=='home'){
		$categories=get_categories(array('number' => 4));
		?>
		<!-- Start Category Blog Post Resorces -->
		<div id="block-resources">
			<div class="container">
				<h3>Resources</h3>
				<ul class="block-resources-switcher">
					<?php
						$number = 1;
						foreach ($categories as $category) {
					($number==1)?$selected='active':$selected='';?>
					<li><a href="#" class="<?php echo $selected;?>" data-type="<?php echo $category->slug;?>" title="<?php echo $category->cat_name;?>"><?php echo $category->cat_name;?></a></li>
					<?php  $number++;
					}
					?>
					
				</ul>
				<div class="block-resources-list">
					<?php
					$i = 1;
						foreach ($categories as $category) {
						$category_id=$category->term_id;
					$catquery = new WP_Query( 'cat='.$category_id.'&posts_per_page=3' ); ?>
					
					
					<?php while($catquery->have_posts()) : $catquery->the_post();?>
					<div id="block-article-<?php echo $category_id;?>" class="block-article" data-type="<?php echo $category->slug;?>" >
						
						<div class="article">
							<div class="taxonomy"><span class="category"><a href="<?php echo  get_category_link($category_id);?>"><?php echo $category->cat_name;?></a></span>     </div>
							<a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" data-id="21526" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');">
								Synecdoche and SaaS: What Title Should the Customer Success Leader Have? Image
							</a>
							<div class="content">
								<h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
								<?php the_content(); ?>
							</div>
							<!-- end .content -->
							<div class="meta">
								<span class="published-on"><?php echo get_the_date();?></span>
							</div>
							<!-- end .meta -->
						</div>
					</div>
					<!-- end .article -->
					<?php endwhile;
					wp_reset_postdata();
					$i++;?>
					
					<?php }	?>
				</div>
				
				
			</div>
		</div>
		<!-- End Category Blog Post Resorces -->
		<?php	}
		?>
		
		</div> <!-- end content -->
		<?php if($sidebar == 'sidebar-left' || $sidebar == 'sidebar-right'){ ?>
		<div id="sidebar" class="<?php echo esc_attr($sidebar); ?> alt">
			<?php get_sidebar(); ?>
		</div>
		<?php } ?>
		</div> <!-- end page-wrap -->
		
		<?php get_footer(); ?>