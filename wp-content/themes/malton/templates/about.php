<?php
/*
Template Name: about
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="about-page main-bg-page">
		<div class="main-shadow"></div>
		<div class="wrap-main-slide-window">
			<div class="wrap-left-slide-window main-slide-window active-window fixed-open" id="slide-window-about">
				<div class="left-slide-window">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="global-left-padding">
									<div class="row header">
										<?php get_template_part('blocks/base/left-slide-window-header'); ?>
									</div>
									<div class="row">
										<div class="col-xs-11">
											<h3><?php the_title(); ?></h3>
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="wrap-vertical-position light-content">
					<div class="vertical-middle">					
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-4">
									<div class="global-left-padding">
										<h1 class="h2">Компания «Новый город» — девелопер с большим опытом работы</h1>
										<?php wp_nav_menu( array( 'theme_location' => 'about-menu', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
<?php endif; ?>
<?php get_footer(); ?>
