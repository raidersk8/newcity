$('.scroll-to').scrollToAnim();
$('.front-page .our-projects .items .item').on('mouseenter', function() {
	$('.front-page .our-projects .hover-block .item').removeClass('active');
	$($(this).attr('href')).addClass('active');
});
$(".fancybox-full-screen").fancybox({
	width: "100%", 
	height: "100%",
	autoSize: false,
	margin: [0,0 ,0, 0],
	padding: [0, 0, 0, 0]
});
$(".fancybox").fancybox({
	margin: [0,0 ,0, 0],
	padding: [0, 0, 0, 0],
	minWidth: 500,
});
//Для инициализации плагинов которым важно дождаться загрузки картинок
$(window).load(
	function() {	
		$('#preloader').hide();
		$('#sliderScrollbar').sliderScrollbar();
		fullWindowHeight();
		$('.front-page .wrap-jcarousel').wrapJcarousel();		
	}
);
$( window ).resize(function() {
	fullWindowHeight();
});
function fullWindowHeight() {
	//Делаем блоки с классом full-window-height на всю ширину
	if($('.full-window-height').length) {
		var fullScreenHeight = $(window).innerHeight();
		if(!$('body').hasClass('is-front-page')) {
			fullScreenHeight -= $('.header').height();
		}
		$('.full-window-height').innerHeight(fullScreenHeight);
	}
}
//Прикрепляем файл
$('body').on('change', '.wrap-input-file input[type="file"]', function (event, files, label) {
	var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
	var parent = $(this).parents('.wrap-input-file');
	parent.find('.file-name-text').html(file_name);
});

//Плейсхолдер меняется при фокусе на инпут
$('body').on('click', '.wrap-input-text .placeholder', function() {
	$(this).parents('.wrap-input-text').find('input').focus();
});
$('body').on('focusin', '.wrap-input-text input', function() {
	$(this).parents('.wrap-input-text').addClass('is-focus');
});
$('body').on('focusout', '.wrap-input-text input', function() {
	if($(this).val() == '') {
		$(this).parents('.wrap-input-text').removeClass('is-focus');
	}
});
//Для Fancybox Закрываем fancybox после отправки сообщения
var timerMultiFancyboxClose;
function fancyboxClose() {
	timerMultiFancyboxClose = window.setInterval("runMultipleFancyboxClose();", 1000);
}
function runMultipleFancyboxClose()
{
	var text = $('.fancybox-skin div.wpcf7-response-output').html();
	if(text != '') {
		window.clearTimeout(timerMultiFancyboxClose);
		$.fancybox.open('<div class="fancybox-message">'+text+'</div>');
	}
}
/*-------------------------------------------------------------------------------------------------------*/


//Кнопки для показа выдвигающихся окон
$('body').on('click', '.switch-slide-window', function() {
	var idWindow = $(this).attr('href');
	if($(idWindow).length) {
		$(idWindow).addClass('active-window');
		$('body').addClass('open-active-window');
		function func() {
		  $('body').addClass('end-open-active-window');
		}
		setTimeout(func, 1500);
	}
	
	//Конец анимации 
	
});
//Кнопки для закрытия выдвигающихся окон
$('body').on('click', '.wrap-left-slide-window .left-slide-window .close-window', function() {
	var left_slide_window = $(this).parents('.left-slide-window');
	var wrap_left_slide_window = $(this).parents('.wrap-left-slide-window');
	$('body').removeClass('end-open-active-window');
	
	
});