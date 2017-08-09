<div class="map" id="contacts">	
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-md-offset-9 col-sm-4 col-sm-offset-8 col-xs-12 no-p yes-p-xs text-center">
					<div class="inner">
						<div class="logo"></div>
						<div class="h4 phone"><?php the_field('phone', 'options'); ?></div>
						<p class="address"><?php the_field('address', 'options'); ?></p>
						<?php if( have_rows('emails', 'options') ): ?>
						<?php while ( have_rows('emails', 'options') ) : the_row(); ?>
						<a href="mainto:<?php the_sub_field('text'); ?>"><?php the_sub_field('text'); ?></a><br />
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="map" lat="54.513319" lng="36.246725" placemark="<?php echo get_bloginfo('template_url'); ?>/img/placemark.png" placemark-width="35" placemark-height="48"></div>
</div>