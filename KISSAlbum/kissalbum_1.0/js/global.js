// JavaScript Document
jQuery(function($){
	$(".theme_item span").each(function(i){
		$(this).bind("click",function(){
			$("body").attr("id","theme_"+(i+1));
			$(this).parent().addClass("active").siblings(".theme_item").removeClass("active");
			$.cookie('theme_id', i+1, { expires: 365 });
		});
	});
	if($.cookie('theme_id')==null){
		$(".theme_item span").eq(1).trigger("click");
	} else {
		$(".theme_item span").eq($.cookie('theme_id')-1).trigger("click");
	}
});

jQuery.cookie = function (key, value, options) {
    if (arguments.length > 1 && (value === null || typeof value !== "object")) {
        options = jQuery.extend({}, options);
        if (value === null) {
            options.expires = -1;
        }
        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }
        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? String(value) : encodeURIComponent(String(value)),
            options.expires ? '; expires=' + options.expires.toUTCString() : '',
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};
