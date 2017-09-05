<?php
	global $act_term, $actEntrance, $actNum, $actHouse;
	//Получаем следующий подъезд
	//Выводим все секции
	$terms = get_terms( 'section', array(
		'hide_empty' => false,
	)); 
	
	//Ассоциативный массив по номерам подъезда
	$section_house_entrance_id_arr = array();
	$section_arr = array();
	foreach($terms as $row) {
		$numHouse = get_field('house', $row);
		//Разбиваем по номерам домов
		if(!isset($section_house_entrance_id_arr[$numHouse])) {
			$section_house_entrance_id_arr[$numHouse] = array();
		}
		//Делаем связь номер подъезда к секции
		$section_house_entrance_id_arr[$numHouse][get_field('entrance', $row)] = $row->term_id;
		$section_arr[$row->term_id] = array('term' => $row, 'floor' => '', 'floor-num' => 9999);
	}
	//Получаем первые этажи
	//$query = new WP_Query( array( 'post_type' => 'floor', 'posts_per_page' => -1, 'meta_key' => 'num', 'meta_value'	=> '1' ) );
	$query = new WP_Query( array( 'post_type' => 'floor', 'posts_per_page' => -1 ) );
	while ( $query->have_posts() ) {
		$query->the_post();
		$get_the_terms = get_the_terms( $post->ID, 'section');
		if($get_the_terms) {
			if(isset($section_arr[$get_the_terms[0]->term_id])) {
				//Считаем кол-во квартир в секции(подъезде)
				//Получаем номер подъезда
				$floor_num = get_field('num');
				//Если подъещд меньше то записываем ссылку на подьъезд
				if($section_arr[$get_the_terms[0]->term_id]['floor-num'] > $floor_num) {
					$section_arr[$get_the_terms[0]->term_id]['floor-num'] = $floor_num;
					$section_arr[$get_the_terms[0]->term_id]['floor'] = get_the_permalink();
				}
			}
		}
	} wp_reset_postdata();
	//Получаем этажи этой секции следующий и предыдущий
	$query = new WP_Query( array( 'post_type' => 'floor', 'posts_per_page' => -1, 
		'tax_query' => array(
			array(
				'taxonomy' => 'section',
				'field'    => 'id',
				'terms'    => array($act_term->term_id),
			)
		),
		'meta_query' => array(
			'relation' => 'OR',
				array(
					'key' => 'num',
					'value' => $actNum-1
				),
				array(
					'key' => 'num',
					'value' => $actNum+1
				)
			)
	));
	$floor_arr = array();
	while ( $query->have_posts() ) {
		$query->the_post();
		$floor_arr[get_field('num')] = get_the_permalink();
	} wp_reset_postdata();
	
	//var_dump($actEntrance);
	//var_dump($section_house_entrance_id_arr[$actHouse]);
	//var_dump($section_arr);
?>
<div class="minimap-for-svg" style="display: none;">
<?php //Формируем структуру для minimap 
	foreach($terms as $row) : ?>		
		<div class="<?php if($actEntrance == get_field('entrance', $row) && $actHouse == get_field('house', $row)) : ?>active<?php endif; ?>" data-href="<?php echo $section_arr[$row->term_id]['floor']; ?>" id="<?php the_field('id-svg-element', $row); ?>">		
			<div class="num-border"><?php echo str_pad(get_field('house', $row), 2, '0', STR_PAD_LEFT); ?></div>
			<?php echo str_pad(get_field('entrance', $row), 2, '0', STR_PAD_LEFT); ?>
		</div>
<?php endforeach; ?>
</div>
<div class="wrap-vertical-position light-content right-part mini-map">
	<div class="vertical-middle">					
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4">
					<div class="global-left-padding">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<div class="wrap-svg">
										<object id="mini-map" type="image/svg+xml" data="<?php echo get_bloginfo('template_url'); ?>/svg/minimap-full.svg" class="svg"></object>
										<div class="info">
											<div class="num-border"><?php echo str_pad($actHouse, 2, '0', STR_PAD_LEFT); ?></div>
											<?php echo str_pad($actEntrance, 2, '0', STR_PAD_LEFT); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="row change-param">
								<div class="col-xs-4 text-center">
									<label>Дом</label>
									<div class="row">
										<div class="col-xs-2 text-left no-pr">
											<?php 
											//Если в массиве есть элемент значит делаем ссылку на предыдущий подъезд 1 этаж
											if(isset($section_house_entrance_id_arr[$actHouse-1][1])) : 
											$prevTerm = $section_arr[$section_house_entrance_id_arr[$actHouse-1][1]]['floor'];
											?>
											<a class="prev-arrow" href="<?php echo $prevTerm; ?>"></a>
											<?php endif; ?>
										</div>
										<div class="col-xs-8 num">
											<?php echo str_pad($actHouse, 2, '0', STR_PAD_LEFT); ?>
										</div>
										<div class="col-xs-2 text-right no-pl">
											<?php 
											//Если в массиве есть элемент значит делаем ссылку на предыдущий подъезд 1 этаж
											if(isset($section_house_entrance_id_arr[$actHouse+1][1])) : 
											$nextTerm = $section_arr[$section_house_entrance_id_arr[$actHouse+1][1]]['floor'];
											?>
											<a class="next-arrow" href="<?php echo $nextTerm; ?>"></a>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<label>Подъезд</label>
									<div class="row">
										<div class="col-xs-2 text-left no-pr">
											<?php 
											//Если в массиве есть элемент значит делаем ссылку на предыдущий подъезд 1 этаж
											if(isset($section_house_entrance_id_arr[$actHouse][$actEntrance-1])) : 
											$prevTerm = $section_arr[$section_house_entrance_id_arr[$actHouse][$actEntrance-1]]['floor'];
											if($prevTerm != '') :
											?>
												<a class="prev-arrow" href="<?php echo $prevTerm; ?>"></a>
											<?php endif; ?>
											<?php endif; ?>
										</div>
										<div class="col-xs-8 num">
											<?php echo str_pad($actEntrance, 2, '0', STR_PAD_LEFT); ?>
										</div>
										<div class="col-xs-2 text-right no-pl">
											<?php 
											//Если в массиве есть элемент значит делаем ссылку на следуюий подъезд 1 этаж
											if(isset($section_house_entrance_id_arr[$actHouse][$actEntrance+1])) : 
											$nextTerm = $section_arr[$section_house_entrance_id_arr[$actHouse][$actEntrance+1]]['floor'];
											if($nextTerm != '') :
											?>
												<a class="next-arrow" href="<?php echo $nextTerm; ?>"></a>
											<?php endif; ?>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<label>Этаж</label>
									<div class="row">
										<div class="col-xs-2 text-left no-pr">
											<?php if(isset($floor_arr[$actNum-1])) : ?>
												<a class="prev-arrow" href="<?php echo $floor_arr[$actNum-1]; ?>"></a>
											<?php endif; ?>
										</div>
										<div class="col-xs-8 num">
											<?php echo str_pad($actNum, 2, '0', STR_PAD_LEFT); ?>
										</div>
										<div class="col-xs-2 text-right no-pl">
											<?php if(isset($floor_arr[$actNum+1])) : ?>
												<a class="next-arrow" href="<?php echo $floor_arr[$actNum+1]; ?>"></a>
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
</div>
<div class="compass"></div>