//Иницализация костомных selectov
$('.selectpicker').selectpicker({
  style: 'btn-selectpicker'
});
//Иницализация костомных select который при переключении переходит по ссылке
$('.selectpicker-ref').selectpicker({
  style: 'btn-selectpicker' 
});
$('.selectpicker-ref').on('changed.bs.select', function (e) {
	location.href = $(this).selectpicker('val');
});

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

$("input.slider").slider({
	tooltip: 'always',
	tooltip_split: true,
});
//Для инициализации плагинов которым важно дождаться загрузки картинок
$(window).load(
	function() {			
		$('#sliderScrollbar').sliderScrollbar();
		fullWindowHeight();
		
			
		var jcarouselFromLeftSlider = $('.front-page .jcarousel-from-left-slider').wrapJcarousel();	
		var jcarouselBg = $('.front-page .jcarousel-bg').wrapJcarousel({connectorCarousel: jcarouselFromLeftSlider});		
		$('.front-page .jcarousel-front-text').wrapJcarousel({connectorCarousel: jcarouselBg});
		
		$('.full-page-gallery .wrap-jcarousel').wrapJcarousel();		
		$('.list-galleries .wrap-jcarousel').wrapJcarousel();		
		$('.credit-page .wrap-jcarousel').wrapJcarousel();		
		$('.blog .wrap-jcarousel').wrapJcarousel();		
	}
);
window.onpageshow= function() {	
	$('#preloader').fadeOut(500);
};
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
		
		//Если у окна есть id для под окна то скрываем все подокны и показываем только определенное
		var leftSlideWindowID = $(this).data('sub-href');
		if(leftSlideWindowID != undefined) {
			if($(idWindow).find(leftSlideWindowID).length) {
				$(idWindow).find('.left-slide-window').hide();
				$(idWindow).find(leftSlideWindowID).show();
			}
		}
		var addClass = $(this).data('add-class');
		if(addClass != undefined) {
			$('body').addClass(addClass);
		}
		
		$(idWindow).addClass('active-window');
		//Присваевам класс что начинаем открывать окно, в стилях стоит задержка анимации
		$('body').addClass('open-active-window');
		function func() {
		  $('body').addClass('end-open-active-window');
		}
		setTimeout(func, 1500);
	}
	return false;
	
	//Конец анимации 
	
});
//Кнопки для закрытия выдвигающихся окон
$('body').on('click', '.wrap-left-slide-window .left-slide-window .close-window', function() {
	var left_slide_window = $(this).parents('.left-slide-window');
	var wrap_left_slide_window = $(this).parents('.wrap-left-slide-window');
	
	var removeClass = left_slide_window.data('remove-class');
	
	if(removeClass != undefined) {
		$('body').removeClass(removeClass);
	}
	
	$('body').removeClass('end-open-active-window');
	$('body').removeClass('open-active-window');	
	$('body').addClass('close-active-window');	
	function func() {
	  $('body').removeClass('close-active-window');	
	  $('.active-window').removeClass('active-window');
	}
	setTimeout(func, 1500);
	return false;
});


//Добавляе span для стрелки в пункт меню у которых есть подменю
$('.main-menu ul li.menu-item-has-children > a').append('<span></span>');
//Показываем прелоудер по клику по ссылке
$('body').on('click', 'a:not(.no-preloader)', function() {
	if($(this).parents('.jcarousel-pagination').length) {
	}
	else {
		$('#preloader').fadeIn(500);
	}
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


//Перемещаем на нужную картинку в галере по клику на элемент
$('.list-galleries .wrap-jcarousel ul li:not(.empty)').on('click', function() {
	$('.list-galleries .wrap-jcarousel .jcarousel').jcarousel('scroll', $(this));
});
$(".mask-phone").mask("+7 (999) 999 99-99");

var object = document.getElementById("object-homes"); //получаем элмент object
$(window).load(function() {
	if($(object).length ) {	
		var svgDocument = object.contentDocument; //получаем svg элемент внутри object
		var speed = 250,
		easing = mina.easeinout;
		$(svgDocument.getElementsByClassName("section")).attr('opacity', '0');

		$(svgDocument.getElementsByClassName("section")).on( 'mouseenter', function() {
			Snap(this).animate( { 'opacity' : '0.5' }, speed, easing );
			var actHtmlObject = $('#'+$(this).attr('id'));
			$('#act-section').html(actHtmlObject.html());			
			var offset = $(this).offset();
			var curentTop = offset.top - 160;
			var curentLeft = offset.left + 20;
			$('#act-section').removeClass('from-below');
			if(curentTop < 0) {
				curentTop = offset.top + this.getBoundingClientRect().height + 10;
				$('#act-section').addClass('from-below');
			}
			$('#act-section').css('top', curentTop+'px');
			$('#act-section').css('left', curentLeft+'px');
			$('#act-section').stop(false, true);			
			$('#act-section').fadeIn();
		});
		$(svgDocument.getElementsByClassName("section")).on( 'mouseleave', function() {
			Snap(this).animate( { 'opacity' : '0' }, speed, easing );
			$('#act-section').stop(false, true);
			$('#act-section').fadeOut();
		});	
		$(svgDocument.getElementsByClassName("section")).on( 'click', function() {	
			$('#preloader').fadeIn(500);
			location.href = $('#'+$(this).attr('id')).data('href');
		});
	}
});


var cover_svg = document.getElementById("cover-svg"); //получаем элмент object
var under_svg = document.getElementById("under-svg"); //получаем элмент object
$(window).load(function() {
	if($(cover_svg).length && $(under_svg).length) {	
		var svgDocumentCover = cover_svg.contentDocument; //получаем svg элемент внутри object
		var svgDocumentUnder = under_svg.contentDocument; //получаем svg элемент внутри object
		var speed = 250,
		easing = mina.easeinout;
		
		
		$(svgDocumentCover.getElementsByClassName("section")).attr('fill-opacity', '0');
		$(svgDocumentUnder.getElementsByClassName("section")).attr('fill-opacity', '0.5');
		
		
		//Проходим по всем элементам и меняем цвет в соответствии со статусом
		$(svgDocumentUnder.getElementsByClassName("section")).each(function() {
			//Меняем цвет подложки
			$(this).attr('fill', $('.floor-page .entrance .sections #'+$(this).attr('id')).data('color'));
		});
		
		//Статус если мы ни на одном svg элементе не наверли мышкой
		var outToSvgElemetns = false;
		$(svgDocumentCover.getElementsByClassName("section")).on( 'mouseenter', function() {
			var flat_info = $('.floor-page .entrance .sections #'+$(this).attr('id'));
			var element = svgDocumentUnder.getElementById($(this).attr('id'));
			Snap(element).animate( { 'fill-opacity' : '1' }, speed, easing );
			
			outToSvgElemetns = true;
			flat_info.show();
			$('.floor-page .entrance .description').stop(true, true);
			$('.floor-page .entrance .description').fadeOut(400, function(){
				$('.floor-page .entrance .sections').stop(true, true);
				$('.floor-page .entrance .sections').fadeIn();
			});
		});
	
		$(svgDocumentCover.getElementsByClassName("section")).on( 'mouseleave', function() {
			var element = svgDocumentUnder.getElementById($(this).attr('id'));
			Snap(element).animate( { 'fill-opacity' : '0.5' }, speed, easing );
			
			outToSvgElemetns = false;
			$('.floor-page .entrance .sections .item').hide();
			$('.floor-page .entrance .sections').fadeOut(400, function(){
				//Если мы не перскочили с одного элемента на другой
				if(outToSvgElemetns == false) {
					$('.floor-page .entrance .description').fadeIn();
				}
			});
		});
		
		$(svgDocumentCover.getElementsByClassName("section")).on( 'click', function() {	
			$('#preloader').fadeIn(500);
			location.href = $('.floor-page .entrance .sections #'+$(this).attr('id')).data('href');
		});
		
	
	}
});
var minimap_svg = document.getElementById("mini-map"); //получаем элмент object
$(window).load(function() {
	if($(minimap_svg).length) {
		var svgDocumentMinimap = minimap_svg.contentDocument; //получаем svg элемент внутри object
		var speed = 250,
		easing = mina.easeinout;
		
		$(svgDocumentMinimap.getElementsByClassName("section")).attr('opacity', '0');
		
		//Помечаем текущую секуию
		var act_section_id = $('.minimap-for-svg .active').attr('id');
		$(svgDocumentMinimap.getElementById(act_section_id)).attr('class', 'section active');
		//$(svgDocumentMinimap.getElementById(act_section_id)).attr('opacity', '1');	
		$(svgDocumentMinimap.getElementsByClassName("section")).on( 'mouseenter', function() {			
			Snap(this).animate( { 'opacity' : '1' }, speed, easing );
			$('.mini-map .wrap-svg .info').html($('.minimap-for-svg #'+$(this).attr('id')).html());
		});		
		$(svgDocumentMinimap.getElementsByClassName("section")).on( 'mouseleave', function() {			
			Snap(this).animate( { 'opacity' : '0' }, speed, easing );
			$('.mini-map .wrap-svg .info').html($('.minimap-for-svg .active').html());
		});
		$(svgDocumentMinimap.getElementsByClassName("section")).on( 'click', function() {	
			$('#preloader').fadeIn(500);
			location.href = $('.minimap-for-svg #'+$(this).attr('id')).data('href');
		});		
	}
});
//Подкрашиваем план квартиры при просмотре
var flat_svg = document.getElementById("flat-svg"); //получаем элмент object
$(window).load(function() {
	if($(flat_svg).length) {
		var svgDocumentFlat = flat_svg.contentDocument; 
		$(svgDocumentFlat.getElementById("flat-polygon")).attr('fill',$('#for-flat-polygon').data('fill'));
		$(svgDocumentFlat.getElementById("flat-polygon")).attr('fill-opacity', '0.5');
	}
});
$('.parameters-page form input').on('change', function() {
	$('.parameters-page form').addClass('is-change');
});

$(function() {
	$('.scroll-pane').jScrollPane({ contentWidth: '0px'});
});

$('.list-galleries .wrap-jcarousel .jcarousel-next-custom').on('click', function() {
	var actLi = $('.list-galleries .wrap-jcarousel .jcarousel ul li.active');
	var actIndex = $('.list-galleries .wrap-jcarousel .jcarousel ul li').index(actLi);
	if(!$('.list-galleries .wrap-jcarousel .jcarousel ul li').eq(actIndex+1).hasClass('empty')) {
		$('.list-galleries .wrap-jcarousel .jcarousel').jcarousel('scroll', '+=1');
	}
	return false;
});

$('.list-galleries .wrap-jcarousel .jcarousel-prev-custom').on('click', function() {
	$('.list-galleries .wrap-jcarousel .jcarousel').jcarousel('scroll', '-=1');
	return false;
});