/* global js */
$(document).ready(function(){
	$('.draggable').draggable({
		containment: "body",
		scroll: false,
		handle: '.glue',
		start: function() {
			$('.draggable').removeClass('front-layer');
			$(this).addClass('front-layer draggable-start');
		},
		drag: function() {
			
		},
		stop: function() {
			$(this).removeClass('draggable-start');
		}
	});
});