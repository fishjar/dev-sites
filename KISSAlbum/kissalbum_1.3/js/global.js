// JavaScript Document
var kissalbum = {
	picasaid: 'gabyblog',
	photowidth: 960,
	title: 'Gaby\'s Photo Album',
	subtitle: 'Seeing With Heart, Drawing With Light ...'
};

jQuery(function($){
	document.title = kissalbum.title;
	$("#hd_title h1").text(kissalbum.title);
	$("#subtitle p").text(kissalbum.subtitle);
	kissalbum.pagewidth = kissalbum.photowidth + 20;
	$("#gh_content, #header").width(kissalbum.pagewidth);
	
	$(".theme_item a").each(function(i){
		$(this).bind("click",function(){
			$("body").attr("id","theme_"+(i+1));
			$(this).parent().addClass("active").siblings(".theme_item").removeClass("active");
			$.cookie('theme_id', i+1, { expires: 365 });
		});
	});
	var themeid = 3;
	var themeck = parseInt($.cookie('theme_id'));
	var hashstr = location.hash.substring(1);
	var themeha = hashstr.indexOf("theme_");
	if((themeck!=null)&&(themeck>0)&&(themeck<5)){
		themeid = themeck;
	}
	if(themeha!=-1){
		var themehaid = parseInt(hashstr.substring(6));
		if(themehaid>0 && themehaid<5){
			themeid = themehaid;
		}
	}
	$(".theme_item a").eq(themeid-1).trigger("click");
	/*
	$(".photo_bar li a, .photo_prev, .photo_view").each(function(){
		$(this).live("focus",function(){
			if($(this).blur){
				$(this).blur();
			};
		});
	});
	*/
	$("a").live("focus",function(){
		$(this).addClass("onfocus");
	}).live("blur",function(){
		$(this).removeClass("onfocus");
	});
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
