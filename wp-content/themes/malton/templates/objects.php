<?php
/*
Template Name: objects
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="objects-page">
		<object type="image/svg+xml" data="<?php echo get_bloginfo('template_url'); ?>/svg/objects.svg" id="object-homes" class="home"></object>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
