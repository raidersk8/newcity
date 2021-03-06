<?php get_header(); 
global $act_term, $actEntrance, $actNum, $actHouse; ?>	
<?php if ( have_posts() ) : the_post(); 


$act_term = get_the_terms( get_the_ID(), 'section' );
if(count($act_term)) $act_term = $act_term[0];
//Активный подъезд или секция
$actEntrance = get_field('entrance', $act_term);
$actHouse = get_field('house', $act_term);
//Узнаем этаж
$posts = get_posts(array(
	'post_type' => 'floor',
	'meta_query' => array(
		array(
			'key' => 'flats', // name of custom field
			'value' => '"' . get_the_ID() . '"',
			'compare' => 'LIKE'
		)
	)
));
if(count($posts)) $actNum = get_field('num', $posts[0]->ID);

$arrDescriptionBlock = array(
	'title' => get_the_title(),
	'count-room' => get_field('count-room'),
	'total-area' => get_field('total-area'),
	'living-space' => get_field('living-space'),
	'kitchen-area' => get_field('kitchen-area'),
	'price' => get_field('price'),
);
$status_flats_to_color = array(
	'sales' => '#C4C4C4',
	'reserved' => '#C20080',
	'available' => '#009ECC',
);

//Для построенния ссылки поиска по параметрам

function actualParam($val) {
	return ($val < 1) ? $val : $val;
}
$minPrice = substr(number_format(get_field('price')-100000, 0, ',', '.'), 0, 3);
$maxPrice = substr(number_format(get_field('price')+100000, 0, ',', '.'), 0, 3);
$getToParam = array(
	'num-house' => array(0 => $actHouse),
	'count-room' => array(0 => $arrDescriptionBlock['count-room']),
	'range-floor' => actualParam((int)get_field('floor')-1).','.actualParam((int)get_field('floor')+1),
	'range-area' => actualParam((int)get_field('total-area')-5).','.actualParam((int)get_field('total-area')+5),
	'range-price' => $minPrice.','.$maxPrice,	
);
$urlParam = get_permalink(263).'?'.http_build_query($getToParam);

?>
<div id="for-flat-polygon" data-fill="<?php echo $status_flats_to_color[get_field('status')]; ?>" style="display: none;"></div>
	<div class="flat-page full-height-page">
		<div class="main-dark"></div>
		<div class="wrap-main-slide-window">
			<div class="wrap-left-slide-window main-slide-window active-window fixed-open" id="slide-window-about">
				<div class="left-slide-window">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="global-left-padding">
									<div class="row header">
										<?php get_template_part('blocks/base/left-slide-window-header-house'); ?>
									</div>
									<div class="row">
										<div class="col-xs-12">
										<div class="inner">
										<?php if(get_field('type-svg') == 'horizontal') : ?>
											<div class="row top-part">
												<div class="col-xs-6 col-xs-offset-1">
													<?php svgBlock(get_field('svg')); ?>
												</div>
												<div class="col-xs-4">
													<?php descriptionBlock($arrDescriptionBlock); ?>
												</div>
											</div>
											<div class="row bottom-part">
												<div class="col-xs-3 action-block">
													<?php saleBlock(); ?>
												</div>
												<div class="col-xs-3 col-xs-offset-1 action-block">
													<?php actionBlock(); ?>
												</div>
												<div class="col-xs-3">
													<a href="<?php echo $urlParam; ?>" class="btn btn-block btn-transparent-2 text-center text-uppercase">Подбор по<br />параметрам</a>
													<br/>
													<a href="<?php echo get_permalink(97); ?>" class="btn btn-block btn-transparent-3 text-center text-uppercase">рассчитать<br />ипотеку</a>
												</div>
											</div>
										<?php else : ?>
											<div class="row top-part">
												<div class="col-xs-4">
													<?php svgBlock(get_field('svg')); ?>
												</div>
												<div class="col-xs-7">
													<div class="row">
														<div class="col-xs-6">														
															<div class="row bottom-part">
																<div class="col-xs-12 action-block">
																	<?php saleBlock(); ?>
																</div>
																<div class="col-xs-12 action-block">
																	<?php actionBlock(); ?>
																</div>
															</div>	
														</div>
														<div class="col-xs-6">
															<?php descriptionBlock($arrDescriptionBlock); ?>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-6">
															<a href="<?php echo $urlParam; ?>" class="btn btn-block btn-transparent-2 text-center text-uppercase">Подбор по<br />параметрам</a>
														</div>
														<div class="col-xs-6">
															<a href="<?php echo get_permalink(97); ?>" class="btn btn-block btn-transparent-3 text-center text-uppercase">рассчитать<br />ипотеку</a>
														</div>
													</div>
												</div>
											</div>								
										<?php endif; ?>
										<a href="#" onclick="history.back();" class="back-nav"></a>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<?php get_template_part('blocks/base/mini-map'); ?>
			</div>
		</div>	
	</div>
<?php endif; ?>
<?php function svgBlock($svg) { ?>
	<?php if($svg) : ?>
		<object id="flat-svg" type="image/svg+xml" data="<?php echo $svg; ?>" class="svg"></object>
	<?php endif; ?>
<?php } ?>
<?php function descriptionBlock($arr) { ?>
	<div class="description">
		<div class="h2 title">Квартира <?php echo $arr['title']; ?></div>
		Количество комнат:  <?php echo $arr['count-room']; ?><br />
		Общая площадь: <?php echo $arr['total-area']; ?> м<sup>2</sup><br />
		Жилая площадь: <?php echo $arr['living-space']; ?> м<sup>2</sup><br />
		Площадь кухни: <?php echo $arr['kitchen-area']; ?> м<sup>2</sup><br /><br />

		Стоимость квартиры:
		<div class="price"><?php echo number_format($arr['price'], 0, ',', ' '); ?> &#8381;</div>
	</div>
<?php } ?>
<?php function saleBlock() { ?>
	<div class="title sale">Скидка!</div>
	На данную квартиру возможна скидка!<br />
	Подробности по тел.:<br />
	<b><?php the_field('phone', 'options'); ?></b>
<?php } ?>
<?php function actionBlock() { ?>
	<div class="title action">Акция!</div>
	Кратко про акцию! Суть и выгоды участия.<br />
	Подробности по тел.:<br />
	<b><?php the_field('phone', 'options'); ?></b>
<?php } ?>
<?php get_footer(); ?>