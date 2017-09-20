	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<div class="global-left-padding">
						<div class="copyright text animation-before-after-show-window"><div class="vertical-middle">© ЖК «Новые черемушки», <?php the_field('address', 'options'); ?></div></div>
					</div>
				</div>
				<div class="col-xs-6 text-right">
					<div class="text"><div class="vertical-middle">Сделано в <a href="http://malton.ru">Malton Tech.</a></div></div>
				</div>
			</div>
		</div>
	</footer>
	<?php $query = new WP_Query( array( 'post_type' => 'any', 'posts_per_page' => -1,
		'meta_query' => array(
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'pre-img',
					'compare' => 'EXISTS'
				)
			)
		),
		)); 
		
	//массив всех изображений
	$preImages = array();
	
	?>
	<?php if($query->have_posts()) : ?>
	<div style="display: none;">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php if(get_field('pre-img')) : 
				if(!in_array(get_field('pre-img'), $preImages)) :
				$preImages[] = get_field('pre-img');
			?>
				<img src="<?php the_field('pre-img'); ?>" alt="" />
			<?php endif; ?>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	
	<?php wp_footer(); ?>	
	</body>
</html>