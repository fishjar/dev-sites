// JavaScript Document
$(document).ready(function() {
	startDrag(document.getElementById("main"), document.getElementById("content"));
	$(window).resize(function(){
		$("#main").css({left: $(this).width()/2, top: $(this).height()/2});
	});
	
	$("#mysites li a.sitelink").each(function(){
		$(this).bind("focus",function(){
			$(this).addClass("active").parent().addClass("onfocus"); 
		}).bind("blur",function(){
			$(this).removeClass("active").parent().removeClass("onfocus"); 
		}).bind("mouseover",function(){
			$("#mysites li a.sitelink").removeClass("active").parent().removeClass("onfocus");
		});
	});
	$("#mylinks li a").each(function(){
		$(this).bind("focus",function(){
			$(this).addClass("onfocus"); 
		}).bind("blur",function(){
			$(this).removeClass("onfocus"); 
		}).bind("mouseover",function(){
			$("#mylinks li a").removeClass("onfocus");
		});
	});
	
	var albumurl = "https://picasaweb.google.com/data/feed/api/user/yugang2002/albumid/5581313200141580593?kind=photo&access=public&alt=json";
	$.getJSON(albumurl, 'callback=?', function(album){
		var photonum = album.feed.entry.length;
		if(photonum>0){
			var i = Math.floor(Math.random()*photonum);
			var bgurl = album.feed.entry[i].media$group.media$thumbnail[0].url.replace(/\/s72\//, "/s960/")
			var bgW = album.feed.entry[i].media$group.media$content[0].width;
			var bgH = album.feed.entry[i].media$group.media$content[0].height;
			if("\v"=="v"){ //if IE
				$("#wrapper").css({"z-index": "2", position: "relative"}).before('<div id="wrapper_bg"><img src="'+bgurl+'" alt="" /></div>').bgCenter({ imgW: bgW, imgH: bgH });
				$(window).resize(function(){
					$("#wrapper").bgCenter({ imgW: bgW, imgH: bgH });
				});
			} else {
				document.body.style.backgroundImage = "url("+bgurl+")";
			}
		}
	});
});

var startDrag = function(target, bar) {
	var params = {
		left: 0,
		top: 0,
		currentX: 0,
		currentY: 0,
		flag: false
	};
	var getLeft  = function(o){
		return o.getBoundingClientRect().left + o.offsetWidth/2;
	}
	var getTop  = function(o){
		return o.getBoundingClientRect().top + o.offsetHeight/2;
	}
	bar.onmousedown = function(event) {
		params.flag = true;
		params.left = getLeft(target);
		params.top = getTop(target);
		if (!event) {
			event = window.event;
			bar.onselectstart = function() {
				return false;
			}
		}
		var e = event;
		params.currentX = e.clientX;
		params.currentY = e.clientY;
	};
	document.onmouseup = function() {
		params.flag = false;
		params.left = getLeft(target);
		params.top = getTop(target);
	};
	document.onmousemove = function(event) {
		var e = event ? event: window.event;
		if (params.flag) {
			var disX = e.clientX - params.currentX;
			var disY = e.clientY - params.currentY;
			target.style.left = params.left + disX + "px";
			target.style.top = params.top + disY + "px";
		}
	}
};

(function($){
	$.fn.bgCenter = function(options) {
		var opts = {
			'imgW' : 960,
			'imgH' : 640
		};
		return this.each(function() {
			if (options) {
				$.extend( opts, options );
			}
			var winW = $(window).width();
			var winH = $(window).height();
			var imgNW = opts.imgW;
			var imgNH = opts.imgH;
			var imgL = 0;
			var imgT = 0;
			if((winW/winH)>(opts.imgW/opts.imgH)){
				imgNW = winW;
				imgNH = winW*opts.imgH/opts.imgW;
				imgT = -(imgNH-winH)/2;
			} else {
				imgNW = winH*opts.imgW/opts.imgH;
				imgNH = winH;
				imgL = -(imgNW-winW)/2;
			}
			$(this).prev("#wrapper_bg").css({width: winW, height: winH}).find("img").css({width: imgNW, height: imgNH, left: imgL, top: imgT});
		});
	};
})(jQuery);
