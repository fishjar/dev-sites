// JavaScript Document
jQuery(function($){
	var kissalbum = {
		server: "picasa",
		photowidth: 960,
		pagewidth: 980
	};
	setWidth(kissalbum.photowidth);
	function setWidth(pwidth){
		kissalbum.pagewidth = pwidth + 20;
		$("#gh_content, #header, #container").width(kissalbum.pagewidth);
		$(".photo_window").width(kissalbum.pagewidth-74);
	}
	
	$(".theme_item a").each(function(i){
		$(this).bind("click",function(){
			$("body").attr("id","theme_"+(i+1));
			$(this).parent().addClass("active").siblings(".theme_item").removeClass("active");
			$.cookie('theme_id', i+1, { expires: 365 });
			return false;
		});
	});
	var themeid = 3;
	var themeck = parseInt($.cookie('theme_id'));
	if((themeck!=null)&&(themeck>0)&&(themeck<5)){
		themeid = themeck;
	}
	$(".theme_item a").eq(themeid-1).trigger("click");
	
	$("noscript").remove();

	$("a, input, select, button, textarea").live("focus",function(){
		$(this).addClass("onfocus");
	}).live("blur",function(){
		$(this).removeClass("onfocus");
	});
	
	$(".a_user").each(function(){
		$(this).bind("focus", function(){
			if ($(this).val() == this.defaultValue){
				$(this).val("");
			};
		}).bind("blur", function(){
			if ($(this).val() == ""){
				$(this).val(this.defaultValue);
			};
		}).bind("keydown",function(e){
			if(e.which==13){
				$(this).next(".a_go").trigger("click");
			}
		});
	});
	$(".a_go").each(function(){
		$(this).bind("click",function(){
			var userdel = $(this).prev(".a_user")[0].defaultValue;
			var serverval = $(this).prev().prev(".a_serve").val();
			var userval = $(this).prev(".a_user").val();
			if (userval==userdel || userval==""){
				alert("请输入帐号！");
			} else {
				window.location.href="index.html?server="+serverval+"&userid="+userval;
			}
		});
	});
	
	var albumcount = 0;
	var photoid = 1;
	var photonum = 1;
	var barcount = 0;
	var photocount = 0;
	var photohash = location.hash.substring(1);
	var userid = "";
	var authorname = "";
	var navStr = "";
	var flickr_api_key = "85e1f9464b6825ee0d17222e8555db86";
	
	var _GET = getArgs();
	if(_GET['server']){
		kissalbum.server = _GET['server'];
	}
	if (_GET['userid']) {
		userid = _GET['userid'];
		$(".home,").hide();
		$("#gh_tips, .theme_album").show();
		if (_GET['albumid']) {
			var photourl = "";
			switch(kissalbum.server) {
				case "flickr":
					setWidth(640);
					photourl = "http://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key="+flickr_api_key+"&photoset_id="+_GET['albumid']+"&format=json&nojsoncallback=1";
					break;
				default:
					photourl = "https://picasaweb.google.com/data/feed/api/user/"+userid+"/albumid/"+_GET['albumid']+"?kind=photo&access=public&alt=json";
			}
			ajaxPhotos(photourl);
		} else {
			var albumurl = "";
			switch(kissalbum.server){
				case "flickr":
					setWidth(640);
					getFlickrID(userid);
					break;
				default:
					albumurl = "https://picasaweb.google.com/data/feed/api/user/"+userid+"?kind=album&access=public&alt=json";
					ajaxAlbums(albumurl);
			}
		}
		$(".theme_album a").bind("click",function(){
			$(".home").slideToggle();
			return false;
		});
	} else {
		$(".album, .album_view, .theme_album").remove();
		$(".home").show();
	}

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

	function ajaxAlbums(albumurl){
		$(".album").remove();
		$(".album_view").show();
		$.ajax({
			url: albumurl,
			dataType: 'json',
			error: function(){
				alert("User Date Error!");
				window.location.href="index.html";
			},
			success: homeDone
		});
	}
	function ajaxPhotos(photourl){
		$(".album_view").remove();
		$(".album").show();
		$.ajax({
			url: photourl,
			dataType: 'json',
			error: function(){
				alert("Album Date Error!");
				window.location.href="index.html";
			},
			success: albumDone
		});
		// $.getJSON(albumurl,"", albumDone).error(function() { alert("Date Error!"); });
	}
	function getFlickrID(username){
		$.ajax({
			url: "http://api.flickr.com/services/rest/?method=flickr.urls.lookupUser&api_key="+flickr_api_key+"&url=http%3A%2F%2Fwww.flickr.com%2Fphotos%2F"+username+"%2F&format=json&nojsoncallback=1",
			dataType: "json",
			error: function(){
				alert("User Date Error!");
				window.location.href="index.html";
			},
			success: function(data){
				var flickID = data.user.id;
				authorname = data.user.username._content;
				albumurl = "http://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key="+flickr_api_key+"&user_id="+flickID+"&format=json&nojsoncallback=1";
				ajaxAlbums(albumurl);
			}
		});		
	}
	function homeDone(album){
		var album_id,album_url,album_title,album_summary,album_num,flickr_sets;
		switch(kissalbum.server) {
			case "flickr":
				album_num = album.photosets.photoset.length;
				break;
			default:
				album_num = album.feed.entry.length;
				authorname = album.feed.author[0].name.$t;
		}
		document.title = authorname+'\'s Photo Album';
		$("#hd_title h1").text(authorname+'\'s Photo Album');
		navStr = ' &gt; '+userid;
		$("#gh_tips p").append(navStr);
		if(album_num>0){
			$(".album_view").append('<ul class="album_list"></ul>');
			for(var i=0; i<album_num; i++){
				switch(kissalbum.server) {
					case "flickr":
						album_id = album.photosets.photoset[i].id;
						album_url = "http://farm"+album.photosets.photoset[i].farm+".static.flickr.com/"+album.photosets.photoset[i].server+"/"+album.photosets.photoset[i].primary+"_"+album.photosets.photoset[i].secret+"_s.jpg";
						album_title = album.photosets.photoset[i].title._content;
						album_summary = album.photosets.photoset[i].description._content;
						break;
					default:
						album_id = album.feed.entry[i].gphoto$id.$t;
						album_url = album.feed.entry[i].media$group.media$thumbnail[0].url;
						album_title = album.feed.entry[i].title.$t;
						album_summary = album.feed.entry[i].summary.$t;
				}
				homeLoad(
					album_id,
					album_url,
					album_title,
					album_summary,
					i+1,
					album_num,
					homeLoop
				);
			}
		}
	}
	function homeLoad(id, url, title, summary, index, num, callback){
		if(index==num){

		}
		var img = new Image();
		img.id = id;
		img.src = url;
		img.title = title;
		img.summary = summary;
		img.num = num;
		if (img.complete) {
			callback.call(img);
			return;
		}
		img.onload = function(){
			callback.call(img);
		};
	}
	
	function homeLoop(){
		albumcount++;
		if(albumcount==1){
			$(".album_view .loading").remove();
		}
		var albumStr = "";
		albumStr += '<li class="album_item">';
		switch(kissalbum.server) {
			case "flickr":
				albumStr += '<a href="index.html?server=flickr&userid='+userid+'&albumid='+this.id+'" title="'+this.summary+'">';
				break;
			default:
				albumStr += '<a href="index.html?server=picasa&userid='+userid+'&albumid='+this.id+'" title="'+this.summary+'">';
		}
		albumStr += '<img src="'+this.src+'" alt="'+this.summary+'" />';
		if(this.title!=""){
			albumStr += '<span>'+this.title+'</span>';
		}
		albumStr += '</a>';
		albumStr += '</li>';
		$(".album_view .album_list").append(albumStr);
		if(albumcount==this.num){
			//$(".album_view .album_list").listHeight();
		}
	}
	
	function albumDone(album){
		switch(kissalbum.server) {
			case "flickr":
				authorname = album.photoset.ownername;
				document.title = authorname+'\'s Photo Album';
				$("#hd_title h1").text(authorname+'\'s Photo Album');
				addFlickrTitles(album.photoset.id,authorname);
				photonum = album.photoset.photo.length;
				if(photonum>0){
					$(".photo_window").html('<ul class="photo_bar"></ul>').children(".photo_bar").width(83*photonum);
					$(".photo_view").append('<a class="photo_prev" href="#" title="上一张 快捷键:[&quot;H&quot;]或者[&quot;&larr;&quot;]" hidefocus="true"></a><a class="photo_next" href="#" title="下一张 快捷键:[&quot;L&quot;]或者[&quot;&rarr;&quot;]" hidefocus="true"></a><ul class="photo_list"></ul>');
					for(var i=0; i<photonum; i++){
						var photoidstr = album.photoset.photo[i].id;
						if(photohash==photoidstr){
							photoid = i+1;
						}
						barLoad(
							"http://farm"+album.photoset.photo[i].farm+".static.flickr.com/"+album.photoset.photo[i].server+"/"+album.photoset.photo[i].id+"_"+album.photoset.photo[i].secret+"_s.jpg",
							album.photoset.photo[i].title,
							i+1,
							photoidstr,
							barLoop
						);
						/* var photoExif = new Array();
						$.ajax({
							url: "http://api.flickr.com/services/rest/?method=flickr.photos.getExif&api_key="+flickr_api_key+"&photo_id="+album.photoset.photo[i].id+"&format=json&nojsoncallback=1",
							dataType: "json",
							error: function(){},
							success: function(data){
								for(j in data.photo.exif){
									if(data.photo.exif[j].tag == "Model"){
										photoExif.push(data.photo.exif[j].raw._content);
									}
									if(data.photo.exif[j].tag == "ExposureTime"){
										photoExif.push(data.photo.exif[j].raw._content);
									}
									if(data.photo.exif[j].tag == "FNumber"){
										photoExif.push(data.photo.exif[j].raw._content);
									}
									if(data.photo.exif[j].tag == "DateTimeOriginal"){
										photoExif.push(data.photo.exif[j].raw._content);
									}
								}
								$(".photo_list > li").eq(i).find(".photo_intro").prepend(photoExif.join(", "));
							}
						}); */
						showLoad(
							"http://farm"+album.photoset.photo[i].farm+".static.flickr.com/"+album.photoset.photo[i].server+"/"+album.photoset.photo[i].id+"_"+album.photoset.photo[i].secret+"_z.jpg",
							album.photoset.photo[i].title,
							'',
							i+1,
							null,
							"auto",
							"auto",
							showLoop
						);
					}
				}
				break;
			default:
				authorname = album.feed.author[0].name.$t;
				document.title = authorname+'\'s Photo Album';
				$("#hd_title h1").text(authorname+'\'s Photo Album');
				if(album.feed.title.$t!=""){
					navStr = ' &gt; <a href="index.html?userid='+userid+'" title="'+authorname+'\'s Album">'+userid+'</a> &gt; '+album.feed.title.$t;
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
		}
	}
	function addFlickrTitles(flickrSerID,authorname){
		$.ajax({
			url: "http://api.flickr.com/services/rest/?method=flickr.photosets.getInfo&api_key="+flickr_api_key+"&photoset_id="+flickrSerID+"&format=json&nojsoncallback=1",
			dataType: "json",
			error: function(){},
			success: function(data){
				if(data.photoset.title._content!=""){
					navStr = ' &gt; <a href="index.html?server=flickr&userid='+userid+'" title="'+authorname+'\'s Album">'+userid+'</a> &gt; '+data.photoset.title._content;
					var titleStr = '<h2>'+data.photoset.title._content+'</h2>';
					$("#gh_tips p").append(navStr);
					$(".album").prepend(titleStr);
				}
				if(data.photoset.description._content!=""){
					$(".album_intro").html('<p>'+data.photoset.description._content+'</p>');
				}
			}
		});
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
		if(exif!=null){
			showStr += '<p>'+exif.join(", ")+'</p>';
		}
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

(function($){
	$.fn.listHeight = function() {
		return this.each(function() {
			var itemheight = 0;
			$(this).children().each(function(){
				itemheight = $(this).height()>itemheight?$(this).height():itemheight;
			});
			$(this).children().height(itemheight);
		});
	};
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


