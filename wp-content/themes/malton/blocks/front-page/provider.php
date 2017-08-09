<?php if( have_rows('provider-list', '2') ): ?>
<div class="provider" id="providers">
	<h2 class="main-title text-center"><?php the_field('provider-title', 2); ?></h2>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="wrap-jcarousel" data-responsivecountitem="<?php if(wpmd_is_phone()) echo 1; else echo 4; ?>" data-wrap="circular">
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1 no-p">
							<div class="jcarousel">
								<ul>
									<?php while ( have_rows('provider-list', 2) ) : the_row(); 
									$img = get_sub_field('img');
									if($img) :
									?>
									<li>
										<div class="item">
											<div class="img">
												<div class="vertical-middle text-center">
													<img src="<?php echo $img['sizes']['image-180-auto']; ?>" alt="" />
												</div>
											</div>
											<div class="title text-center"><?php the_sub_field('title'); ?></div>
										</div>
									</li>
									<?php endif; ?>
									<?php endwhile; ?>							
								</ul>
							</div>
						</div>
					</div>
					<a href="#" class="jcarousel-prev"></a>
					<a href="#" class="jcarousel-next"></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>