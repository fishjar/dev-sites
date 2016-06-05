// JavaScript Document
jQuery(function($){
	$("#container").width(kissalbum.pagewidth+20);
	
	$.ajax({
		dataType: "json",
		url: "json/album.js",
		error: function(){
			alert("Data error!");
		},
		success: function(album){
			var albumnum = album.length;
			if(albumnum>0){
				$(".album_view").append('<ul class="album_list"></ul>');
				for(var i=0; i<albumnum; i++){
					homeLoad(album[i].id, album[i].thumbnail, album[i].title, i+1, albumnum, homeLoop);
				}
			}
		}
	});
	
	function homeLoad(id, url, title, index, num, callback){
		if(index==num){

		}
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
		if(albumcount==1){
			$(".album_view .loading").remove();
		}
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
			//$(".album_view .album_list").listHeight();
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
