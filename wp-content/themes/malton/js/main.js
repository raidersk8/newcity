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
		$('#preloader').fadeOut(500);
		$('#sliderScrollbar').sliderScrollbar();
		fullWindowHeight();
		var jcarouselBg = $('.front-page .jcarousel-bg').wrapJcarousel();		
		$('.front-page .jcarousel-front-text').wrapJcarousel({connectorCarousel: jcarouselBg});		
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

//Если мы видим что окно должно быть открыто с самого начало то добавляем класы для открытого окна
if($('.wrap-left-slide-window.active-window.fixed-open').length) {
	$('body').addClass('open-active-window').addClass('end-open-active-window');
}

//Кнопки для показа выдвигающихся окон
$('body').on('click', '.switch-slide-window', function() {
	var idWindow = $(this).attr('href');
	if($(idWindow).length) {
		$(idWindow).addClass('active-window');
		//Присваевам класс что начинаем открывать окно, в стилях стоит задержка анимации
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
	$('body').removeClass('open-active-window');	
	$('body').addClass('close-active-window');	
	function func() {
	  $('body').removeClass('close-active-window');	
	  $('.active-window').removeClass('active-window');
	}
	setTimeout(func, 1500);
});


//Добавляе span для стрелки в пункт меню у которых есть подменю
$('.main-menu ul li.menu-item-has-children > a').append('<span></span>');
//Показываем прелоудер по клику по ссылке
$('body').on('click', 'a:not(.no-preloader)', function() {
	if($(this).parents('.menu-item-has-children').length) {
	}
	$('#preloader').fadeIn(500);
});
//Раскрываем подменю по клику
$('body').on('click', '.main-menu ul li.menu-item-has-children > a span', function() {
	var parent = $(this).parents('.menu-item-has-children');
	parent.find('.sub-menu').slideToggle("fast");
	//Помечаем классом элемент
	if(parent.hasClass('active')) parent.removeClass('active'); else parent.addClass('active');
	$('#preloader').hide();
	return false;
});

$('.main-menu .close-menu').on('click', function() {
	$('.main-menu').hide( 'slide', { direction: "right" }, 300);
});
$('#show-main-menu').on('click', function() {
	$('.main-menu').show( 'slide', { direction: "right" }, 300);
});

//Обрабатываем svg
var object = document.getElementById("object-homes"); //получаем элмент object
$(window).load(function() {
//object.addEventListener("load",function(){	
	if($(object).length ) {
		var svgDocument = object.contentDocument; //получаем svg элемент внутри object
		//При навереднии убираем фильтр прозрачности и видим секцию
		$(svgDocument).find('#Cloud-Select').on('mouseenter', function() {
			var $this = $(this);
			$this.attr('filter', '');
		});
		//При выходи из области ставим фильтр прозрачности и секция исчезает
		$(svgDocument).find('#Cloud-Select').on('mouseleave', function() {
			$(this).attr('filter', 'url(#floodFilter)');
		});
	}
});