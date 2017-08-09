(function( $ ){
	//Слайдер со скролом
	$.fn.sliderScrollbar = function( options ) {
		var settings = $.extend( {
			responsivecountitem: 0,
		}, options);
		
		var $this = this;
		
		var dataSetting = JSON.parse(JSON.stringify(this.data()));
		//Заменяем настройки
		settings = $.extend( settings, dataSetting);
		
		if(settings.responsivecountitem > 0) {
			$( window ).resize(function() {
				responsiveItems($this);
			});
			responsiveItems($this);
		}
		
		var amount=Math.max.apply(Math, this.find('li').map(function(){return $(this).outerWidth(true);}).get());	
		this.mCustomScrollbar({
			axis:"x",
			theme:"inset",
			advanced:{
				autoExpandHorizontalScroll:true
			},
			scrollButtons:{
				enable:true,
				scrollType:"stepped"
			},
			keyboard:{scrollType:"stepped"},
			snapAmount:amount,
			mouseWheel:{scrollAmount:amount}
		});	
		function responsiveItems($this) {
			var wrapWidth = $this.outerWidth(true);
			$this.find('li').css('width', wrapWidth/settings.responsivecountitem + 'px');			
		}
	};
	//Делаем одинаковой высотой все дочерние элементы с классом itemClass
	//Пример $('.group-same-heights').sameHeight();
	$.fn.sameHeight = function( options ) {  
		var settings = $.extend( {
			itemClass: '.item-same-height',
		}, options);
		return this.each(function() {	
			var items = $(this).find(settings.itemClass);
			var maxHeight = 0;
			for(var i=0; i<items.length; i++) {
				var newHeight = items.eq(i).outerHeight();
				console.log(newHeight);
				maxHeight = (maxHeight < newHeight) ? newHeight : maxHeight;
			}
			items.outerHeight(maxHeight);
		});
	};
	
	
	//Плагин ждет когда проскролими до нашего элемента и когда это произайдет то мы присваеваем класс className для элемента forClassName
	//Пример $('.header').scrollCheckpoint({className: "is-fixed-header", forClassName: $('body')});
	$.fn.scrollCheckpoint = function( options ) {  
  
		if(this.length) {
			var settings = $.extend( {
				className: '',	
				forClassName: false,	
				topOffset: 0,
			}, options);	

			var thisElement = this;

			var beginOffset = thisElement.offset();

			var scrollFunc = function() {

				var checkpointY = beginOffset.top - settings.topOffset;
				//Если мы проскролили до нашего элемента то присваиваем ему класс
				if ( $(window).scrollTop() >= checkpointY ){ 
					settings.forClassName.addClass(settings.className);
					//thisElement.css('top', $(window).scrollTop() + settings.topOffset+'px');
				}
				//Если выше элемента то убираем класс
				else {
					settings.forClassName.removeClass(settings.className);
					//thisElement.css('top', beginOffset.top+'px');
				}
			}

			$(window).on('scroll', scrollFunc);

			$(function() {
			scrollFunc();
			});
		}
	};
	
	//Почереди присваевает класс списку элементов 1 2 3 4 1 2 3 4 отлично подойдет для слайдера
	//Пример $('.animation-background').runByElements({ interval: 5000 });
	$.fn.runByElements = function( options ) {  

		var settings = $.extend( {
			className: 'active',
			interval: 3000,
		}, options);

		var timerMultiRunByElements;
		var actElementUl = this.find('ul');
		actElementUl.find('li').eq(0).addClass(settings.className);
		var runMultipleRunByElements = function() {
			var li = actElementUl.find('li');
			var length = li.length;
			var index = li.index(actElementUl.find('li.'+settings.className));
			if(li.length-1 == index) {
				index = 0;
			} else {
				index++;
			}
			li.removeClass(settings.className);
			li.eq(index).addClass(settings.className);
		};	
		timerMultiRunByElements = window.setInterval(runMultipleRunByElements, settings.interval);

	};
	
	//Анимцая к элемент с id определенном в слыке в атрибуте href
	//Пример $('.scroll-to').scrollToAnim();
	$.fn.scrollToAnim = function( options ) {  
		var settings = $.extend( {
			topOffset: 0,
		}, options);
		this.click(function () {
			var elementClick = $(this).attr("href")
			if(elementClick.length) {
				var destination = $(elementClick).offset().top - settings.topOffset;
				jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
			}
			return false;
		});
	};
	
	/*Таймер
	Пример:
	$('.countdown').countdown({
		endtime: new Date($('.countdown').data('endtime') * 1000),
		//begintime: new Date($('.countdown').data('begintime') * 1000), //Серверное время
		begintime: new Date(), //Время из браузра пользователя
		hours: $('.countdown').find('.wrap-num .hours'),
		minutes: $('.countdown').find('.wrap-num .minutes'),
		seconds: $('.countdown').find('.wrap-num .seconds'),
	});
	*/
	
	$.fn.countdown = function( options ) {  

		var settings = $.extend( {
			endtime: new Date(), //new Date(year, month, date, hours, minutes, seconds, ms) Конец таймера
			//для коректной работы должна быть меньше endtime
			begintime: new Date(), //new Date(year, month, date, hours, minutes, seconds, ms) Начало
			//Селкторы на элементы где будут менятся(Дни, часы, минуты, секунды
			days: false,
			hours: false,
			minutes: false,
			seconds: false,
			//Функция со всеми параметрами таймера для доп обработки
			intervalFunc: false, 
		}, options);	


		var $this = this;

		var timerMultiCountdown;
			

		var runMultipleCountdown = function() {
			var countdownStr = getTimeRemaining();
			if(countdownStr.total <= 0) { 
				countdownStr.days = '0'; countdownStr.hours = '0'; countdownStr.minutes = '0'; countdownStr.seconds = '0'; 
				//Завершаем таймер
				window.clearTimeout(timerMultiCountdown);
			
			}
			
			if(settings.days != false) settings.days.html(format(countdownStr.days));
			if(settings.hours != false) settings.hours.html(format(countdownStr.hours));
			if(settings.minutes != false) settings.minutes.html(format(countdownStr.minutes));
			if(settings.seconds != false) settings.seconds.html(format(countdownStr.seconds));
			
			if(settings.intervalFunc) {
				settings.intervalFunc(countdownStr);
			}		
		};	

		timerMultiCountdown = window.setInterval(runMultipleCountdown, 1000);	

		//Добавляем 0 в начало и каждый элемент запихиваем в спан
		function format(num) {
			var res = '';
			var strNum = num + "";
			if(strNum.length == 1) strNum = "0"+strNum;
			for(var i=0; i<strNum.length; i++) {
				res += '<span class="wrap-item"><span class="item">'+strNum.charAt(i)+'</span></span>';
			}
			return res;		
		}	

		function getTimeRemaining(){
		  var f = Date.parse(settings.endtime) - Date.parse(settings.begintime);
		  var t = Date.parse(settings.endtime) - Date.parse(new Date());
		  var seconds = Math.floor( (t/1000) % 60 );
		  var minutes = Math.floor( (t/1000/60) % 60 );
		  var hours = Math.floor( (t/(1000*60*60)) % 24 );
		  var days = Math.floor( t/(1000*60*60*24) );
		  return {
			'full': f,
			'total': t,//Сколько всего от текущего времени
			'days': days,
			'hours': hours,
			'minutes': minutes,
			'seconds': seconds
		  };
		}
	};
	
})( jQuery );