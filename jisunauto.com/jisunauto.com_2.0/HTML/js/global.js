/* global js */
var jisun = window.jisun || {};
jisun.cnsite = {
	ready: function() {
		_cnsite = this;
		for(init in _cnsite.inits) {
			if($(init)[0]) {
				_cnsite.inits[init]($(init));
			}
		}
	},
	inits: {
		'body': function($obj) {

		},
		'.search': function($obj) {
			$obj.find('.search-field').setDefValue();
		},
		'.hslide': function($obj) {
			$obj.slides({
				container: 'hscont',
				play: 3000,
				pause: 1000,
				hoverPause: true,
				paginationClass: 'hspagin'
			});
		},
		'.hboxs': function($obj) {
			$obj.find('.hbox a').mouseover(function() {
				var $o = $(this);
				var $op = $o.parent();
				if(!$op.hasClass('hboxactive')) {
					$op.fadeOut('fast', function() {
						$(this).addClass('hboxactive').fadeIn('slow').siblings().removeClass('hboxactive');
					});
				}
			});
		},
		'.snu1': function($obj) {
			$obj.find('.snu2').each(function() {
				if(!$(this).siblings('.sna1').hasClass('sna1active')) {
					//$(this).hide().parent().removeClass('snl1open');
				}
				$(this).siblings('.sna1').click(function() {
					$(this).parent().toggleClass('snl1open');
					$(this).siblings('.snu2').slideToggle();
					return false;
				});
			});
		},
		'.lightimg': function($obj) {
			$obj.showPopupImg();
		}
	},
	libs: {
		loadImg: function(url, callback) {
			var img = new Image();
			img.src = url;
			if(img.complete) {
				callback.call(img);
			} else {
				img.onload = function() {
					callback.call(img);
				};
			}
		}
	}
};
(function($) {
	$.fn.setDefValue = function() {
		return this.each(function() {
			$(this).bind("focus", function() {
				if($(this).val() == this.defaultValue) {
					$(this).val("");
				};
			}).bind("blur", function() {
				if($(this).val() == "") {
					$(this).val(this.defaultValue);
				};
			});
		});
	};
	$.fn.extend({
		slideRight: function() {
			return this.each(function() {
				$(this).animate({
					width: 'show'
				});
			});
		},
		slideLeft: function() {
			return this.each(function() {
				$(this).animate({
					width: 'hide'
				});
			});
		},
		slideToggleWidth: function() {
			return this.each(function() {
				var el = $(this);
				if(el.css('display') == 'none') {
					el.slideRight();
				} else {
					el.slideLeft();
				}
			});
		}
	});
	$.fn.setCenter = function() {
		return this.each(function() {
			var top = ($(window).height() - $(this).height()) / 2;
			var left = ($(window).width() - $(this).width()) / 2;
			$(this).css({
				top: top > 0 ? top : 0,
				left: left
			});
		});
	};
	$.fn.showPopupImg = function() {
		return this.each(function() {
			$(this).bind('click', function() {
				var imgUrl = $(this).attr('href');
				var imgTitle = $(this).attr('title');
				//var $popup = $('<div class="popup popbd"><div class="popload"><img src="/zh_CN/wp-content/themes/jisun_2.0/images/ajax-loader-3.gif" alt="loading" /></div></div>');
				var $popup = $('<div class="popup popbd"><div class="popload"></div></div>');
				$popup.insertAfter('#wrap').setCenter().showPopupBg();
				jisun.cnsite.libs.loadImg(imgUrl, showPopupImg);

				function showPopupImg() {
					var imgW = this.width;
					var imgH = this.height;
					var imgHv = imgH + 20;
					$popup.html('<div class="popup popcont" style="width:' + imgW + 'px;height:' + imgHv + 'px;"><img src="' + imgUrl + '" alt="' + imgTitle + '" /><h4>' + imgTitle + '</h4></div>').setCenter().find('img').animate({
						width: imgW,
						height: imgH
					}, 200, function() {
						$popup.find('.popcont').css({
							background: '#FFF'
						});
						$popup.append('<a class="popclose" href="#">close</a>').find('.popclose').bind('click', function() {
							$(this).hidePopup();
							return false;
						});
					});
				}
				return false;
			});
		});
	};
	$.fn.showPopupBg = function() {
		return this.each(function() {
			$('<div class="popup popbg"></div>').insertAfter('#wrap').height($('body').height()).fadeTo('normal', 0.6).bind('click', function() {
				$(this).hidePopup();
				return false;
			});
		});
	};
	$.fn.showPopup = function() {
		return this.each(function() {

		});
	};
	$.fn.hidePopup = function() {
		return this.each(function() {
			$('.popup').fadeOut(function() {
				$(this).remove();
			});
		});
	};
})(jQuery);
$(document).ready(function() {
	jisun.cnsite.ready();
});