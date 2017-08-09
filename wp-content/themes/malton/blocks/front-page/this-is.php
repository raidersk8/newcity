<div class="this-is" id="this-is">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
				<h2 class="text-center main-title"><span>Группа компаний ЭДИСОН - это:</span></h2>
			</div>
		</div>
		<div class="items">
			<?php if( have_rows('this-is', 2) ): ?>
				<div class="row">
				<?php $i=0; while ( have_rows('this-is', 2) ) : the_row(); $i++;
					$class="col-lg-9 col-lg-offset-3 col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-1 item";
					if($i==2) $class="col-lg-9 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 item";
				?>
					<div class="col-sm-6 col-xs-12">
						<div class="row">
							<div class="<?php echo $class;?>">
								<h3><?php the_sub_field('title'); ?></h3>
								<p class="text"><?php the_sub_field('text'); ?></p>
							</div>
						</div>
					</div>
					<?php if($i==2) : $i=0; ?>
					</div>
					<div class="row">
					<?php endif; ?>
				<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>