(function($){
    $.fn.fadingbox = function(opts){
        var o = {
			duration: 500,
			fadeDuration: 250,
			minWidth: 150,
			maxWidth: 310,
			tout: null
        }
		o = jQuery.extend(o, opts);
		_over = function(e) {
			window.clearTimeout(o.tout);
			o.tout = null;

			if ($(this).hasClass('active'))
				return false;
			
			$(this).siblings(':animated, .active').each(function() {
				$(this).stop().animate({
					width: o.minWidth
				}, {
					duration: o.duration
				});
				$(this).find('a').stop().animate({ opacity: 0 }, {
					duration: o.fadeDuration,
					complete: function(){
						$(this).parent('li').removeClass('active');
						$(this).animate({ opacity: 1 }, o.fadeDuration);
					}
				});
			});
			
			$(this).stop().animate({
				width: o.maxWidth
			}, {
				duration: o.duration
			});
			$(this).find('a').stop().animate({ opacity: 0 }, {
				duration: o.fadeDuration,
				complete: function(){
					$(this).parent('li').addClass('active');
					$(this).animate({ opacity: 1 }, o.fadeDuration);
				}
			});
		}
		$(this).children('li').hover(
			_over,
			function(){
				/*
				o.tout = window.setTimeout(function() {
					$('.indexbox ul li:first').trigger('mouseover');
				}, 250)
				*/
			}
		);
    }
})(jQuery)