<?php
/*
Template Name: gallery
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="gallery-page main-bg-page">
		<div class="main-dark"></div>
		<div class="wrap-vertical-position light-content main-content">
			<div class="vertical-middle">					
				<div class="container-fluid">
					<div class="row">
						<?php $childrens = get_children( array( 
							'post_parent' => get_the_ID(),
							'numberposts' => -1,
							'post_type' => 'page',
							'orderby' => 'menu_order',
							'order' => 'ASC',
						)); 
						if( $childrens ) :
						$i=0; foreach( $childrens as $children ): $i++;
						?>
						<div class="col-xs-6">
							<a href="<?php echo get_the_permalink($children->ID); ?>" class="item text-center <?php if($i == 1) echo 'left-part'; ?>">
								<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url( $children->ID, 'image-536-auto' ); ?>)">
								</div>
								<div class="text"><?php echo $children->post_title; ?></div>
							</a>
						</div>
						<?php
						endforeach;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
