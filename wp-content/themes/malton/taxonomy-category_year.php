<?php $act_term = get_queried_object(); ?>
<?php get_header(); ?>	
<?php if( have_posts() ) : ?>
	<div class="list-galleries main-bg-page full-height-page">
		<div class="main-dark"></div>
		<div class="year-selector">
			<select class="selectpicker-ref">
			  <option value="<?php echo get_the_permalink(84); ?>">Все</option>
			  <?php $terms = get_terms( 'category_year', array(
					'hide_empty' => false,
				) ); foreach($terms as $row) : ?>
			  <option <?php if($act_term->term_id == $row->term_id) echo 'selected'; ?> value="<?php echo get_term_link( $row ); ?>"><?php echo $row->name; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-9 col-xs-offset-2">
					<div class="wrap-jcarousel" data-autoscroll="0">
						<div class="jcarousel">
							<ul>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part('blocks/base/list-galleries-item'); ?>
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
<?php get_footer(); ?>