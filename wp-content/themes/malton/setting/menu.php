<?php
//Регестрируем область под меню
register_nav_menu('main-menu', 'Основное меню');
//Регестрируем область под меню
register_nav_menu('about-menu', 'Меню о проекте');

/*Пример вывода меню
wp_nav_menu( array( 'theme_location' => 'main-menu' ) );


//Переделанная структура каласса отвечающая за построение меню
require_once('class-walker-nav-mainmenu.php');

//Меняем меню
function new_wp_nav_menu_items($items) {
	
	$portfolio_id = 0;
	
	$curent_item = false;
	
	//Если дочерний элемент портфолио выбран, мы добавляем после портфолио
	foreach ( $items as $key => $row ) {
		//Получаем id портфолио
		//Если у него есть  дети
		if(!$portfolio_id && mb_strtolower($row->title) == 'портфолио' && in_array('menu-item-has-children', $row->classes)) {
			$portfolio_id = $row->object_id;
		}
		if ($portfolio_id && $row->menu_item_parent == $portfolio_id && $row->current ) { 
			//Записываем его в отдельную переменную
			$curent_item = $row->title;
		}
	}
	//Если потфолио не нашли то выходим
	if(!$portfolio_id) return $items;
	
	//Если у нас есть выделеный элемент в подменю потфолио
	if($curent_item) {
		foreach ( $items as $key => $row ) {
			if($row->object_id == $portfolio_id) {
				$row->title .= '<span class="curent-child">'.$curent_item.'</span>';
			}
		}
	}
	return $items;		
}
add_filter('wp_nav_menu_objects', 'new_wp_nav_menu_items');*/
?>