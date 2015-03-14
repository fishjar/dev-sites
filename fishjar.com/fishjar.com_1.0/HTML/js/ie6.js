// JavaScript Document
$(document).ready(function() {
	DD_belatedPNG.fix('#main, #myicon, #mysites li a');
	$("#mysites li").each(function(){
		$(this).hover(
			function(){
				$(this).addClass("onhover");
			}, function(){
				$(this).removeClass("onhover");
			}
		);
	});
});
