// JavaScript Document
jQuery(function($){

	$.ajax({
		dataType: "json",
		url: "json/album_test.json",
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
				var photoStr = '<ul class="photo_list"></ul>';
				$(".photo_view").html(photoStr);
				for(var i=0; i<photonum; i++){
					if((album.photos[i].thumbnail!="")&&(album.photos[i].url!="")){
						imgLoad(album.photos[i].url, album.photos[i].title, imgLoaded);
					}
				}
		
			}
		}
	});
	function imgLoad(url, title, callback){
		var img = new Image();
		img.src = url;
		img.title = title;
		img.onload = function(){
			callback.call(img);
		};
	}
	function imgLoaded(){
		//alert(this.src);
		$(".photo_list").append('<li><img src="'+this.src+'" style="width: '+this.width+'px; height: '+this.height+'px;" />'+this.title+'</li>');
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
			var skipnumbers = Math.ceil($(this).children().length/opts.perphotos);
			var currentskip = Math.ceil(opts.defphoto/opts.perphotos);
			var photonumbers = skipnumbers*opts.perphotos;
			arrowClass();
			$(this).width(opts.photowidth*photonumbers);
			$(this).css("left","-"+opts.photowidth*opts.perphotos*(currentskip-1)+"px");
			$(this).find(opts.clicktag).each(function(i){
				$(this).bind(opts.setevent,function(){
					/*
					var objPhoto = $(this).parents(opts.parentdiv).find(opts.itemarea).eq(i);
					objPhoto.siblings().stop(true,true).fadeOut(opts.fadeinspeed);
					$(opts.listarea).stop(true,true).animate({height:objPhoto.height()});
					objPhoto.stop(true,true).fadeIn(opts.fadeoutspeed);
					$(this).parent().addClass(opts.activeclass).siblings().removeClass(opts.activeclass);
					*/
				});
			});
			var moveobj = $(this);
			//$(this).find(opts.clicktag+":eq("+(opts.defphoto-1)+")").trigger(opts.setevent);
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
