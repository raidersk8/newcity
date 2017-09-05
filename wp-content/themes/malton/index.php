<?php get_header(); 
global $wp_query, $post;
?>
<div class="blog full-height-page">
	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4">	
					<div class="global-left-padding">
						<a href="/" class="logo"></a>
					</div>
				</div>
				<div class="col-xs-4 phone">
					<div class="row">
						<div class="col-xs-8 text-right">(4842) 222-888</div>
					</div>
				</div>	
				<div class="col-xs-4 email">
					<i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info-ng40@yandex.ru">info-ng40@yandex.ru</a>
				</div>								
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-5">
				<div class="global-left-padding">
					<h2>Наши акции</h2>
					<?php if( have_rows('gallery', 111) ) : ?>
					<div class="wrap-jcarousel" data-responsivecountitem="1">
						<div class="jcarousel">
							<ul>
								<?php while ( have_rows('gallery', 111) ) : the_row(); ?>
								<?php $img = get_sub_field('img'); ?>
								<?php if($img) : ?>
								<li>
									<?php if(get_sub_field('href')) : ?>
									<a class="no-preloader" href="<?php the_sub_field('href'); ?>">
										<img src="<?php echo $img['sizes']['image-410-auto']; ?>" alt="" />
									</a>
									<?php else : ?>
									<img src="<?php echo $img['sizes']['image-410-auto']; ?>" alt="" />
									<?php endif; ?>
								</li>
								<?php endif; ?>
								<?php endwhile; ?>
							</ul>
						</div>
						<div class="jcarousel-nav">
						<a href="#" class="jcarousel-prev no-preloader"></a>
						<div class="jcarousel-pagination" data-shownum="false"></div>
						<a href="#" class="jcarousel-next no-preloader"></a>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-xs-6 col-xs-offset-1 items">
				<h2>Новости</h2>
				<div class="row">
					<?php $i=0; while ( have_posts() ) : the_post(); $i++; ?>	
					<div class="col-xs-6">
						<div class="item">
							<div class="date"><?php echo get_the_date('Y-m-d'); ?></div>
							<h4><?php the_title(); ?></h4>
							<div class="text"><?php the_content(); ?></div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				
				<div class="paginate">
					<?php 
						$big = 999999999; // уникальное число для замены

						$args = array(
							'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							'format'  => '',
							'current' => max( 1, get_query_var('paged') ),
							'total'   => $wp_query->max_num_pages,
							'prev_next' => false,
							'end_size' => 1,
							'mid_size' => 4,
						);

						$result = paginate_links( $args );

						// удаляем добавку к пагинации для первой страницы
						$result = str_replace( '/page/1/', '', $result );

						echo $result;
					?>
				</div>	
			</div>
		</div>
	</div>

	
	
	
</div>

<?php get_footer(); ?>
