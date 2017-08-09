<?php if( have_rows('team-list', 2) ): ?>
<div class="team" id="team">		
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="text-center main-title">Наша команда</h2>				
				<div class="row">
					<div class="col-xs-12 text-center">
						<div id="sliderScrollbar" class="content slider-wich-scrollbar" data-responsivecountitem="<?php if(wpmd_is_phone()) : ?>1<?php else : ?>4<?php endif; ?>">
							<ul>
								<?php while ( have_rows('team-list', 2) ) : the_row(); 
								$img = get_sub_field('img'); ?>
								<li>
									<div class="item">
										<?php if($img) : ?>
											<div class="wrap-img">
												<div class="img" style="background-image: url(<?php echo $img['sizes']['image-201-201']; ?>)"></div>
											</div>
										<?php endif; ?>
										<h3><?php the_sub_field('name'); ?></h3>
										<p class="text"><?php the_sub_field('text'); ?></p>
										<a href="#" class="btn btn-transparent text-uppercase">связаться</a>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>