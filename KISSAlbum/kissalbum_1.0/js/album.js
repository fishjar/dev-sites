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
	if (_GET['albumid']) {
		$.ajax({
			dataType: "json",
			url: "json/album_"+_GET['albumid']+".json",
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
				var photonum = album.photos.length;
				if(photonum>0){
					$(".photo_window").html('<ul class="photo_bar"></ul>').children(".photo_bar").width(85*photonum);;
					$(".photo_view").prepend('<div class="photo_load">数据载入中。。。请稍候。。。</div>').append('<ul class="photo_list"></ul>');
					for(var i=0; i<photonum; i++){
						barLoad(album.photos[i].thumbnail, album.photos[i].title, i+1, photonum, barLoop);
						showLoad(album.photos[i].url, album.photos[i].title, album.photos[i].intro, i+1, photonum, showLoop);
					}
					
				}
			}
		});
	} else {
		errorPage();
	}
	function barLoad(url, title, index, num, callback){
		$(".photo_bar").append('<li id="photo_bar_'+index+'"></li>');
		var img = new Image();
		img.src = url;
		img.title = title;
		img.index = index;
		img.num = num;
		if (img.complete) {
			callback.call(img);
			return;
		}
		img.onload = function(){
			callback.call(img);
		};
	}
	function showLoad(url, title, intro, index, num, callback){
		$(".photo_list").append('<li class="photo_item" id="photo_item_'+index+'"></li>');
		var img = new Image();
		img.src = url;
		img.title = title;
		img.intro = intro;
		img.index = index;
		img.num = num;
		if (img.complete) {
			callback.call(img);
			return;
		}
		img.onload = function(){
			callback.call(img);
		};
	}
	var barcount = 0;
	function barLoop(){
		barcount++;
		$(".photo_bar #photo_bar_"+this.index).append('<img src="'+this.src+'" alt="'+this.title+'" title="'+this.title+'" /><span>'+this.index+'</span>');
		if(barcount==this.num){
			$(".photo_preview").show();
		}
	}
	var photoid = 1;
	if(_GET['photoid']){
		photoid = parseInt(_GET['photoid']);
	}
	var photocount = 0;
	function showLoop(){
		photocount++;
		var showStr = "";
		showStr += '<div class="photo_show"><img src="'+this.src+'" alt="'+this.title+'" title="'+this.title+'" style="width: '+this.width+'px; height: '+this.height+'px;" /></div>';
		showStr += '<div class="photo_intro">';
		if(this.title!=""){
			showStr += '<h3>'+this.title+'</h3>';
		}
		showStr += this.intro;
		showStr += '</div>';
		$(".photo_list #photo_item_"+this.index).append(showStr);
		$(".photo_load").text('图片载入中。。。已载入'+photocount+'张/共'+this.num+'张');
		if(photocount==this.num){
			if(photoid<1||photoid>this.num){
				photoid = 1;
			}
			$(".photo_load").remove();
			$(".photo_bar").togglePhotos({
				defphoto: photoid,
				photonum: this.num
			});
		}
	}
	function errorPage(){
		alert("Error Page!");
		window.location.href="index.html";
	}
	//$(".photo_bar").togglePhotos();
});

(function($){
	$.fn.togglePhotos = function(options) {
		var opts = {
			'defphoto' : 1,
			'photonum' : 0,
			'photowidth' : 85,
			'perphotos' : 10,
			'fadeinspeed' : 200,
			'fadeoutspeed' : 500,
			'movespeed' : 1000,
			'clicktag' : 'img',
			'listarea' : '.photo_list',
			'itemarea' : '.photo_item',
			'parentdiv' : '.album',
			'prevdiv' : '.leftarrow',
			'nextdiv' : '.rightarrow',
			'prevclass' : 'prevarrow',
			'nextclass' : 'nextarrow',
			'activeclass' : 'active',
			'setevent' : 'click'
		};
		return this.each(function() {
			if (options) {
				$.extend( opts, options );
			}
			var skipnumbers = Math.ceil(opts.photonum/opts.perphotos);
			var currentskip = Math.ceil(opts.defphoto/opts.perphotos);
			var photonumbers = skipnumbers*opts.perphotos;
			arrowClass();
			$(this).css("left","-"+opts.photowidth*opts.perphotos*(currentskip-1)+"px");
			$(this).find(opts.clicktag).each(function(){
				$(this).bind(opts.setevent,function(){
					var photoindex = $(this).siblings("span").text();
					var objPhoto = $(this).parents(opts.parentdiv).find("#photo_item_"+photoindex);
					objPhoto.siblings().stop(true,true).fadeOut(opts.fadeinspeed);
					$(opts.listarea).stop(true,true).animate({height:objPhoto.height()});
					objPhoto.stop(true,true).fadeIn(opts.fadeoutspeed);
					$(this).parent().addClass(opts.activeclass).siblings().removeClass(opts.activeclass);
				});
			});
			var moveobj = $(this);
			$(this).find(opts.clicktag+":eq("+(opts.defphoto-1)+")").trigger(opts.setevent);
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
})(jQuery);
