/* global js */
$(document).ready(function(){
	$('.draggable').draggable({
		containment: "body",
		scroll: false,
		handle: '.glue',
		start: function() {
			$(this).addClass('draggable-start');
		},
		drag: function() {
			
		},
		stop: function() {
			$(this).removeClass('draggable-start');
		}
	}).hover(
		function() {
			$(this).addClass('front-layer').siblings().removeClass('front-layer');
		},
		function() {
			//
		}
	);
});