<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="global-left-padding">
				<div class="row header">
					<?php get_template_part('blocks/base/left-slide-window-header'); ?>
				</div>
				<div class="row docs">
					<?php if( have_rows('docs', 109) ): ?>
						<?php $i=0; while ( have_rows('docs', 109) ) : the_row(); $i++; ?>
							<div class="col-xs-6">
								<a href="#" class="item <?php the_sub_field('type'); ?>-item"><img src="<?php echo get_bloginfo('template_url'); ?>/svg/icons/<?php the_sub_field('type'); ?>-icon.svg" /><span><?php the_sub_field('title'); ?></span></a>
							</div>
							<?php if(!($i%2)) : ?>
								<div class="clearfix"></div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>	