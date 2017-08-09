<?php
/*function acf_init() {
	
	
}
acf_update_setting('google_api_key', 'AIzaSyAMiwfobgmOFQ51t1D__sY2TStCJlrvVx8');
add_action('acf/init', 'acf_init');

*/
if( function_exists('acf_add_options_page') ) {
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Настройки темы',
		'menu_title' 	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));	
}
?>