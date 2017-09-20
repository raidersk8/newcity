<?php
/*
Template Name: credit
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="credit-page full-height-page main-bg-page">
		<div class="main-dark"></div>
		<div class="wrap-main-slide-window">
			<div class="wrap-left-slide-window main-slide-window active-window fixed-open" id="slide-window-about">
				<div class="left-slide-window">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="global-left-padding">
									<div class="row header">
										<?php get_template_part('blocks/base/left-slide-window-header-back'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>	
				
					<div class="wrap-scroll-pane">
						<div class="scroll-pane">
							<div class="inner-scroll-pane">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-12">
											<div class="global-left-padding">
												<div class="row">
													<div class="col-xs-11">
														<h1><?php the_title(); ?></h1>
														<?php the_content(); ?>
														<?php if( have_rows('list') ): ?>
														<h3>Наши аккредитации:</h3>
														<div class="wrap-jcarousel">
															<div class="jcarousel">
																<ul>
																	<?php while ( have_rows('list') ) : the_row(); 
																	$img = get_sub_field('img');
																	if($img) : ?>
																		<li><a href="<?php the_sub_field('href'); ?>">
																			<div class="vertical-middle">
																				<img src="<?php echo $img['sizes']['image-auto-47']; ?>" alt="" />
																			</div>
																		</a></li>
																	<?php endif; ?>
																	<?php endwhile; ?>
																</ul>
															</div>
															<a href="#" class="jcarousel-prev no-preloader"></a>
															<a href="#" class="jcarousel-next no-preloader"></a>
														</div>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wrap-vertical-position light-content right-part">
					<div class="vertical-middle">					
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-4">
									<div class="global-left-padding">
										<?php echo do_shortcode('[contact-form-7 id="385" title="Рассчитать ипотеку"]'); ?>
										<div class="text">Нажимая кнопку «Рассчитать ипотеку», я даю своё согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определённых в <a href="<?php the_field('pers-data', 'options'); ?>"><span>Соглашении на обработку персональных данных</span></a> и <a href="<?php the_field('privacy-policy', 'options'); ?>"><span>Политике конфиденциальности</span></a>.</div>
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
