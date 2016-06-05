// JavaScript Document
jQuery(function($){
	$("#container").width(kissalbum.pagewidth);
	$(".photo_window").width(kissalbum.pagewidth-74);
	
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
	var photonum = 1;
	var barcount = 0;
	var photocount = 0;
	var photohash = location.hash.substring(1);
	if (_GET['albumid']) {
		/*
		$.ajax({
			dataType: "json",
			url: "https://picasaweb.google.com/data/feed/api/user/"+kissalbum.picasaid+"/albumid/"+_GET['albumid']+"?kind=photo&access=public&alt=json",
			error: function(){
				errorPage();
			},
			success: function(album){
				if(album.feed.title.$t!=""){
					var navStr = ' &gt; '+album.feed.title.$t;
					var titleStr = '<h2>'+album.feed.title.$t+'</h2>';
					$("#gh_tips p").append(navStr);
					$(".album").prepend(titleStr);
				}
				if(album.feed.subtitle.$t!=""){
					$(".album_intro").html('<p>'+album.feed.subtitle.$t+'</p>');
				}
				photonum = album.feed.entry.length;
				if(photoid<1||photoid>photonum){
					photoid = 1;
				}
				if(photonum>0){
					$(".photo_window").html('<ul class="photo_bar"></ul>').children(".photo_bar").width(83*photonum);
					$(".photo_view").append('<ul class="photo_list"></ul>');
					for(var i=0; i<photonum; i++){
						barLoad(
							album.feed.entry[i].media$group.media$thumbnail[0].url.replace(/\/s72\//, "\/s74-c\/"),
							album.feed.entry[i].summary.$t,
							i+1,
							barLoop
						);
						var photoExif = getExif(album.feed.entry[i].exif$tags);
						showLoad(
							album.feed.entry[i].media$group.media$thumbnail[0].url.replace(/\/s72\//, "/s"+kissalbum.photowidth+"/"),
							album.feed.entry[i].summary.$t,
							'',
							i+1,
							photoExif,
							showLoop
						);
					}
					
				}
			}
		});
		*/
		var albumurl = "https://picasaweb.google.com/data/feed/api/user/"+kissalbum.picasaid+"/albumid/"+_GET['albumid']+"?kind=photo&access=public&alt=json";
		$.getJSON(albumurl, 'callback=?', function(album){
			if(album.feed.title.$t!=""){
				var navStr = ' &gt; '+album.feed.title.$t;
				var titleStr = '<h2>'+album.feed.title.$t+'</h2>';
				$("#gh_tips p").append(navStr);
				$(".album").prepend(titleStr);
			}
			if(album.feed.subtitle.$t!=""){
				$(".album_intro").html('<p>'+album.feed.subtitle.$t+'</p>');
			}
			photonum = album.feed.entry.length;
			if(photonum>0){
				$(".photo_window").html('<ul class="photo_bar"></ul>').children(".photo_bar").width(83*photonum);
				$(".photo_view").append('<a class="photo_prev" href="#" title="上一张 快捷键:[&quot;H&quot;]或者[&quot;&larr;&quot;]" hidefocus="true"></a><a class="photo_next" href="#" title="下一张 快捷键:[&quot;L&quot;]或者[&quot;&rarr;&quot;]" hidefocus="true"></a><ul class="photo_list"></ul>');
				for(var i=0; i<photonum; i++){
					var photoidstr = album.feed.entry[i].gphoto$id.$t;
					if(photohash==photoidstr){
						photoid = i+1;
					}
					barLoad(
						album.feed.entry[i].media$group.media$thumbnail[0].url.replace(/\/s72\//, "\/s74-c\/"),
						album.feed.entry[i].summary.$t,
						i+1,
						photoidstr,
						barLoop
					);
					var photoExif = getExif(album.feed.entry[i].exif$tags);
					showLoad(
						album.feed.entry[i].media$group.media$thumbnail[0].url.replace(/\/s72\//, "/s"+kissalbum.photowidth+"/"),
						album.feed.entry[i].summary.$t,
						'',
						i+1,
						photoExif,
						album.feed.entry[i].media$group.media$content[0].width,
						album.feed.entry[i].media$group.media$content[0].height,
						showLoop
					);
				}
			}
		});
	} else {
		errorPage();
	}
	function getExif(exiftags){
		var photoExif = new Array();
		if(exiftags.exif$model){
			photoExif.push(exiftags.exif$model.$t);
		}
		if(exiftags.exif$fstop){
			photoExif.push('F\/'+exiftags.exif$fstop.$t);
		}
		if(exiftags.exif$exposure){
			var photoExposure = parseFloat(exiftags.exif$exposure.$t);
			if(photoExposure<1){
				photoExposure = '1\/'+Math.round(1/photoExposure);
			}
			photoExif.push(photoExposure+'s');
		}
		if(exiftags.exif$focallength){
			photoExif.push(Math.round(exiftags.exif$focallength.$t)+'mm');
		}
		if(exiftags.exif$iso){
			photoExif.push('ISO'+exiftags.exif$iso.$t);
		}
		if(exiftags.exif$flash){
			if(exiftags.exif$flash.$t=='true'){
				photoExif.push('Flash');
			}
		}
		if(exiftags.exif$time){
			var photoTime = new Date();
			photoTime.setTime(parseInt(exiftags.exif$time.$t)-8*60*60*1000);
			photoExif.push(photoTime.toString());
		}
		return photoExif;
	}
	function barLoad(url, title, index, id, callback){
		$(".photo_bar").append('<li id="photo_bar_'+index+'"><a href="#'+id+'" title="'+title+'" class="unready" hidefocus="true"><img src="images/loading_img_0.gif" alt="'+title+'" /><span>'+index+'</span></a></li>');
		if(index==photonum){
			$(".photo_view").prev(".loading").remove();
			$(".photo_preview").show().after('<div class="load_show"><div class="load_bar">loading</div><div class="load_photo"></div></div>');
			$(".photo_bar").togglePhotos({
				defphoto: photoid,
				photonum: photonum,
				perphotos: Math.floor((kissalbum.pagewidth-67)/83)-1
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
	function showLoad(url, title, intro, index, exif, width, height, callback){
		var showStr = "";
		showStr += '<li class="photo_item" style="width: '+kissalbum.pagewidth+'px;" id="photo_item_'+index+'">';
		showStr += '<div class="photo_show"><div class="loading">No: '+index+'</div></div>';
		showStr += '<div class="photo_intro">';
		showStr += '<p>'+exif.join(", ")+'</p>';
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
		img.width = width;
		img.height = height;
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
		$(".load_bar").width(barcount*kissalbum.pagewidth/photonum);
		$(".photo_bar #photo_bar_"+this.index+" img").attr("src",this.src);
		if(barcount==photonum){
		
		}
	}
	function showLoop(){
		photocount++;
		$("#photo_bar_"+this.index+" a").removeClass("unready");
		$(".load_photo").width(photocount*kissalbum.pagewidth/photonum);
		$(".load_bar").text("Loading "+photocount+"/"+photonum);
		$(".photo_list #photo_item_"+this.index+" .photo_show").html('<img src="'+this.src+'" alt="'+this.title+'" title="'+this.title+'" />');
		if(photocount==photonum){
			$(".load_show").remove();
		}
		var currentphoto = $(".photo_bar li a.active span").text() || photoid;
		if(this.index==currentphoto){
			$("#photo_item_"+this.index).setHeight();
		}
	}
	function errorPage(){
		alert("Error Page!");
		window.location.href="index.html";
	}
	document.onkeydown = function(e){
		var e = (e || window.event);
		if(e.ctrlKey){
			switch(e.keyCode) {
				case 37:	//ctrl+left
					$(".leftarrow").trigger("click");
					break;
				case 39:	//ctrl+right
					$(".rightarrow").trigger("click");
					break;
				case 38:	//ctrl+up
					$(".photo_bar li a:first").trigger("click");
					break;
				case 40:	//ctrl+down
					$(".photo_bar li a:last").trigger("click");
					break;
			}
		} else {
			switch(e.keyCode) {
				case 37:	//left
				case 72:	//h
					$(".photo_prev").trigger("click");
					break;
				case 39:	//right
				case 76:	//l
					$(".photo_next").trigger("click");
					break;
				case 74:	//j
					$(".rightarrow").trigger("click");
					break;
				case 75:	//k
					$(".leftarrow").trigger("click");
					break;
			}
		}
	};
});

(function($){
	$.fn.togglePhotos = function(options) {
		var opts = {
			'defphoto' : 1,
			'photonum' : 0,
			'photowidth' : 83,
			'perphotos' : 10,
			'movespeed' : 1000,
			'prevbtn' : '.leftarrow',
			'nextbtn' : '.rightarrow',
			'prevclass' : 'prevarrow',
			'nextclass' : 'nextarrow',
			'prevdiv' : '.photo_prev',
			'nextdiv' : '.photo_next',
			'fadeinspeed' : 400,
			'fadeoutspeed' : 1000,
			'clicktag' : 'li a',
			'itemsid' : '#photo_item_',
			'parentdiv' : '.album',
			'activeclass' : 'active',
			'setevent' : 'click'
		};
		return this.each(function() {
			if (options) {
				$.extend( opts, options );
			}
			var photoindex = opts.defphoto;
			var skipnumbers = Math.ceil(opts.photonum/opts.perphotos);
			var currentskip = getSkip(opts.defphoto);
			arrowClass();
			$(this).css("left","-"+opts.photowidth*opts.perphotos*(currentskip-1)+"px");
			var moveobj = $(this);
			$(opts.nextbtn).bind(opts.setevent,function(){
				if(currentskip<skipnumbers){
					moveBar(currentskip+1);
				}
				return false;
			});
			$(opts.prevbtn).bind(opts.setevent,function(){
				if(currentskip>1){
					moveBar(currentskip-1);
				}
				return false;
			});
			$(opts.nextdiv).bind(opts.setevent,function(){
				if(photoindex<opts.photonum){
					moveobj.find(opts.clicktag+":eq("+photoindex+")").trigger(opts.setevent);
				}
			});
			$(opts.prevdiv).bind(opts.setevent,function(){
				if(photoindex>1){
					moveobj.find(opts.clicktag+":eq("+(photoindex-2)+")").trigger(opts.setevent);
				}
			});
			function moveBar(i){
				moveobj.stop(true,true).animate({
					left: -(i-1)*opts.photowidth*opts.perphotos
				}, opts.movespeed);
				currentskip = i;
				arrowClass();
			}
			function arrowClass(){
				if(currentskip>1){
					$(opts.prevbtn).addClass(opts.prevclass);
				} else {
					$(opts.prevbtn).removeClass(opts.prevclass);
				}
				if(currentskip<skipnumbers){
					$(opts.nextbtn).addClass(opts.nextclass);
				} else {
					$(opts.nextbtn).removeClass(opts.nextclass);
				}
			};
			function getSkip(i){
				return Math.ceil(i/opts.perphotos);
			}
			$(this).find(opts.clicktag).each(function(){
				$(this).bind(opts.setevent,function(){
					var obj = $(this);
					photoindex = $(this).children("span").text();
					var skipnum = getSkip(photoindex);
					if(skipnum!=currentskip){
						moveBar(skipnum);
					}
					var objPhoto = $(this).parents(opts.parentdiv).find(opts.itemsid+photoindex);
					objPhoto.siblings().stop(true,true).fadeOut(opts.fadeinspeed);
					objPhoto.stop(true,true).fadeIn(opts.fadeoutspeed).setHeight();
					if(photoindex>1){
						$(opts.prevdiv).show("fast",function(){
							var preid = obj.parent().prev().children().attr("href");
							$(this).attr("href",preid);
						});
					} else {
						$(opts.prevdiv).hide();
					}
					if(photoindex<opts.photonum){
						$(opts.nextdiv).show("fast",function(){
							var nextid = obj.parent().next().children().attr("href");
							$(this).attr("href",nextid);
						});
					} else {
						$(opts.nextdiv).hide();
					}
					$(this).addClass(opts.activeclass).parent().siblings().children().removeClass(opts.activeclass);
				});
			});
			$(this).find(opts.clicktag+":eq("+(opts.defphoto-1)+")").trigger(opts.setevent);
		});
	};
	$.fn.setHeight = function() {
		return this.each(function() {
			var obj = $(this);
			$(this).parent().stop(true,true).animate({height:obj.height()});
			$(".photo_prev, .photo_next").height(obj.find(".photo_show").height());
		});
	};
})(jQuery);
