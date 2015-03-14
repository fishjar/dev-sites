/* global js */
var yuesai = window.yuesai || {};
yuesai.revamp = {
	ready: function(){
		_revamp = this;
		for(init in _revamp.inits){
			if($(init)[0]){
				_revamp.inits[init]($(init));
			}
		}
	},
	inits: {
		'body': function($obj){
			
		},
		'#panel': function($obj){
			$obj.find('.search-field').setDefValue();
		},
		'.proinfo': function($obj){
			$obj.find('.proextbtn').toggle(
				function(){
					$obj.find('.proright').slideLeft();
					$(this).text('展开评论').addClass('proextbtn-close');
					return false;
				},
				function(){
					$obj.find('.proright').slideRight();
					$(this).text('收起评论').removeClass('proextbtn-close');
					return false;
				}
			);
		}
	},
	libs: {

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
})(jQuery);
$(document).ready(function(){
	yuesai.revamp.ready();
});