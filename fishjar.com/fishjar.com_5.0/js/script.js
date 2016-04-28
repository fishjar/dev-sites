(function ($) {
    $.fn.cssMove = function (options) {
      var settings = $.extend({
        'left': 0,
        'top': 0,
        'deg': 20
      }, options);
      return this.each(function(){
        var $this = $(this);
        var deg = settings.deg/2 - Math.floor(Math.random()*settings.deg);
        var glue_deg = 5 - Math.floor(Math.random()*10);
        $this.fadeIn(1200,function(){
          $this.next('.glue').css({
            transform: 'translate(0,0) rotate('+glue_deg+'deg)'
          });
        }).css({
          transform: 'translate('+settings.left+'px,'+settings.top+'px) rotate('+deg+'deg)'
        });
      });
    };
    $.fn.cssFly = function (options) {
      var settings = $.extend({
        'tim': 0.3,
        'deg': 30
      }, options);
      return this.each(function(i){
        var deg = settings.deg/2 - Math.random()*settings.deg;
        $(this).css({
          'transform': 'translate(0,0) rotate('+deg+'deg) scale(1)',
          'animation-delay': settings.tim*i+'s'
        }).addClass('fly');
      });
    };
})(jQuery);
// scripts
$(document).ready(function() {
  // $('#section1 .note').hide(0);
  $.ajax({
    url: "http://ws.audioscrobbler.com/2.0/?method=user.gettopartists&user=fishjar&api_key=adfbad2a8d76cdab1484d87048574fb5&limit=12&format=json",
    dataType: "json",
    error: function(){
      $('#section2 .row').empty().append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' + ' 很不幸，您的网络不能连接到last.fm服务器！' + '</div>');
    },
    success: function(data){
      var artistNum = data.topartists.artist.length;
      var artistStr = '';
      for(var i=0; i<artistNum; i++){
        var artistName = data.topartists.artist[i].name;
        var artistUrl = data.topartists.artist[i].url;
        var artistImg = data.topartists.artist[i].image[2]["#text"];
        artistStr += '<div class="col col-md-2 col-sm-2 col-xs-3">' + '<a href="' + artistUrl + '" class="thumbnail" title="' + artistName + '"><img src="' + artistImg + '" alt="' + artistName + '"></a>' + '</div>';
      }
      $('#section2 .row').empty().append(artistStr);
    }
  });
  var blind = function(){
    $('#jumbotron').fadeOut(3000,function(){
      $(this).siblings('.blind-top').slideUp(2000);
      $(this).siblings('.blind-bottom').slideUp(2000,function(){
        $('#section1 .note').cssMove();
      });
    });
  };
  var section1Ready = function(){
    $('#section1 .glue').css({
      transform: 'translate(1000px,-1000px)'
    });
    $('#section1 .note').slice(0,2).hide(0).css({
      transform: 'translate(-1000px,0)'
    });
    $('#section1 .note').eq(2).hide(0).css({
      transform: 'translate(0,-1000px)'
    });
    $('#section1 .note').slice(-4).hide(0).css({
      transform: 'translate(1000px,1000px)'
    });
  };
  $('#fullpage').fullpage({
    sectionsColor: ['#000'],
    navigation: true,
    afterRender: function(){
      section1Ready();
      blind();
    },
    afterLoad: function(anchorLink, index){
      if(index == 1){
        if($('#jumbotron').is(':hidden')){
          $('#section1 .note').cssMove();
        }
      }
      if(index == 2){
        $('#section2 .col').cssFly();
      }
      if(index == 3){
        $('#section3 .row').fadeIn();
      }
    },
    onLeave: function(anchorLink, index){
      if(index == 1){
        section1Ready();
      }
      if(index == 2){
        $('#section2 .col').removeClass('fly');
      }
      if(index == 3){
        $('#section3 .row').fadeOut(0);
      }
    }
  });
  !function (d, s, id) {
    var js,
    fjs = d.getElementsByTagName(s)[0],
    p = /^http:/.test(d.location) ? 'http' : 'https';
    var t = setTimeout(function(){
      $('#section3 .row').empty().append('<div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>' + ' 很不幸，您的网络不能连接到twitter.com服务器！' + '</div>');
    },1000*10);
    if (!d.getElementById(id)) {
      js = d.createElement(s);
      js.id = id;
      js.src = p + "://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js, fjs);
      js.onload = function () {
        clearTimeout(t);
      }
    }
  } (document, "script", "twitter-wjs");
});