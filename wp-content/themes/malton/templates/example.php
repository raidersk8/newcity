<?php
/*
Template Name: example-template
Template Post Type: example
*/
?>
<body data-spy="scroll" data-target="#navbar" class="<?php if(wpmd_is_phone()) echo 'is-phone'; ?> <?php if(wpmd_is_tablet()) echo 'is-tablet'; ?>">
<?php //Пример подключения файла ?>
<?php get_template_part('blocks/examples/example'); ?>
<?php get_header(); ?>	
<?php //Пример инициализации поста перед выводом ?>
<?php if ( have_posts() ) : the_post(); ?>
	<?php the_title(); ?>
	<?php the_content(); ?>
<?php endif; ?>

<?php //Пример цикла ?>
<?php $query = new WP_Query( array( 'post_type' => 'examples', 'posts_per_page' => -1 ) ); ?>
<?php if($query->have_posts()) : ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<?php the_title(); ?>
	<?php the_excerpt(); ?>
	<?php //Таксономия которая прикреплена к посту ?>
	<?php $terms = get_the_terms( $post->ID, 'my_tax' ); ?>
<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>

<?php //Пример вывода картинки прикрепленной к записи ?>
<?php if(has_post_thumbnail()) : ?>
<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'image-455-auto' ); ?>" />
<?php endif; ?>
<?php //Пример вывода картинки из шаблона ?>
<img src="<?php echo get_bloginfo('template_url'); ?>/img/img.png" alt="" />


<?php //Получаем текущую таксономию ?>
<?php $act_term = get_queried_object(); ?>
<?php //Получаем таксономии ?>
<?php $terms = get_terms( 'example_term', array(
	'hide_empty' => false,
) ); ?>

<?php //Получаем ссылку на таксономию ?>
<?php echo get_term_link( $row ); ?>

<?php 
if(!is_front_page()) : ?>
<?php endif; ?>

<?php //Меню ?>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
<?php get_footer(); ?>