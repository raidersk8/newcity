<?php
/*
Template Name: contacts
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="contacts-page full-height-page">
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
										<div class="col-xs-12">
											<h1><?php the_title(); ?></h1>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<p><label>Телефон отдела продаж:</label><Br />
											+7 (4842) 222-888</p>
											<p><label>Адрес отдела продаж: </label><Br />
											г. Калуга, ул. Хрустальная, д. 1Б</p>
											<p><label>E-mail:</label> info-ng40@yandex.ru</p>
										</div>
										<div class="col-xs-6">
											<p><label>Время работы:</label><Br />
											Пн-Пт      с 9:00 до 19:00<Br />
											Сб             с 10:00 до 14:00</p>
											<p><label>Мы работаем без перерыва на обед.</label></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<div class="wrap-vertical-position light-content right-part">
					<div class="map" id="map" lat="54.520666" lng="36.293292" placemark="<?php echo get_bloginfo('template_url'); ?>/img/placemark.png" placemark-width="60" placemark-height="60"></div>
				</div>
			</div>
		</div>	
	</div>
<?php endif; ?>
<?php get_footer(); ?>
