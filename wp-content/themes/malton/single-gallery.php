<?php get_header(); 
global $backLink;
$backLink = get_permalink(84);
?>	
	<?php if ( have_posts() ) : the_post(); ?>
		<?php get_template_part('blocks/base/full-page-gallery-block'); ?>
	<?php endif; ?>
<?php get_footer(); ?>