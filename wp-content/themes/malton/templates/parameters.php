<?php
/*
Template Name: parameters
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="parameters-page full-height-page main-bg-page">
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
									<div class="row">
										<div class="col-xs-11">
											<h1><?php the_title(); ?></h1>
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
										<div class="row">
											<div class="col-xs-6">
												<div class="form-group text-center">
													<div class="title text-uppercase">Номер дома:</div>		
													<div data-toggle="buttons">			
														<label class="btn btn-circle active">														
															1<input type="checkbox" checked>
														</label>
														<span class="btn btn-circle">
															2<input type="checkbox">
														</span>			
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="form-group text-center">
													<div class="title text-uppercase">Кол-во комнат:</div>	
													<div data-toggle="buttons">			
														<label class="btn btn-circle active">														
															1<input type="checkbox" checked>
														</label>
														<span class="btn btn-circle">
															2<input type="checkbox">
														</span>
														<span class="btn btn-circle">
															3<input type="checkbox">
														</span>			
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-group text-center">
											<div class="row">
												<div class="col-xs-6 text-left"><div class="left-num">1</div></div>
												<div class="col-xs-6 text-right"><div class="right-num">20</div></div>
											</div>
											<input class="slider" data-slider-id='ex1Slider' type="text" data-slider-min="1" data-slider-max="20" data-slider-step="1" data-slider-value="[1,20]" data-slider-ticks="[1, 20]"/>
											<div class="title text-uppercase">Желаемый этаж</div>
										</div>
										<div class="form-group text-center">
											<input class="slider" data-slider-id='ex1Slider' type="text" data-slider-min="24" data-slider-max="100" data-slider-step="1" data-slider-value="[24,100]"/>
											<div class="title text-uppercase">Желаемая площадь</div>
										</div>
										<div class="form-group text-center">
											<input class="slider" data-slider-id='ex1Slider' type="text" data-slider-min="1.6" data-slider-max="4.8" data-slider-step="0.1" data-slider-value="[1.6,4.8]"/>
											<div class="title text-uppercase">Желаемая цена (млн. руб.)</div>
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
<?php endif; ?>
<?php get_footer(); ?>
