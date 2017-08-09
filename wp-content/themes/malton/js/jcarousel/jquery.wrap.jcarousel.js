/*
Структура
<div class="wrap-jcarousel" data-responsivecountitem="1">
	<div class="jcarousel">
		<ul>
			<li></li>
		</ul>
	</div>
	<a href="#" class="jcarousel-prev"></a>
	<a href="#" class="jcarousel-next"></a>
	<div class="jcarousel-pagination"></div>
	<div class="jcarousel-scroll-pagination"></div>
</div>
*/

function runMultiple(jcarousel)
{
	jcarousel.jcarousel('scroll', '+=1');	
}
(function( $ ){

var methods = {
	init : function( options ) { 
		var settings = $.extend( {
			responsivecountitem: 0,
			autoscroll: 0,
			wrap: null,
			vertical: false,
			//На всю ширину элемента
			isfullheight: false,
			scrollendFunc: function() {},
		}, options);
		
		//Конце инициализации
		var jcarouselCreateend = function(event, carousel) {
			var jcarousel = carousel.element(),
			wrapJcarousel = jcarousel.parents('.wrap-jcarousel');
			//Ининициализируе упралвление стрелочками
			initControl(wrapJcarousel, jcarousel);			
			//Ининициализируем пагинации ввиде скрола
			initScrollPagination(wrapJcarousel, jcarousel, carousel);
			//Ининициализируем пагинацию
			initPagination(wrapJcarousel, jcarousel, carousel);
			//Ининициализируе пагинации листалка пальцами
			initSwipe(wrapJcarousel, jcarousel, carousel);
		}
		
		
		//Начало инициализации и перезагрузка
		var jcarouselCreateAndReload = function(event, carousel) {
			var jcarousel = carousel.element(),
			wrapJcarousel = jcarousel.parents('.wrap-jcarousel'),
			wrapWidth = jcarousel.innerWidth(),
			wrapHeight = jcarousel.innerHeight();
			//Пронумеруем каждый элемент(для скролинга)
			var jitems = carousel.items();
			for(var i=0; i<jitems.length; i++) {
				jitems.eq(i).attr('data-index', i);
			}			
			//Если задана responsivecountitem то делаем все элементы фиксированой шириной
			if(settings.responsivecountitem > 0) {
				jitems.css('width', wrapWidth/settings.responsivecountitem + 'px');
			}	
			//Если задана isfullheight то делаем все элементы фиксированой высоты
			if(settings.isfullheight) {
				jitems.css('height', wrapHeight + 'px');	
			}
		}
		var jcarouselTargetin = function(event, carousel) {
			//Вычисляем позицию скрола при этом событии
			positionScrollPagination(this, carousel);
		}
		return this.each(function() {   
		
			var dataSetting = JSON.parse(JSON.stringify($(this).data()));
			//Заменяем настройки
			settings = $.extend( settings, dataSetting);
			
		
			var jcarousel = $(this).find('.jcarousel');
			//Событие создания(ОБЯЗАТЕЛЬНО ДОЛЖНА БЫТЬ ПЕРЕД ИНИЦИАЛИЗАЦИЕЙ)
			jcarousel
			.on('jcarousel:create jcarousel:reload', jcarouselCreateAndReload)
			.on('jcarousel:createend', jcarouselCreateend)
			.on('jcarousel:scrollend', settings.scrollendFunc);
			
			//иницилизация карусели
			jcarousel.jcarousel({
                vertical: settings.vertical,
                wrap: settings.wrap,
            });
			
			if(settings.autoscroll > 0) {
				var timerMulti = window.setInterval(runMultiple, settings.autoscroll, jcarousel);
				/*jcarousel.jcarouselAutoscroll({
					interval: settings.autoscroll,
					target: '+=1',
					autostart: true
				});*/
			}
			
			//Помечаем первый слайд как активный 
			jcarousel.jcarousel('items').removeClass('active');
			jcarousel.jcarousel('first').addClass('active');
			
			jcarousel.on('jcarousel:visiblein', function(event, carousel) {
				jcarousel.jcarousel('items').removeClass('active');
				$(event.target).addClass('active');
		   });
			/*Событие которое покажит нам на самый правый видимый элемент при прокрутки в право \
			и левый при прокрутки влево */
			jcarousel.on('jcarousel:targetin', 'li', jcarouselTargetin);
		});
		
		
		
		
		
		//Функция вычисляет положение скрола при перелистовании
		function positionScrollPagination(actItem, carousel) {
			var wrapJcarousel = $(actItem).parents('.wrap-jcarousel');
			var scrollPagination = wrapJcarousel.find('.jcarousel-scroll-pagination');			
			var totalWidth = 0;
			var jitems = carousel.items();
			for(var i=0; i<jitems.length; i++) {
				totalWidth += jitems.eq(i).outerWidth();
			}
			//Получаем ширину скрола
			var scrollPaginationWidth = scrollPagination.width();
			//Получаем ширину ползунка
			var sliderWidth = scrollPagination.find('.jcarousel-slider').width();
			
			var positionScroll = 0;
			//Получаем текущий индекс элемента
			var curentIndex = $(actItem).attr('data-index');
			//Пробегаемся по всем элементам до текущейго элемента
			for(var j=0; j<curentIndex; j++) {
				positionScroll += carousel.items().filter('[data-index='+j+']').outerWidth();
			}
			
			
			var leftPosition = positionScroll / totalWidth * scrollPaginationWidth;
			
			//Если позиция + ширина полузка больше общей ширины
			if((leftPosition + sliderWidth) > scrollPaginationWidth) {
				leftPosition = scrollPaginationWidth - sliderWidth;
			}
			
			scrollPagination.find('.jcarousel-slider').css('left', leftPosition + 'px');
		}
		
		
		//Иницализация пролистования косанием
		function initSwipe(wrapJcarousel, jcarousel, carousel) {
			wrapJcarousel.swipe( {
				swipeRight:function(event, direction, distance, duration, fingerCount, fingerData) {
					jcarousel.jcarousel('scroll', '-=1');
				},
				swipeLeft:function(event, direction, distance, duration, fingerCount, fingerData) {
					jcarousel.jcarousel('scroll', '+=1');
				}
			});
		}
		
		//Инициализируем постраничную пагинацию
		function initPagination(wrapJcarousel, jcarousel, carousel) {
			var jpagination = wrapJcarousel.find('.jcarousel-pagination');
			
			var dataSetting = JSON.parse(JSON.stringify(jpagination.data()));
			var paramPagination = $.extend( {
				shownum: true,
			}, dataSetting);
			
			if(jpagination.length) {		
				jpagination
				.on('jcarouselpagination:active', 'a', function() {
					$(this).addClass('active');
				})
				.on('jcarouselpagination:inactive', 'a', function() {
					$(this).removeClass('active');
				}).jcarouselPagination({
					carousel: jcarousel,
					item: function(page) {
						if(paramPagination.shownum)
							return '<a href="#' + page + '">' + page + '</a>';
						else
							return '<a href="#' + page + '"></a>';
					}
				});
			}
		}
		//Иницализация скролла
		function initScrollPagination(wrapJcarousel, jcarousel, carousel) {
			var scrollPagination = wrapJcarousel.find('.jcarousel-scroll-pagination');
			if(scrollPagination.length) {		
				//Получем все слайды
				var jitems = carousel.items();
				//считаем общюю ширину элементов
				var totalWidth = 0;
				for(var i=0; i<jitems.length; i++) {
					totalWidth += jitems.eq(i).outerWidth();
				}
				//вычисляем ширину скрола				
				var jcarouseWidth = jcarousel.width();
				var factor = jcarouseWidth / totalWidth;
				if(jcarouseWidth == 0 || totalWidth == 0) {
					factor = 0;
				}
				//Добавляем элемент ползунок				
				scrollPagination.html('<div class="jcarousel-slider"></div>');
				//Выщитываем ширину ползунка
				var jcarouselSliderWidth = Math.floor(jcarouseWidth * factor);
				//Если ширина всех элементов меньше ширины карусели то ползунок на всю ширину
				if(totalWidth < jcarouseWidth) {
					jcarouselSliderWidth = jcarouseWidth;
				}	
				//Задаем ширину ползунка
				scrollPagination.find('.jcarousel-slider').css('width', jcarouselSliderWidth + 'px');				
			}			
		}
		
		function initControl(wrapJcarousel, jcarousel) {
			var jcarouselPrev = wrapJcarousel.find('.jcarousel-prev');
			var jcarouselNext = wrapJcarousel.find('.jcarousel-next');
			
			//Фонкции события когда стрелка активна
			var jcarouselcontrolActive = function() {
				$(this).removeClass('inactive');
			};
			//Фонкции события когда стрелка неактивна
			var jcarouselcontrolInactive = function() {
				$(this).addClass('inactive');
			};
			
			
			//Инициализация элемтов управления
			if(jcarouselPrev.length) {	
				jcarouselPrev
				.on('jcarouselcontrol:active', jcarouselcontrolActive)
				.on('jcarouselcontrol:inactive', jcarouselcontrolInactive)
				.jcarouselControl({
					target: '-=1',
					carousel: jcarousel
				});
			}
			if(jcarouselNext.length) {	
				jcarouselNext
				.on('jcarouselcontrol:active', jcarouselcontrolActive)
				.on('jcarouselcontrol:inactive', jcarouselcontrolInactive)
				.jcarouselControl({
					target: '+=1',
					carousel: jcarousel
				});
			}
		}

	},
};

$.fn.wrapJcarousel = function( method  ) {	
	if ( methods[method] ) {
      return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
    } else if ( typeof method === 'object' || ! method ) {
      return methods.init.apply( this, arguments );
    } else {
      $.error( 'Метод с именем ' +  method + ' не существует для jQuery.tooltip' );
    } 
  };
})( jQuery );