<?php get_header(); ?>	
<?php if ( have_posts() ) : the_post(); 
//Получаем секции к которой относится этаж
global $act_term, $actEntrance, $actNum, $actHouse;
$act_term = get_the_terms( get_the_ID(), 'section' );
if(count($act_term)) $act_term = $act_term[0];
//Активный подъезд или секция
$actEntrance = get_field('entrance', $act_term);
//Активный дом
$actHouse = get_field('house', $act_term);
//Активный этаж
$actNum = get_field('num');

//Моссив для связи квартир и svg элементов
$flats_link_section = array();
//Получаем квартиры привязанные к этажу
//Разбиваем квартиры по количеству комнатные
$flats_info = array(
	'flats_count_arr' => array(),
	'flats_status_arr' => array(
		'sales' => array('title'=>'Продано', 'count'=>0),
		'reserved' => array('title'=>'Забронировано', 'count'=>0),
		'available' => array('title'=>'Доступно', 'count'=>0),
	),
	'total' => 0,
);
$flats = get_field('flats');
if($flats) {
foreach($flats as $row) {
	
	//Заполняем массив для связи квартир с элементами svg
	$flats_link_section[] = array('flat' => $row, 'id-svg-element' => get_field('id-svg-element', $row));
	
	$count_room = get_field('count-room', $row->ID);
	$price = get_field('price', $row->ID);
	$status = get_field('status', $row->ID);
	//Разбиваем квартиры по количеству комнат и только доступные и счетаем
	if($status == 'available') {
		if(!isset($flats_info['flats_count_arr'][$count_room])) {
			$flats_info['flats_count_arr'][$count_room] = array('count'=>1, 'min-price' => $price);
		}
		else {
			if($flats_info['flats_count_arr'][$count_room]['min-price'] > $price) {
				$flats_info['flats_count_arr'][$count_room]['min-price'] = $price;
			}
			$flats_info['flats_count_arr'][$count_room]['count']++;
		}
	} 
	//Добавляем квариру даже если она недоступна но с 0 ценой, это обозначает что такой квартиры нет в наличии
	if(!isset($flats_info['flats_count_arr'][$count_room])) {
		$flats_info['flats_count_arr'][$count_room] = array('count'=>0, 'min-price' => $price);
	}
	//Разбиваем квартиры по статусу
	if(isset($flats_info['flats_status_arr'][$status])) {
		$flats_info['flats_status_arr'][$status]['count']++;
	}
	$flats_info['total']++;	
}
//Сортируем массив по кол-во квартир
ksort($flats_info['flats_count_arr']);
}
?>

<div class="floor-page full-height-page">
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
								<div class="row entrance">
									<?php
									if(get_field('type-img', $act_term) == 'vertical') {
										echo '<div class="col-xs-4">';
										entranceImg($act_term);
										echo '</div><div class="col-xs-3">';
										entranceTotal($flats_info);	
										entrancePrices($flats_info);	
										echo '</div><div class="col-xs-4">';
										entranceText($flats_link_section);
										echo '</div>';
									} else {
										echo '<div class="col-xs-7">';
										entranceImg($act_term);
										echo '</div><div class="col-xs-5">';
										entranceText($flats_link_section);
										echo '</div><div class="clearfix"></div><div class="col-xs-4">';
										entranceTotal($flats_info);
										echo '</div><div class="col-xs-4">';
										entrancePrices($flats_info);
										echo '</div>';
									}
									?>								
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
<?php function entranceText($flats_link_section) { 
	//Массив отношения статуса квартиры к цвету
	$status_flats_to_color = array(
		'sales' => '#C4C4C4',
		'reserved' => '#C20080',
		'available' => '#009ECC',
	);
?>


	<div class="description">
		<div class="h2 title">Выбирите<br />квартиру</div>
		<p>Чтобы узнать подробнее про интересующую вас квартиру, просто кликните по ней на схеме.</p>
	</div>
	

	<div class="sections" style="display: none;">
	<?php foreach($flats_link_section as $row) :
		$status = get_field('status', $row['flat']->ID);
	 ?>
		<div class="item" style="display: none;" data-status="<?php echo $status; ?>" data-color="<?php echo $status_flats_to_color[$status]; ?>" data-href="<?php echo get_the_permalink($row['flat']->ID); ?>" id="<?php echo $row['id-svg-element']; ?>">	
			<div class="h2 title">Квартира <?php echo $row['flat']->post_title; ?></div>
			Количество комнат: <?php the_field('count-room', $row['flat']->ID); ?><br />
			Общая площадь: <?php the_field('total-area', $row['flat']->ID); ?> м<sup>2</sup><br />
			Жилая площадь: <?php the_field('living-space', $row['flat']->ID); ?> м<sup>2</sup><br />
			Площадь кухни: <?php the_field('kitchen-area', $row['flat']->ID); ?> м<sup>2</sup><br />
		</div>
	<?php endforeach; ?>
	</div>
<?php } ?>
<?php function entranceTotal($flats_info) { ?>
	<div class="total">
		<label>Всего квартир: <?php echo $flats_info['total']; ?></label>
		<ul>
			<?php foreach($flats_info['flats_status_arr'] as $key=>$row) : ?>
				<li class="<?php echo $key; ?>"><?php echo $row['title'].': ' . $row['count']; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php } ?>
<?php function entrancePrices($flats_info) { ?>
	<div class="prices">
		<?php foreach($flats_info['flats_count_arr'] as $key=>$row) : ?>
			<div><?php echo $key; ?>-комнатные квартиры:</div>			
			<div class="price <?php if($row['count'] == 0) echo 'is-sale'; ?>"><?php if($row['count'] == 0) : ?>нет в наличии<?php else : ?>от <?php echo number_format($row['min-price'], 0, ',', ' '); ?> <?php endif; ?></div>
		<?php endforeach; ?>
	</div>
<?php } ?>
<?php get_footer(); ?>