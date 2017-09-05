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
										<?php get_template_part('blocks/base/left-slide-window-header'); ?>
									</div>
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
				<div class="wrap-vertical-position light-content right-part">
					<div class="vertical-middle">					
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-4">
									<div class="global-left-padding">
										<div class="form-group">
											<label>Введите ваш телефон: </label>		
										</div>
										<div class="form-group">
											<input class="form-control mask-phone" value="" placeholder="+7 (___) ___ __-__"/>	
										</div>
										<div class="form-group">
											<a href="#" class="btn-block btn btn-eggplant btn-lg text-uppercase">Рассчитать ипотеку</a> 
										</div>
										<div class="text">Отправляя запрос вы соглашаетесь с условиями <a href="#"><span>обработки персональных данных</span></a></div>
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
