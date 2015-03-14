//Jisun JS
jQuery(function($) {
	$("#header > .nav > ul").fadingnav();
	$("#main >.indexbox > ul").fadingbox();
	$(".searchfield").bind("focus", function() {
		if($(this).val() == this.defaultValue) {
			$(this).val("");
		};
	}).bind("blur", function() {
		if($(this).val() == "") {
			$(this).val(this.defaultValue);
		};
	});
	/* $('#main > div.ad > ul.adslide').innerfade({
		speed: 1000,
		timeout: 4000,
		type: 'sequence'
	}); */
	$('#main .ad').slides({
		container: 'adslide',
		play: 3000,
		pause: 1500,
		hoverPause: true,
		autoHeight: true
	});
	$("input.searchfield,#commentform input,textarea#comment").focus(function() {
		$(this).addClass("active");
	}).blur(function() {
		$(this).removeClass("active");
	});
	$("#submit").hover(function() {
		$(this).triggerHandler("focus");
	}, function() {
		$(this).triggerHandler("blur");
	});
});