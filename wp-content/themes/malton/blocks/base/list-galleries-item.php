<li>		
	<div class="item">
		<div class="img">
			<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'image-820-520' ); ?>" alt="" />
			<a href="<?php the_permalink(); ?>" class="more">Посмотреть<br />фотографии</a>
		</div>
		<div class="title"><?php the_title(); ?></div>
		<div class="text"><?php the_content(); ?></div>
	</div>
</li>