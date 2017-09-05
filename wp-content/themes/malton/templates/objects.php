<?php
/*
Template Name: objects
Template Post Type: page
*/
?>
<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); 
//Массив с количеством свободных квартир
$section_flat_arr = array();
//Формируем массив для заполнения
$terms = get_terms( 'section', array(
	'hide_empty' => false,
) ); 
//Подсчитываем квартиры
foreach($terms as $row) {
	$section_flat_arr[$row->term_id] = array(
	'count' => 0, //count - кол-во квартир в секции 
	'floor', 'floor-num' => 9999); //floor - ссылка на первый этаж каждой секции
}
//Получаем первые этажи
//$query = new WP_Query( array( 'post_type' => 'floor', 'posts_per_page' => -1, 'meta_key' => 'num', 'meta_value'	=> '1' ) );
$query = new WP_Query( array( 'post_type' => 'floor', 'posts_per_page' => -1) );
while ( $query->have_posts() ) {
	$query->the_post();
	$get_the_terms = get_the_terms( get_the_ID(), 'section');
	if($get_the_terms) {
		if(isset($section_flat_arr[$get_the_terms[0]->term_id])) {
			$floor_num = get_field('num');
			//Если подъещд меньше то записываем ссылку на подьъезд
			if($section_flat_arr[$get_the_terms[0]->term_id]['floor-num'] > $floor_num) {
				$section_flat_arr[$get_the_terms[0]->term_id]['floor-num'] = $floor_num;
				//Считаем кол-во квартир в секции(подъезде)
				$section_flat_arr[$get_the_terms[0]->term_id]['floor'] = get_the_permalink();
			}
		}
	}
}
//Получаем все квартиры
$query = new WP_Query( array( 'post_type' => 'flat', 'posts_per_page' => -1, 'meta_key' => 'status', 'meta_value'	=> 'available' ) ); 
while ( $query->have_posts() ) {
	$query->the_post();
	$get_the_terms = get_the_terms( $post->ID, 'section');
	if($terms) {
		if(isset($section_flat_arr[$get_the_terms[0]->term_id])) {
			//Считаем кол-во квартир в секции(подъезде)
			$section_flat_arr[$get_the_terms[0]->term_id]['count']++;
		}
	}
}
?>
<div class="sections" style="display: none;">
<?php foreach($terms as $row): ?>
	<div data-house="<?php the_field('house', $row); ?>" data-href="<?php echo $section_flat_arr[$row->term_id]['floor']; ?>" id="<?php the_field('id-svg-element', $row); ?>">
		Подъезд
		<div class="num"><?php the_field('entrance', $row); ?></div>
		Доступно
		<div class="num"><?php echo $section_flat_arr[$row->term_id]['count']; ?></div>	
	</div>
<?php endforeach; ?>
</div>

<div class="objects-page">
	<div class="wrap-main-slide-window">
		<div class="wrap-left-slide-window main-slide-window" id="slide-window-front-page">
			<div class="left-slide-window" id="slide-window-front-page-docs" data-remove-class="show-window-docs">
				<?php get_template_part('blocks/front-page/docs'); ?>
			</div>
			<div class="left-part">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12">
							<div class="global-left-padding">
								<div class="row top-part">
									<div class="col-xs-6">
										<a href="/" class="logo"></a>
									</div>
									<div class="col-xs-5 phone text-right">
										(4842) 222-888
									</div>
								</div>	
								<div class="row">
									<div class="col-xs-12">
										<div class="h1">Выбор<br />квартир</div>
										<div class="text-1">Выберите подъезд</div>
										<div class="selection-param">
											<a href="#"><span>Подбор по параметрам</span></a>
										</div>
										<div class="wrap-docs">
											<a class="docs switch-slide-window no-preloader" href="#slide-window-front-page" data-add-class="show-window-docs" data-sub-href="#slide-window-front-page-docs"><i class="fa fa-file-text" aria-hidden="true"></i><span>Документы</span></a>
										</div>
									</div>
								</div>						
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="right-part">
				<object type="image/svg+xml" data="<?php echo get_bloginfo('template_url'); ?>/svg/choose-object-full.svg" id="object-homes" class="home"></object>
				<div class="act-section" id="act-section" style="display: none;"></div>
				<div class="compass"></div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>
