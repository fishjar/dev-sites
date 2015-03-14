(function($){
    $.fn.fadingnav = function(opts){
        var o = {
			fadeSpeed : 500
        }
        o = jQuery.extend(o, opts);
        $(this).each(function(){
            var lis = $(this).children('li');
            var bgdiv = $('<div class="fadingBG"></div>');
            lis.prepend(bgdiv);
            lis.hover(
                function() {
					$(this).children('.fadingBG').fadeIn(o.fadeSpeed);
                    $(this).children('.subnav').slideDown(o.fadeSpeed);
                },
                function() {
                    $(this).not('.active').children('.fadingBG').stop(true,true).fadeOut(o.fadeSpeed);
                    $(this).children('.subnav').stop(true,true).slideUp(o.fadeSpeed);
                }
            );
        });
    }
})(jQuery);