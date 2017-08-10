<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
	<div class="front-page light-content">
		<div class="wrap-jcarousel jcarousel-with-animation" data-autoscroll="0" data-wrap="circular" data-responsivecountitem="1" data-isfullheight="true">
			<div class="jcarousel">
				<ul>
					<li>
						<div class="bg" style="background: url(<?php echo get_bloginfo('template_url'); ?>/img/fron-page-slider/slide-1.jpg) top left no-repeat;"></div>
						<div class="wrap-left-slide-window" id="slide-1">
							<div class="left-slide-window"><a href="#" class="close-window">Закрыть</a></div>
							<div class="wrap-vertical-position inner">
								<div class="vertical-middle">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-4">
												<div class="global-left-padding">
													<h2 class="h1 animated animate-title">Доступные цены на квартиры!</h2>
													<h3 class="animated animate-sub-title">от 1,6 млн. рублей</h3>
													<a href="#" class="btn btn-eggplant text-uppercase animated animate-btn ">Подобрать квартиру</a> <span class="hide-before-show-window"><a href="#slide-1" class="more animated switch-slide-window"><span>Подробнее</span></a></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bg" style="background: url(<?php echo get_bloginfo('template_url'); ?>/img/fron-page-slider/slide-2.jpg) top left no-repeat;"></div>
						<div class="wrap-vertical-position inner">
							<div class="vertical-middle">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-4">
											<div class="global-left-padding">
												<h2 class="h1 animated animate-title">Выбор квартир</h2>
												<h3 class="animated animate-sub-title">от 2 млн. рублей</h3>
												<a href="#" class="btn btn-eggplant text-uppercase animated animate-btn">Подобрать квартиру</a> <a href="#" class="more animated"><span>Подробнее</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bg" style="background: url(<?php echo get_bloginfo('template_url'); ?>/img/fron-page-slider/slide-1.jpg) top left no-repeat;"></div>
						<div class="wrap-vertical-position inner">
							<div class="vertical-middle">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-4">
											<div class="global-left-padding">
												<h2 class="h1 animated animate-title">Доступные цены на квартиры!</h2>
												<h3 class="animated animate-sub-title">от 1,6 млн. рублей</h3>
												<a href="#" class="btn btn-eggplant text-uppercase animated animate-btn">Подобрать квартиру</a> <a href="#" class="more animated"><span>Подробнее</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="bg" style="background: url(<?php echo get_bloginfo('template_url'); ?>/img/fron-page-slider/slide-2.jpg) top left no-repeat;"></div>
						<div class="wrap-vertical-position inner">
							<div class="vertical-middle">
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-4">
											<div class="global-left-padding">
												<h2 class="h1 animated animate-title">Выбор квартир</h2>
												<h3 class="animated animate-sub-title">от 2 млн. рублей</h3>
												<a href="#" class="btn btn-eggplant text-uppercase animated animate-btn">Подобрать квартиру</a> <a href="#" class="more animated"><span>Подробнее</span></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="jcarousel-nav">
				<div class="vertical-middle">
					<a href="#" class="jcarousel-prev"></a>
					<div class="jcarousel-pagination" data-shownum="false"></div>
					<a href="#" class="jcarousel-next"></a>
				</div>
			</div>
		</div>
		<div class="main-title hide-before-show-window">
			<h1 class="h3">ЖК «Новые Черёмушки»</h1>
			<div class="text">пересечение<br />ул. Жукова и ул. Хрустальной</div>
		</div>
		<div class="wrap-docs hide-before-show-window">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-4">
						<div class="global-left-padding">
							<a class="docs" href="#"><i class="fa fa-file-text" aria-hidden="true"></i><span>Документы</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php get_footer(); ?>
