//Jisun JS
jQuery(function($){
	$(".searchfield").bind("focus", function(){
		if ($(this).val() == this.defaultValue){
			$(this).val("");
		};
	}).bind("blur", function(){
		if ($(this).val() == ""){
			$(this).val(this.defaultValue);
		};
	});
	$("input.searchfield, #commentform input, #commentform textarea").each(function(){
		$(this).focus(function(){
			$(this).addClass("active");
		}).blur(function(){
			$(this).removeClass("active");
		}).hover(
			function(){
				$(this).addClass("hover");
			},
			function(){
				$(this).removeClass("hover");
			}
		);
	});
	$("#submit").hover(
		function(){
			$(this).triggerHandler("focus");
		},
		function(){
			$(this).triggerHandler("blur");
		}
	);
	$(".btn-go-bottom").toggle(
		function(){
			$(this).html('&uArr;').attr("href","#header");
			$("html, body").animate({
				scrollTop: $("#footer").offset().top
			}, 1000);
			return false;
		},
		function(){
			$(this).html('&dArr;').attr("href","#footer");
			$("html, body").animate({
				scrollTop: $("#header").offset().top
			}, 1000);
			return false;
		}
	);
	$("#sider-btns ul").append('<li><a href="#" class="btn-hide-siderbar" title="Toggle siderbar">&rArr;</a></li>');
	$(".btn-hide-siderbar").toggle(
		function(){
			$(this).html('&lArr;');
			$("#sider").slideLeft();
			return false;
		},
		function(){
			$(this).html('&rArr;');
			$("#sider").slideRight();
			return false;
		}
	);
	var tStart = 0;
	function loadTwitter(index,nums){
		tStart += nums;
		$.ajax({
			type: "GET",
			url: 'https://friendfeed-api.com/v2/feed/fishjar?pretty=1&start='+index+'&num='+nums,
			dataType: 'jsonp',
			success: getTwitter
		});
	}
	function getTwitter(twitter){
		$(".twitter_loading").remove();
		if($("#sider .sider_top .twitter-list").length<1){
			$("#sider .sider_top").append('<div class="box"><h3>Recently Twitters</h3><ul class="twitter-list"></ul><p class="link-more link-more-twitter"><a href="http://twitter.com/fishjar" title="More Twitters" target="_blank">More Twitters ...</a></p></div>');
		}
		var tnum = twitter.entries.length;
		for(var i=0;i<tnum;i++){
			var thtml = '<li>'+twitter.entries[i].body+' <small>[ <a href="'+twitter.entries[i].url.replace(/http/, "https")+'" target="_blank">'+twitter.entries[i].date.replace(/T/, " ").replace(/Z/, "")+'</a> via <a href="'+twitter.entries[i].via.url+'" target="_blank">'+twitter.entries[i].via.name+'</a> ]</small></li>';
			$(".twitter-list").append(thtml);
		}
		showSiderTop();
	}
	loadTwitter(0,3);
	$(".link-more-twitter a").live("click",function(){
		if(tStart<40){
			$(this).parent().before('<p class="twitter_loading"><img src="http://www.fishjar.com/images/ico-loading-2.gif" alt="loading..." /></p>');
			loadTwitter(tStart,5);
			return false;
		}
	});
	
	$.ajax({
		type: "GET",
		url: 'https://picasaweb.google.com/data/feed/api/user/gabyblog?kind=album&access=public&alt=json',
		dataType: 'jsonp',
		success: getAlbum
	});
	$.ajax({
		type: "GET",
		url: "https://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=fishjar&api_key=a1a0961431a4f357ae7d328a5b61a822&format=json&limit=15",
		dataType: "jsonp",
		success: getArtist
	});
	$.ajax({
		type: "GET",
		url: "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=fishjar&api_key=a1a0961431a4f357ae7d328a5b61a822&format=json&limit=10",
		dataType: "jsonp",
		success: getMusic
	});
	function getAlbum(album){
		$("#sider .sider_right").prepend('<div class="box"><h3>My Photos</h3><ul class="album-list thumbnail-list"></ul><p class="link-more"><a href="http://www.fishjar.com/album/" title="More Photos" target="_blank">More...</a></p></div>');
		var anum = album.feed.entry.length;
		for(var i=0;i<anum;i++){
			var ahtml = '<li><a href="http://www.fishjar.com/album/album.html?albumid=' + album.feed.entry[i].gphoto$id.$t + '" title="' + album.feed.entry[i].title.$t + '" target="_blank"><img src="' + album.feed.entry[i].media$group.media$thumbnail[0].url.replace(/\/s160-c\//, "\/s56-c\/") + '" alt="' + album.feed.entry[i].title.$t + '" /></a></li>';
			$(".album-list").append(ahtml);
		}
		showSider();
	}
	function getArtist(artist){
		$("#sider .sider_right").append('<div class="box"><h3>Favorite Singers</h3><ul class="artist-list thumbnail-list"></ul><p class="link-more"><a href="http://www.last.fm/user/fishjar" title="More Singers" target="_blank">More...</a></p></div>');
		var snum = artist.topartists.artist.length;
		for(var i=0;i<snum;i++){
			var shtml = '<li><a href="' + artist.topartists.artist[i].url + '" title="' + artist.topartists.artist[i].name + '" target="_blank"><img src="' + artist.topartists.artist[i].image[1]['#text'].replace(/\/64\//, "\/64s\/") + '" alt="' + artist.topartists.artist[i].name + '" /></a></li>';
			$(".artist-list").append(shtml);
		}
		showSider();
	}
	function getMusic(music){
		$("#sider .sider_right").append('<div class="box"><h3>Recently Musics</h3><ul class="track-list"></ul><p class="link-more"><a href="http://www.last.fm/user/fishjar" title="More Musics" target="_blank">More...</a></p></div>');
		var mnum = music.recenttracks.track.length;
		for(var i=0;i<mnum;i++){
			var mhtml = '<li class="clearfix track_'+i+'"><a href="' + music.recenttracks.track[i].url + '" class="track-img" title="' + music.recenttracks.track[i].name + ' - ' + music.recenttracks.track[i].artist['#text'] + '" target="_blank"><img src="http://www.fishjar.com/blog/wp-content/themes/fishjar2.3.1/images/default_artist_small.png" alt="' + music.recenttracks.track[i].name + ' - ' + music.recenttracks.track[i].artist['#text'] + '" /></a><p class="track-name"><a href="' + music.recenttracks.track[i].url + '" title="' + music.recenttracks.track[i].name + ' - ' + music.recenttracks.track[i].artist['#text'] + '" target="_blank">' +music.recenttracks.track[i].name + '</a> - ' + music.recenttracks.track[i].artist['#text'] + '</p></li>';
			$(".track-list").append(mhtml);
			var iurl = music.recenttracks.track[i].image[0]['#text'];
			if(iurl){
				loadImg(iurl,i,showImg);
			} else if (music.recenttracks.track[i].artist['#text']){
				tryImg(i,music.recenttracks.track[i].artist['#text']);
			}
		}
		showSider();
	}
	function tryImg(inum,astr){
		$.ajax({
			type: "GET",
			url: "https://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=" + astr + "&api_key=a1a0961431a4f357ae7d328a5b61a822&format=json",
			dataType: "jsonp",
			success: function(ainfo){
				var aiurl = ainfo.artist.image[0]['#text'];
				if(aiurl){
					loadImg(aiurl.replace(/\/34\//, "\/34s\/"),inum,showImg);
				}
			}
		});
	}
	function loadImg(url,num,callback){
		var img = new Image();
		img.src = url;
		img.index = num;
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
	function showImg(){
		$(".track-list .track_"+this.index+" .track-img img").attr("src",this.src);
	}
	function showSiderTop(){
		if($(".sider_top").css("display")=="none"){
			$(".sider_top").slideDown();
		}
	}
	function showSider(){
		if ($(".sider_right .box").length>0) {
			var winW = $(window).width();
			if ( winW>800 ) {
				$("#sider").stop(true,true).animate({width: 420},"normal",function(){
					if($(".sider_right").css("display")=="none"){
						$(".sider_right").slideRight();
					}
				});
			} else {
				$("#sider").stop(true,true).animate({width: 210},"normal",function(){
					if(($(".sider_right").css("display")=="none") && ($(".sider_right .box").length>0)){
						$(".sider_right").slideRight();
					}
				});
			}
		}
	}
	$(window).resize(function(){
		showSider();
	});
});

jQuery.fn.extend({
	slideRight: function() {
		return this.each(function() {
			jQuery(this).animate({width: 'show'});
		});
	},
	slideLeft: function() {
		return this.each(function() {
			jQuery(this).animate({width: 'hide'});
		});
	},
	slideToggleWidth: function() {
		return this.each(function() {
			var el = jQuery(this);
			if (el.css('display') == 'none') {
				el.slideRight();
			} else {
				el.slideLeft();
			}
		});
	}
});