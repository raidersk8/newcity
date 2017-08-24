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
						<div class="col-xs-6 text-right">
							лево
						</div>
						<div class="col-xs-6">
							право
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
