<?php $act_term = get_queried_object(); ?>
<?php get_header(); ?>	
<div class="section-page full-height-page">
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
								<div class="row entrance">
									<?php
									$calss1="col-xs-7";
									$class2="col-xs-5";
									$calss3="col-xs-4";
									if(get_field('type-img', $act_term) == 'vertical') {
										$calss1="col-xs-4";
										$class2="col-xs-5";	
										$calss3="col-xs-3";										
									}
									if(get_field('type-img', $act_term) == 'vertical') {
										echo '<div class="col-xs-4">';
										entranceImg($act_term);
										echo '</div><div class="col-xs-6"><div class="row"><div class="col-xs-12">';										
										entranceText();
										echo '</div></div><div class="row"><div class="col-xs-6">';			
										entranceTotal();
										echo '</div><div class="col-xs-6">';
										entrancePrices();
										echo '</div></div></div>';
									} else {
										echo '<div class="col-xs-7">';
										entranceImg($act_term);
										echo '</div><div class="col-xs-5">';
										entranceText();
										echo '</div><div class="clearfix"></div><div class="col-xs-4">';
										entranceTotal();
										echo '</div><div class="col-xs-4">';
										entrancePrices();
										echo '</div>';
									}
									?>								
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
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php function entranceImg($act_term) { ?>	
	<div class="img">
		<?php if(get_field('svg', $act_term)) : ?>
		<object type="image/svg+xml" data="<?php the_field('svg', $act_term); ?>" id="under-svg" class="svg"></object>
		<?php endif; ?>
		<?php if(get_field('img', $act_term)) : ?>
		<img src="<?php the_field('img', $act_term); ?>" alt="" />
		<?php endif; ?>
		<?php if(get_field('svg', $act_term)) : ?>
		<object type="image/svg+xml" data="<?php the_field('svg', $act_term); ?>" id="cover-svg" class="svg"></object>
		<?php endif; ?>
	</div>
<?php } ?>
<?php function entranceText() { ?>
	<div class="h2 title">Выбирите<br />квартиру</div>
	<p>Чтобы узнать подробнее про интересующую вас квартиру, просто кликните по ней на схеме.</p>
<?php } ?>
<?php function entranceTotal() { ?>
	<div class="total">
		<label>Всего квартир: 5</label>
		<ul>
			<li class="sales">Продано: 2</li>
			<li class="reserved">Забронировано: 1</li>
			<li class="available">Доступно: 2</li>
		</ul>
	</div>
<?php } ?>
<?php function entrancePrices() { ?>
	<div class="prices">
		<div>1-комнатные квартиры:</div>
		<div class="price">от 1 600 000</div>
		<div>2-комнатные квартиры:</div>
		<div class="price">от 2 400 000</div>
		<div>3-комнатные квартиры:</div>
		<div class="price is-sale">нет в наличии</div>
	</div>
<?php } ?>
<?php get_footer(); ?>