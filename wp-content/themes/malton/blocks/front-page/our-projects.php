<?php $query = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
<?php if($query->have_posts()) : ?>
<div class="our-projects" id="projects">
	<div class="container items">
		<div class="row">			
			<?php $i=0; while ( $query->have_posts() ) : $query->the_post(); $i++; 
			$class = 'item left-part';
			if($i==2) $class = 'item text-right right-part';
			?>
			<div class="col-sm-6 col-xs-12 no-p">
				<a href="#project-<?php the_ID(); ?>" class="<?php echo $class; ?>" style="background-image: url(<?php if(has_post_thumbnail()) echo get_the_post_thumbnail_url( get_the_ID(), 'image-540-auto' ); ?>)">
					<div class="vertical-middle">
						<?php $log = get_field('logo'); 
						if($log) :
						?>
						<img src="<?php echo $log['url']; ?>" alt="" />
						<?php endif; ?>
					</div>
				</a>
			</div>
			<?php if($i==2) : $i = 0;?>
			</div>
			<div class="row">
			<?php endif; ?>
			<?php endwhile; ?>
		</div>
	</div>
	<div class="hover-block text-center hidden-xs">
		<div class="item active">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<h2 class="title">Наши проекты</h2>
					<div class="text">Задача организации, в особенности же укрепление и развитие структуры в значительной степени обуславливает создание направлений прогрессивного развития. Задача организации, в особенности же реализация намеченных плановых заданий требуют определения и уточнения соответствующий условий активизации.</div>
					<a href="/projects" class="btn btn-red text-uppercase">Все проекты</a>
				</div>
			</div>
		</div>
		<?php $query = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => -1, 'order' => 'ASC' ) ); ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="item" id="project-<?php the_ID(); ?>">
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1">
						<h2 class="title"><?php the_title(); ?></h2>
						<div class="text"><?php the_excerpt(); ?></div>
						<a href="<?php the_permalink(); ?>" class="btn btn-red text-uppercase">узнать подробнее</a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>