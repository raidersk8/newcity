<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
		<?php get_template_part('blocks/front-page/main'); ?>
<?php endif; ?>
<?php get_footer(); ?>
