<?php
/*
Template Name: parameters
Template Post Type: page
*/
?>
<?php get_header(); 
global $post;
$meta_query = array(
	'relation'		=> 'AND',
	array(
		'key'	 	=> 'status',
		'value'	  	=> 'available',
		'compare' 	=> '=',
	),
);
//Массив для посторение слайдеров
$slidersArr = array(
	'range-floor' => array(
		'name' => 'range-floor',
		'min' => '1',
		'max' => '20',
		'value' => get_field('range-floor', 'options'),
		'step' => '1',
		'title' => 'Желаемый этаж',
	),
	'range-area' => array(
		'name' => 'range-area',
		'min' => '1',
		'max' => '100',
		'value' => get_field('range-area', 'options'),
		'step' => '1',
		'title' => 'Желаемая площадь',
	),
	'range-price' => array(
		'name' => 'range-price',
		'min' => '1.6',
		'max' => '4.8',
		'value' => get_field('range-price', 'options'),
		'step' => '0.1',
		'title' => 'Желаемая цена (млн. руб.)',
	),
);
if(!isset($_GET['num-house'])) {
	$_GET['num-house'] = explode(',', get_field('num-house', 'options'));
}
if(!isset($_GET['count-room'])) {
	$_GET['count-room'] = explode(',', get_field('count-room', 'options'));
}
if(!isset($_GET['range-floor'])) {
	$_GET['range-floor'] = get_field('range-floor', 'options');
}
if(!isset($_GET['range-area'])) {
	$_GET['range-area'] = get_field('range-area', 'options');
}
if(!isset($_GET['range-price'])) {
	$_GET['range-price'] = get_field('range-price', 'options');
}
//Ассоциативный массив полей форм и полей в базе
$keyInPost = array(
	'num-house' => array('key' => 'house', 'type-field' => 'in', 'type' => 'DECIMAL'),
	'count-room' => array('key' => 'count-room', 'type-field' => 'in', 'type' => 'DECIMAL'),
	'range-floor' => array('key' => 'floor', 'type-field' => 'range', 'type' => 'NUMERIC'),
	'range-area' => array('key' => 'total-area', 'type-field' => 'range', 'type' => 'DECIMAL'),
	'range-price' => array('key' => 'price', 'type-field' => 'range', 'type' => 'NUMERIC'),
);
if(isset($_GET)) {
	foreach($_GET as $key=>$row) {
		if(isset($slidersArr[$key])) {
			$slidersArr[$key]['value'] = $row;
		}
		if($keyInPost[$key]['type-field'] == 'in') {
			$meta_query[] = array(
				'key'	 	=> $keyInPost[$key]['key'],
				'value'	  	=> esc_sql($row),
				'compare' 	=> 'in',
				'type' => $keyInPost[$key]['type']
			);	
		}
		
		if($keyInPost[$key]['type-field'] == 'range') {
			$arr = explode(',', $row);
			$value = array('>=' => $arr[0], '<=' => $arr[1]);
			foreach($value as $vkey=>$vrow) {
				if($keyInPost[$key]['key'] == 'price') {
					$vrow = (double)$vrow * 1000000;
				}
				$meta_query[] = array(
					'key'	 	=> $keyInPost[$key]['key'],
					'value'	  	=> esc_sql($vrow),
					'compare' 	=> $vkey,
					'type' => $keyInPost[$key]['type']
				);					
			}
		}
	}
}
$args = array( 
	'post_type' => 'flat', 
	'posts_per_page' => -1,
	'meta_query'	=> $meta_query, 
);
$copyGet = $_GET;

//Определяем переменные для сортировки
$typeOrder = 'ASC';
$fieldOrder = 'price';
if(isset($_GET['orderby'])) {
	$fieldOrder = $_GET['orderby']; //Поле по которому сортируем
}
if(isset($_GET['order'])) {
	$typeOrder = $_GET['order']; //Тип сортировки
}

$sortArray = array();

$query = new WP_Query($args);
$allPosts = array();
while ( $query->have_posts() ) {
	$query->the_post();
	$allPosts[$post->ID] = $post;
	$sortArray[$post->ID] = (int)get_field($fieldOrder); //Заполняем массив сортировки по полю
}
if($typeOrder == 'ASC') {
	asort($sortArray);
} else {
	arsort($sortArray);
}

?>
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
							</div>
						</div>
					</div>
				</div>	
				<div class="wrap-scroll-pane">
					<div class="header-table">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<div class="global-left-padding">
										<div class="row">
											<div class="col-xs-11">
												<table class="table table-hover text-center"> 
													<thead> 
														<tr> 
															<th class="col-xs-2 no-p">
																<div class="title">№ дома</div>
																<a href="?<?php $copyGet['orderby'] = 'house'; $copyGet['order'] = 'ASC'; echo http_build_query($copyGet); ?>" class="sort-asc <?php if($_GET['order'] == 'ASC' && $_GET['orderby'] = 'house') echo 'active'; ?>"></a>
																<a href="?<?php $copyGet['order'] = 'DESC'; echo http_build_query($copyGet); ?>" class="sort-desc <?php if($_GET['order'] == 'DESC' && $_GET['orderby'] = 'house') echo 'active'; ?>"></a>
															</th>
															<th class="col-xs-2 no-p">
																№ Квартиры
															</th>
															<th class="col-xs-1 no-p">
																<div class="title">этаж</div>
																<a href="?<?php $copyGet['orderby'] = 'floor'; $copyGet['order'] = 'ASC'; echo http_build_query($copyGet); ?>" class="sort-asc <?php if($_GET['order'] == 'ASC' && $_GET['orderby'] = 'floor') echo 'active'; ?>"></a>
																<a href="?<?php $copyGet['order'] = 'DESC'; echo http_build_query($copyGet); ?>" class="sort-desc <?php if($_GET['order'] == 'DESC' && $_GET['orderby'] = 'floor') echo 'active'; ?>"></a>
															</th>
															<th class="col-xs-2 no-p">
																<div class="title">Комнат</div>
																<a href="?<?php $copyGet['orderby'] = 'count-room'; $copyGet['order'] = 'ASC'; echo http_build_query($copyGet); ?>" class="sort-asc <?php if($_GET['order'] == 'ASC' && $_GET['orderby'] = 'count-room') echo 'active'; ?>"></a>
																<a href="?<?php $copyGet['order'] = 'DESC'; echo http_build_query($copyGet); ?>" class="sort-desc <?php if($_GET['order'] == 'DESC' && $_GET['orderby'] = 'count-room') echo 'active'; ?>"></a>
															</th>
															<th class="col-xs-2 no-p">
																<div class="title">Площадь (м )</div>
																<a href="?<?php $copyGet['orderby'] = 'total-area'; $copyGet['order'] = 'ASC'; echo http_build_query($copyGet); ?>" class="sort-asc <?php if($_GET['order'] == 'ASC' && $_GET['orderby'] = 'total-area') echo 'active'; ?>"></a>
																<a href="?<?php $copyGet['order'] = 'DESC'; echo http_build_query($copyGet); ?>" class="sort-desc <?php if($_GET['order'] == 'DESC' && $_GET['orderby'] = 'total-area') echo 'active'; ?>"></a>
															</th>
															<th class="col-xs-3 no-p">
																<div class="title">цена (млн. руб.)</div>
																<a href="?<?php $copyGet['orderby'] = 'price'; $copyGet['order'] = 'ASC'; echo http_build_query($copyGet); ?>" class="sort-asc <?php if($_GET['order'] == 'ASC' && $_GET['orderby'] = 'price') echo 'active'; ?>"></a>
																<a href="?<?php $copyGet['order'] = 'DESC'; echo http_build_query($copyGet); ?>" class="sort-desc <?php if($_GET['order'] == 'DESC' && $_GET['orderby'] = 'price') echo 'active'; ?>"></a>
															</th>
														</tr> 
													</thead>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="scroll-pane">
						<div class="inner-scroll-pane">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12">
										<div class="global-left-padding">
											<div class="row">
												<div class="col-xs-11">
													<table class="table table-hover text-center"> 
														<tbody>
															<?php if($query->have_posts()) : ?>
																<?php foreach($sortArray as $key=>$row) : $post = $allPosts[$key]; setup_postdata( $post ); ?>
																	<tr>
																		<td class="col-xs-2 no-p"><a href="<?php the_permalink(); ?>"><?php the_field('house'); ?></a></td>
																		<td class="col-xs-2 no-p"><a href="<?php the_permalink(); ?>"><?php the_field('num'); ?></a></td>
																		<td class="col-xs-1 no-p"><a href="<?php the_permalink(); ?>"><?php the_field('floor'); ?></a></td>
																		<td class="col-xs-2 no-p"><a href="<?php the_permalink(); ?>"><?php the_field('count-room'); ?></a></td>
																		<td class="col-xs-2 no-p"><a href="<?php the_permalink(); ?>"><?php the_field('total-area'); ?></a></td>
																		<td class="col-xs-3 no-p"><a href="<?php the_permalink(); ?>"><?php echo substr(number_format(get_field('price'), 0, ',', '.'), 0, 3); ?></a></td>
																	</tr> 
																<?php endforeach; ?>
															<?php endif; ?>
														</tbody> 
													</table>
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
									<form action="">
										<div class="row first-line-param">
											<div class="col-xs-6">
												<div class="form-group text-center">
													<div class="title text-uppercase">Номер дома:</div>		
													<div data-toggle="buttons">			
														<label class="btn btn-circle <?php if(isset($_GET['num-house']) && in_array(1, $_GET['num-house'])) : ?>active<?php endif; ?>">
															1<input name="num-house[]" value="1" type="checkbox" <?php if(isset($_GET['num-house']) && in_array(1, $_GET['num-house'])) : ?>checked<?php endif; ?>>
														</label>
														<label class="btn btn-circle <?php if(isset($_GET['num-house']) && in_array(2, $_GET['num-house'])) : ?>active<?php endif; ?>">
															2<input name="num-house[]" value="2" type="checkbox" <?php if(isset($_GET['num-house']) && in_array(2, $_GET['num-house'])) : ?>checked<?php endif; ?>>
														</label>			
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<div class="form-group text-center">
													<div class="title text-uppercase">Кол-во комнат:</div>	
													<div data-toggle="buttons">			
														<label class="btn btn-circle <?php if(isset($_GET['count-room']) && in_array(1, $_GET['count-room'])) : ?>active<?php endif; ?>">
															1<input name="count-room[]" value="1" type="checkbox" <?php if(isset($_GET['count-room']) && in_array(1, $_GET['count-room'])) : ?>checked<?php endif; ?>>
														</label>
														<label class="btn btn-circle <?php if(isset($_GET['count-room']) && in_array(2, $_GET['count-room'])) : ?>active<?php endif; ?>">
															2<input name="count-room[]" value="2" type="checkbox" <?php if(isset($_GET['count-room']) && in_array(2, $_GET['count-room'])) : ?>checked<?php endif; ?>>
														</label>
														<label class="btn btn-circle <?php if(isset($_GET['count-room']) && in_array(3, $_GET['count-room'])) : ?>active<?php endif; ?>">
															3<input name="count-room[]" value="3" type="checkbox" <?php if(isset($_GET['count-room']) && in_array(3, $_GET['count-room'])) : ?>checked<?php endif; ?>>
														</label>			
													</div>
												</div>
											</div>
										</div>
										<?php foreach($slidersArr as $row) : ?>
											<div class="form-group text-center">
												<div class="wrap-slider">
													<input name="<?php echo $row['name']; ?>" class="slider" type="text" data-slider-min="<?php echo $row['min']; ?>" data-slider-max="<?php echo $row['max']; ?>" data-slider-step="<?php echo $row['step']; ?>" data-slider-value="[<?php echo $row['value']; ?>]" data-slider-ticks="[<?php echo $row['min'].','.$row['max']; ?>]" data-slider-ticks-labels="[<?php echo $row['min'].','.$row['max']; ?>]"/>
													<div class="title text-uppercase"><?php echo $row['title']; ?></div>
												</div>
											</div>											
										<?php endforeach; ?>	
										<div class="text-center">
											<button type="submit" class="btn btn-transparent text-uppercase">Подобрать квартиру</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php get_footer(); ?>
