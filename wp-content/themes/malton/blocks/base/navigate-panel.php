<?php global $navigatePanelSetting; ?>
<div class="navigate-panel full-window-height hidden-sm hidden-xs">
	<div class="phone text-right table-row"><div class="vertical-bottom"><?php the_field('phone', 'option'); ?></div></div>
	<div class="table-row" style="height: 83%;">
		<div class="vertical-middle left-margin">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
		</div>
	</div>
	<div class="table-row">
		<div class="vertical-bottom left-margin">
			<div>
				<a href="#fancybox-calculate-the-lot" onclick="$('.nav-list-tabs li a').eq(0).click();" class="btn btn-block btn-transparent text-uppercase fancybox-full-screen">Рассчитать партию</a>
			</div>
			<?php if(isset($navigatePanelSetting['isSupPage'])) : ?>
			<div class="fullpage-nav">
				<a class="moveSectionUp scroll-to" href="#top"></a>
			</div>
			<?php else : ?>
			<div class="fullpage-nav">
				<?php if(isset($navigatePanelSetting['isLast'])) : ?>
					<span class="moveSectionDown inactive"></span>
				<?php else : ?>
					<a class="moveSectionDown" href="#" onclick="$.fn.fullpage.moveSectionDown();return false"></a>		
				<?php endif; ?>
				<?php if(isset($navigatePanelSetting['isFirst'])) : ?>
					<span class="moveSectionUp inactive"></span>
				<?php else : ?>
					<a class="moveSectionUp" href="#" onclick="$.fn.fullpage.moveSectionUp();return false"></a>			
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="bottom-text">© Калуга, <?php echo date('Y'); ?><br />Сделано в <a href="http://rbc-expert.ru/">Malton Tech</a>.</div>
		</div>
	</div>
</div>
<?php $navigatePanelSetting = array(); //Онуляем переменную что бы при следующим вызове шаблона она была пустой ?>