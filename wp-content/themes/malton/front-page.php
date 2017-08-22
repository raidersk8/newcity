<?php get_header(); ?>	
<?php if( have_posts() ) : the_post(); ?>
<div class="wrap-main-slide-window">
	<div class="wrap-left-slide-window main-slide-window" id="slide-window-doc">
		<div class="left-slide-window">
			<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12">
						<div class="global-left-padding">
							<div class="row header">
								<?php get_template_part('blocks/base/left-slide-window-header'); ?>
							</div>
							<div class="row docs">
								<div class="col-xs-6">
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
								</div>
								<div class="col-xs-6">
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
									<a href="#" class="item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/pdf-icon.svg" /><span>Заголовок документа<br />в формате PDF</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
		<?php get_template_part('blocks/front-page/main'); ?>
	</div>
</div>	
<?php endif; ?>
<?php get_footer(); ?>
