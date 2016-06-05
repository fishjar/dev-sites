// JavaScript Document
jQuery(function($){
	$.ajax({
		dataType: "json",
		url: "json/album.json",
		error: function(){
			alert("Data error!");
		},
		success: function(album){
			var albumnum = album.length;
			if(albumnum>0){
				$(".album_view").prepend('<div class="photo_load">数据载入中。。。请稍候。。。</div>').append('<ul class="album_list clearfix"></ul>');
				for(var i=0; i<albumnum; i++){
					homeLoad(album[i].id, album[i].thumbnail, album[i].title, albumnum, homeLoop);
				}
			}
		}
	});
	function homeLoad(id, url, title, num, callback){
		var img = new Image();
		img.id = id;
		img.src = url;
		img.title = title;
		img.num = num;
		if (img.complete) {
			callback.call(img);
			return;
		}
		img.onload = function(){
			callback.call(img);
		};
	}
	var albumcount = 0;
	function homeLoop(){
		albumcount++;
		var albumStr = "";
		albumStr += '<li class="album_item">';
		albumStr += '<a href="album.html?albumid='+this.id+'" title="'+this.title+'">';
		albumStr += '<img src="'+this.src+'" alt="'+this.title+'" />';
		if(this.title!=""){
			albumStr += '<span>'+this.title+'</span>';
		}
		albumStr += '</a>';
		albumStr += '</li>';
		$(".album_view .album_list").append(albumStr);
		if(albumcount==this.num){
			$(".photo_load").remove();
			$(".album_view .album_list").listHeight();
		}
	}
});

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
})(jQuery);
