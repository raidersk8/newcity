<?php get_header(); ?>	
	<?php if ( have_posts() ) : the_post(); ?>
	<div class="single <?php if(has_post_thumbnail()) echo 'has-img'; ?>" <?php if(has_post_thumbnail()) echo 'style="background-image: url('.get_the_post_thumbnail_url( get_the_ID(), 'full' ).')"'; ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="content page">
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
								<h1><?php the_title(); ?></h1>
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php comments_template(); ?>
	</div>
	<?php endif; ?>
<?php get_footer(); ?>