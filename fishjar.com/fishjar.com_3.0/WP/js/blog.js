/* global js */
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
		slideRight: function(callback) {
			return this.each(function() {
				$(this).animate({width: 'show'},function(){
					callback();
				});
			});
		},
		slideLeft: function(callback) {
			return this.each(function() {
				$(this).animate({width: 'hide'},function(){
					callback();
				});
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
	$('.search-field').setDefValue();
});