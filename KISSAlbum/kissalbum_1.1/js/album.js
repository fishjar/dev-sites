// JavaScript Document
jQuery(function($){
	function getArgs(){
		var args = new Object();
		var query = location.search.substring(1);
		var pairs = query.split("&");
		for(var i=0; i<pairs.length; i++){
			var pos = pairs[i].indexOf('=');
			if(pos==-1) continue;
			var argname = pairs[i].substring(0,pos);
			var value = pairs[i].substring(pos+1);
			args[argname] = unescape(value);
		}
		return args;
	}
	var _GET = getArgs();
	var photoid = 1;
	var photonum = 0;
	var barcount = 0;
	var photocount = 0;
	if(_GET['photoid']){
		photoid = parseInt(_GET['photoid']);
	}
	if (_GET['albumid']) {
		$.ajax({
			dataType: "json",
			url: "json/album_"+_GET['albumid']+".js",
			error: function(){
				errorPage();
			},
			success: function(album){
				if(album.title!=""){
					var navStr = ' &gt; '+album.title;
					var titleStr = '<h2>'+album.title+'</h2>';
					$("#gh_tips p").append(navStr);
					$(".album").prepend(titleStr);
				}
				if(album.intro!=""){
					$(".album_intro").html(album.intro);
				}
				photonum = album.photos.length;
				if(photoid<1||photoid>photonum){
					photoid = 1;
				}
				if(photonum>0){
					$(".photo_window").html('<ul class="photo_bar"></ul>').children(".photo_bar").width(85*photonum);
					$(".photo_view").append('<ul class="photo_list"></ul>');
					for(var i=0; i<photonum; i++){
						barLoad(album.photos[i].url.replace(/\/s960\//, "\/s74-c\/"), album.photos[i].title, i+1, barLoop);
						showLoad(album.photos[i].url, album.photos[i].title, album.photos[i].intro, i+1, showLoop);
					}
					
				}
			}
		});
	} else {
		errorPage();
	}
	function barLoad(url, title, index, callback){
		$(".photo_bar").append('<li id="photo_bar_'+index+'" class="unready"><img src="images/loading_img_0.gif" alt="'+title+'" title="'+title+'" /><span>'+index+'</span></li>');
		if(index==photonum){
			$(".photo_view").prev(".loading").remove();
			$(".photo_preview").show().after('<div class="load_show"><div class="load_bar">loading</div><div class="load_photo"></div></div>');
			$(".photo_bar").moveBar({
				defphoto: photoid,
				photonum: photonum
			}).togglePhotos({
				defphoto: photoid
			});
		}
		var img = new Image();
		img.src = url;
		img.title = title;
		img.index = index;
		if (img.complete) {
			callback.call(img);
			return;
		}
		img.onload = function(){
			callback.call(img);
		};
		img.onerror = function(){
		
		}
	}
	function showLoad(url, title, intro, index, callback){
		var showStr = "";
		showStr += '<li class="photo_item" id="photo_item_'+index+'">';
		showStr += '<div class="photo_show"><div class="loading">No: '+index+'</div></div>';
		showStr += '<div class="photo_intro">';
		if(title!=""){
			showStr += '<h3>'+title+'</h3>';
		}
		showStr += intro;
		showStr += '</div>';
		showStr += '</li>';
		$(".photo_list").append(showStr);
		var img = new Image();
		img.src = url;
		img.title = title;
		img.intro = intro;
		img.index = index;
		if (img.complete) {
			callback.call(img);
			return;
		}
		img.onload = function(){
			callback.call(img);
		};
		img.onerror = function(){
		
		}
	}
	function barLoop(){
		barcount++;
		$(".load_bar").width(barcount*1003/photonum);
		$(".photo_bar #photo_bar_"+this.index+" img").attr("src",this.src);
		if(barcount==photonum){
		
		}
	}
	function showLoop(){
		photocount++;
		$("#photo_bar_"+this.index).removeClass("unready");
		$(".load_photo").width(photocount*1003/photonum);
		$(".load_bar").text("Loading "+photocount+"/"+photonum);
		$(".photo_list #photo_item_"+this.index+" .photo_show").html('<img src="'+this.src+'" alt="'+this.title+'" title="'+this.title+'" />');
		if(photocount==photonum){
			$(".load_show").remove();
		}
		var currentphoto = $(".photo_bar li.active span").text() || photoid;
		if(this.index==currentphoto){
			$("#photo_item_"+this.index).setHeight();
		}
	}
	function errorPage(){
		alert("Error Page!");
		window.location.href="index.html";
	}
});

(function($){
	$.fn.moveBar = function(options) {
		var opts = {
			'defphoto' : 1,
			'photonum' : 0,
			'photowidth' : 85,
			'perphotos' : 10,
			'movespeed' : 1000,
			'prevdiv' : '.leftarrow',
			'nextdiv' : '.rightarrow',
			'prevclass' : 'prevarrow',
			'nextclass' : 'nextarrow',
			'setevent' : 'click'
		};
		return this.each(function() {
			if (options) {
				$.extend( opts, options );
			}
			var skipnumbers = Math.ceil(opts.photonum/opts.perphotos);
			var currentskip = Math.ceil(opts.defphoto/opts.perphotos);
			arrowClass();
			$(this).css("left","-"+opts.photowidth*opts.perphotos*(currentskip-1)+"px");
			var moveobj = $(this);
			$(opts.nextdiv).bind(opts.setevent,function(){
				if(currentskip<skipnumbers){
					moveobj.animate({
						left: "-="+opts.photowidth*opts.perphotos
					}, opts.movespeed);
					currentskip++;
					arrowClass();
				}
			});
			$(opts.prevdiv).bind(opts.setevent,function(){
				if(currentskip>1){
					moveobj.animate({
						left: "+="+opts.photowidth*opts.perphotos
					}, opts.movespeed);
					currentskip--;
					arrowClass();
				}
			});
			function arrowClass(){
				if(currentskip>1){
					$(opts.prevdiv).addClass(opts.prevclass);
				} else {
					$(opts.prevdiv).removeClass(opts.prevclass);
				}
				if(currentskip<skipnumbers){
					$(opts.nextdiv).addClass(opts.nextclass);
				} else {
					$(opts.nextdiv).removeClass(opts.nextclass);
				}
			};
		});
	};
	$.fn.togglePhotos = function(options) {
		var opts = {
			'defphoto' : 1,
			'fadeinspeed' : 400,
			'fadeoutspeed' : 1000,
			'clicktag' : 'li',
			'itemsid' : '#photo_item_',
			'parentdiv' : '.album',
			'activeclass' : 'active',
			'setevent' : 'click'
		};
		return this.each(function() {
			if (options) {
				$.extend( opts, options );
			}
			$(this).find(opts.clicktag).each(function(){
				$(this).bind(opts.setevent,function(){
					var photoindex = $(this).children("span").text();
					var objPhoto = $(this).parents(opts.parentdiv).find(opts.itemsid+photoindex);
					objPhoto.siblings().stop(true,true).fadeOut(opts.fadeinspeed);
					objPhoto.setHeight().stop(true,true).fadeIn(opts.fadeoutspeed);
					$(this).addClass(opts.activeclass).siblings().removeClass(opts.activeclass);
				});
			});
			$(this).find(opts.clicktag+":eq("+(opts.defphoto-1)+")").trigger(opts.setevent);
		});
	};
	$.fn.setHeight = function() {
		return this.each(function() {
			$(this).parent().stop(true,true).animate({height:$(this).height()});
		});
	};
})(jQuery);
