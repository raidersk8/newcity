<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php get_locale(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="">
  <header class="light-content">
	<div class="top-part text-center">
		Скидка 10% на 2-х комнатные квартиры при оформлении ипотеки до конца месяца! <a href="#">Подробнее</a>
	</div>
  </header>
	<div class="main-control-panel">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<div class="global-left-padding">
						<a href="/" class="logo hide-before-show-window"></a>
					</div>
				</div>
				<div class="col-xs-6 text-center right-part">
					<div class="row">
						<div class="col-xs-2 col-xs-offset-8">
							<a class="circle-btn" href="#">
								<span class="circle"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/map-marker.svg" alt="" /></span><br />
								Калуга
							</a>
						</div>
						<div class="col-xs-2">
							<a class="circle-btn" href="#">
								<span class="circle"><div class="menu-icon"><div class="icon"><div class="middle-line"></div></div></div></span><br />
								Меню
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
	</div>