<?php
/*
Template Name: list-galleries
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
<?php $query = new WP_Query( array( 'post_type' => 'gallery', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'   ) ); ?>
<?php if($query->have_posts()) : ?>
	<div class="list-galleries main-bg-page full-height-page">
		<div class="main-dark"></div>
		<div class="year-selector">
			<select class="selectpicker">
			  <option>Mustard</option>
			  <option>Ketchup</option>
			  <option>Relish</option>
			</select>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-9 col-xs-offset-2">
					<div class="wrap-jcarousel" data-autoscroll="0">
						<div class="jcarousel">
							<ul>
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<li>		
									<div class="item">
										<div class="img">
											<img src="<?php echo get_the_post_thumbnail_url( $children->ID, 'image-820-520' ); ?>" alt="" />
											<a href="<?php the_permalink(); ?>" class="more">Посмотреть<br />фотографии</a>
										</div>
										<div class="title"><?php the_title(); ?></div>
										<div class="text"><?php the_content(); ?></div>
									</div>
								</li>
								<?php endwhile; ?>
								<li class="empty"></li>
								<li class="empty"></li>
								<li class="empty"></li>
							</ul>
						</div>
						<a href="#" class="jcarousel-prev no-preloader"></a>
						<a href="#" class="jcarousel-next no-preloader"></a>			
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
