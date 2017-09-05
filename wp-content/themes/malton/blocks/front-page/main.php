<div class="front-page light-content">
	<div class="wrap-jcarousel jcarousel-bg jcarousel-with-animation" data-autoscroll="0" data-wrap="circular" data-responsivecountitem="1" data-isfullheight="true">
		<div class="jcarousel">
			<ul>
				<?php if( have_rows('slider') ): ?>
					<?php $i=0;  while ( have_rows('slider') ) : the_row(); $i++; ?>
					<li class="<?php if($i==1) : ?>before-activation<?php endif; ?>" style="background-image: url(<?php the_sub_field('img'); ?>);">
					</li>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>
		<div class="main-shadow"></div>		
	</div>
	<div class="wrap-main-slide-window">
		<div class="wrap-left-slide-window main-slide-window" id="slide-window-front-page">
			<div class="left-slide-window" id="slide-window-front-page-docs" data-remove-class="show-window-docs">
				<?php get_template_part('blocks/front-page/docs'); ?>
			</div>
			<div class="left-slide-window dark-content" id="slide-window-front-page-jcarousel">
				<div class="container-fluid wrap-header">
					<div class="row">
						<div class="col-xs-12">
							<div class="global-left-padding">
								<div class="row header">
									<?php get_template_part('blocks/base/left-slide-window-header'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="wrap-jcarousel jcarousel-from-left-slider jcarousel-with-animation">
					<div class="jcarousel">
						<ul>
						<?php if( have_rows('slider') ): ?>
							<?php $i=0;  while ( have_rows('slider') ) : the_row(); $i++; ?>
							<li class="<?php if($i==1) : ?>active<?php endif; ?>" >
								<div class="container-fluid">
									<div class="row">
										<div class="col-xs-12">
											<div class="global-left-padding">
												<div class="content-animated animated">
													<?php the_sub_field('content'); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
							<?php endwhile; ?>
						<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="wrap-jcarousel jcarousel-front-text jcarousel-with-animation" data-autoscroll="8000" data-wrap="circular" data-responsivecountitem="1" data-isfullheight="true">
				<div class="jcarousel">
					<ul>
					<?php if( have_rows('slider') ): ?>
						<?php $i=0;  while ( have_rows('slider') ) : the_row(); $i++; ?>
						<li class="<?php if($i==1) : ?>active<?php endif; ?>" >
							<div class="wrap-vertical-position inner">
								<div class="vertical-middle">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xs-4">
												<div class="global-left-padding">
													<h2 class="h1 animated animate-title"><?php the_sub_field('title'); ?></h2>
													<h3 class="h3 animated animate-sub-title"><?php the_sub_field('text-1'); ?></h3>
													<a href="#" class="btn btn-eggplant text-uppercase animated animate-btn no-preloader">Подобрать квартиру</a> <span class="hide-before-show-window"><a href="#slide-window-front-page" data-sub-href="#slide-window-front-page-jcarousel" class="more animated switch-slide-window no-preloader"><span>Подробнее</span></a></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
						<?php endwhile; ?>
					<?php endif; ?>				
					</ul>
				</div>
				
				<div class="jcarousel-nav animation-before-after-show-window">
					<div class="vertical-middle">
						<a href="#" class="jcarousel-prev no-preloader"></a>
						<div class="jcarousel-pagination" data-shownum="false"></div>
						<a href="#" class="jcarousel-next no-preloader"></a>
					</div>
				</div>
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
						<a class="docs switch-slide-window no-preloader" href="#slide-window-front-page" data-add-class="show-window-docs" data-sub-href="#slide-window-front-page-docs"><i class="fa fa-file-text" aria-hidden="true"></i><span>Документы</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>