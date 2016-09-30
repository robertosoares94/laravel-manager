$(document).ready(function () {
  $(".button-collapse").sideNav();
  $(".fone").mask("(99) ?9999-9999");
  $('form.valida').valida();
  $('.materialboxed').materialbox();
  $("img").lazyload({
    effect : "fadeIn"
  });
  $('.posts ul li').mouseover(function () {
    $(this).stop().children().children().children().children('.card-title').show();
  }).mouseout(function () {
    $(this).stop().children().children().children().children('.card-title').hide();
  });
  /* scrollTo */
  $(".scrollTo").click(function() {
    var elemento = $(this).attr('rel');
    $('html, body').animate({
      scrollTop: $("."+elemento).offset().top
    }, 2000);
  });
  $('.about-frase ul').bxSlider({
    mode: 'fade',
    useCSS: true,
    pager:false,
    infiniteLoop: true,
    adaptiveHeight: false,
    easing: 'swing',
    speed: 1000,
    auto: true,
    pause: 5000,
  });
  /* video */
  $(".video").click(function () {
    $.fancybox({
      'padding': 0,
      'autoScale': false,
      'transitionIn': 'none',
      'transitionOut': 'none',
      'title': this.title,
      'width': 640,
      'height': 385,
      'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
      'type': 'iframe'
    });
    return false;
  });
  $(".mCustomScrollbar").mCustomScrollbar({
    snapAmount:40,
    scrollButtons:{enable:false},
    keyboard:{scrollAmount:40},
    mouseWheel:{deltaFactor:40},
    scrollInertia:400,
    theme:"my-theme"
  });

});
