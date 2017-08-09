<div class="full-window-height first-screen" id="about">
	<div class="wrap-vertical-position">
		<div class="vertical-middle">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<div class="logo">
							<img src="<?php echo get_bloginfo('template_url').'/svg/logo.svg'; ?>" alt="" />
						</div>
						<h1 class="tagline">
							<?php the_field('first-screen-slogan', 2); ?>
						</h1>
						<div class="row">
							<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
								<div class="text">
									<?php the_field('first-screen-text', 2); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="#this-is" class="scroll-to"></a>
</div>