<div class="full-page-gallery">
	<?php if( have_rows('gallery') ) : ?>
		<div class="wrap-jcarousel jcarousel-with-animation" data-autoscroll="0" data-wrap="circular" data-responsivecountitem="1" data-isfullheight="true">
			<div class="jcarousel">
				<ul>
					<?php while ( have_rows('gallery') ) : the_row(); ?>
						<?php $img = get_sub_field('img'); if($img) : ?>
							<li style="background-image: url(<?php echo $img['sizes']['image-1920-auto']; ?>);">		
								<div class="main-horizontal-shadow"></div>						
								<div class="text">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-6 col-xs-offset-3 text-center">
												<?php the_sub_field('text'); ?>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php endif; ?>
					<?php endwhile; ?>
				</ul>
			</div>
			<div class="jcarouse-control-panel">
				<a href="#" class="jcarousel-prev no-preloader"></a>
				<a href="#" onclick="history.back();" class="prev-page"><span class="icon"></span></a>
				<a href="#" class="jcarousel-next no-preloader"></a>
			</div>				
		</div>
	<?php endif; ?>
</div>