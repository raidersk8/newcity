<div class="our-mission" id="mission">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 col-sm-offset-1 col-xs-12 text-center left-part">
				<?php $img = get_field('our-mission-img', 2); 
				if($img) :?>
				<div class="img text-center"><img src="<?php echo $img['url']; ?>" /></div>
				<?php endif; ?>
				<h4>
					<?php the_field('our-mission-name', 2); ?>
				</h4>
				<p><?php the_field('our-mission-position', 2); ?></p>
			</div>
			<div class="col-sm-6 col-sm-offset-1 col-xs-12">
				<h2><?php the_field('our-mission-title', 2); ?></h2>	
				<?php the_field('our-mission-text', 2); ?>
			</div>
		</div>
	</div>
</div>