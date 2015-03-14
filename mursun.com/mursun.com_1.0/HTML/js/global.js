/* global js */
var mursun = window.mursun || {};
mursun.cnsite = {
	ready: function(){
		_cnsite = this;
		for(init in _cnsite.inits){
			if($(init)[0]){
				_cnsite.inits[init]($(init));
			}
		}
	},
	inits: {
		'body': function($obj){
			
		},
		'.search': function($obj){
			$obj.find('.search-field').setDefValue();
		},
		'.hslide': function($obj){
			$obj.slides({
				container: 'hslide-ul',
				play: 5000,
				pause: 2000,
				hoverPause: true
			});
		},
		'.catdownbtn': function($obj){
			$obj.fadeIn(function(){
				$(this).click(function(){
					$(this).siblings('.popcatdown').showPopup();
					return false;
				});
			});
		},
		'.folio-img': function($obj){
			$obj.find('.folio-imgm a').click(function(){
				var $this = $(this);
				var $imgObj = $this.parents('.folio-img').find('.folio-imgs img');
				var imgUrl = $this.attr('href');
				if(!$this.hasClass('active')){
					$imgObj.hide();
					mursun.cnsite.libs.loadImg(imgUrl,showFolioImg);
				}
				function showFolioImg(){
					$imgObj.attr('src',imgUrl).fadeIn();
					$this.addClass('active').siblings().removeClass('active');
				}
				return false;
			});
		}
	},
	libs: {
		loadImg: function(url, callback){
			var img = new Image();
			img.src = url;
			if (img.complete) {
				callback.call(img);
			} else {
				img.onload = function(){
					callback.call(img);
				};
			}
		}
	}
};
(function($){
	$.fn.setDefValue = function() {
		return this.each(function() {
			$(this).bind("focus", function(){
				if ($(this).val() == this.defaultValue){
					$(this).val("");
				};
			}).bind("blur", function(){
				if ($(this).val() == ""){
					$(this).val(this.defaultValue);
				};
			});
		});
	};
	$.fn.extend({
		slideRight: function() {
			return this.each(function() {
				$(this).animate({width: 'show'});
			});
		},
		slideLeft: function() {
			return this.each(function() {
				$(this).animate({width: 'hide'});
			});
		},
		slideToggleWidth: function() {
			return this.each(function() {
				var el = $(this);
				if (el.css('display') == 'none') {
					el.slideRight();
				} else {
					el.slideLeft();
				}
			});
		}
	});
	$.fn.setCenter = function() {
		return this.each(function() {
			var top = ($(window).height() - $(this).height())/2;
			var left = ($(window).width() - $(this).width())/2;
			$(this).css({top: top>0 ? top : 0, left: left});
		});
	};
	$.fn.showPopup = function() {
		return this.each(function() {
			$('.popbg').fadeTo('normal',0.5).bind('click',function(){
				$(this).hidePopup();
				return false;
			});
			$('.pop').fadeIn().setCenter().find('.popclose').bind('click',function(){
				$(this).hidePopup();
				return false;
			});
		});
	};
	$.fn.hidePopup = function() {
		return this.each(function() {
			$('.popbg, .pop').fadeOut();
		});
	};
})(jQuery);
$(document).ready(function(){
	mursun.cnsite.ready();
});