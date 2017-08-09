<?php get_header(); 
global $wp_query, $post;
?>
<div class="blog">
	<?php get_template_part('blocks/blog/important'); ?>
	<?php get_template_part('blocks/blog/blog-categories'); ?>
	<?php if( have_posts() ) : 
		$blog = array(0=>array(), 1=>array(), 2=>array());
		//Подготавливаем массив в 3 столбца
		$i=0; while ( have_posts() ) { the_post(); $i++;
			if(!($i%3)) {
				$blog[2][] = $post;
			}
			else if(!($i%2)) {
				$blog[1][] = $post;
			}
			else {
				$blog[0][] = $post;
			}
		}	
	?>
	
	
		<div class="items">
			<div class="container">
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1">
						<div class="row">
						<?php foreach($blog as $childs) : ?>
								<div class="col-sm-4 col-xs-12">
						<?php foreach($childs as $row) : $post = $row; setup_postdata($post); ?>
									<div class="item">
										<?php if(has_post_thumbnail()) : ?>
											<a href="<?php the_permalink(); ?>" class="img"><img src="<?php the_post_thumbnail_url('image-370-auto'); ?>" /></a>
										<?php endif; ?>
										<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<?php the_category(); ?>
										<a href="<?php the_permalink(); ?>" class="text">
											<?php the_excerpt(); ?>
										</a>
										<a class="permalink" href="<?php the_permalink(); ?>"></a>
									</div>
						<?php endforeach; ?>
								</div>
						<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
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
	<?php endif; ?>
	
	
</div>

<?php get_footer(); ?>
