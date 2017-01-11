$(function() {  $('a[href*="#"]:not([href="#"])').click(function() {    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {      var target = $(this.hash);      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');      if (target.length) {        $('html, body').animate({          scrollTop: target.offset().top +50        }, 300);        return false;      }    }  });});

var parrallaxHome = $("#Home");var hand = $('.hand');var penta = $('.penta');var estText = $('.est-text');var handText = $('.hand-text');var prop1 = $('.prop-1');var X = 0;var Y = 0;var A = 0;var Z = 0;

prop1.overlaps(prop1, function(){  console.log("asdss");});
prop1.on('mouseover', function(){  var Xrand = Math.floor(Math.random() * 60) + 20 ;  var Yrand = Math.floor(Math.random() * 60) + 20 ;  var Zrand = Xrand * Yrand / 2;  $(this).css({    top: Xrand+'%',    left: Yrand+'%',    // transition: 'none'    transform: 'translate(-10px, -120px) rotateZ('+Zrand+'deg)'  })})

var filterBtn = $('.filter>ul>li');var thumbs = $('.thumbs-parent');

filterBtn.on('click', function(){  filterBtn.removeClass('active');  $(this).addClass('active');  var cat = $(this).data('category-handle');  if (cat == 'All') {    thumbs.removeClass('nonactive');  }else {    thumbs.addClass('nonactive');    $('.'+cat).removeClass('nonactive');  }})


var gallery = $("#gallerycontent");var hovTint = $('.hover-tint');var popupOverlay = $('.popup-parent');var popupImg = $('.popup-img');var parentContainer = $('.parent-container');

gallery.on('click', 'div.hover-tint', function(e){  var src = $(this).prev().attr('src');  popupOverlay.fadeIn(500);  popupImg.attr('src', src);})

popupOverlay.on('click', function(){  $(this).fadeOut();})

var homeSec = $('#Home');var storySec = $('#Story');var workSec = $('#Work');var bookSec = $('#Book');var Footer = $('#Footer');var mainSec = $('.fill-section');var navLi = $('.nav-ul>div>ul>li');

mainSec.waypoint(function(){  var id = $(this.element).attr('id');  var active = $(this.element);  active.addClass('active');}, {  offset: '85%'})
mainSec.waypoint(function(){  var id = $(this.element).attr('id');  navLi.removeClass('active');  $('.'+id).addClass('active');}, {  offset: '-1%'})

var enterBtn = $('.enter-btn');
var initPage = $('.init-page-load');
$(window).load(function(){
  enterBtn.html("Enter Site")
  enterBtn.on('click',function(){
    initPage.addClass('clicked');
    $('#Home').css({
      transition: 'all 2s ease',
      opacity: 1,
    });
  });
});





$( window ).resize(function() {});
if ($(window).width() < 1080) {  console.log("dsa");}else {  penta.on('mousedown', function(){    penta.css({      transform: 'translate(-50%, -50%) rotateZ(0) scale(1.1)',      transition: 'all 0.3s ease'    })  })
  parrallaxHome.mousemove(function(event){    var Xm = event.pageX;    var Ym = event.pageY;    X = Xm - 950;    Y = Ym -500;    A = (X+Y)/2;    Z = (-X+Y)/10;    penta.css({      transform: 'translate(-50%, -50%) rotateZ('+Z/50+'deg)',      transition: 'none'    })
    estText.css({      transform: 'translate(-50%, -50%) rotateZ('+Z/15+'deg)'    })
    handText.css({      transform: 'translate(-50%, -50%) rotateZ('+-Z/25+'deg)'    })
    hand.css({      top: -Y/6+'px',      left: -X/5+'px',      transform: 'translate(-10px, -120px) rotateZ('+-A/30+'deg)'    })    // prop1.css({    //   top: -Y/10+'%',    //   left: -X/30+'%',    //   // transform: 'translate('+X/10+'px, '+Y/10+'px) rotateZ('+-A/30+'deg)'    // })  })

  initPage.mousemove(function(event){    var Xm = event.pageX;    var Ym = event.pageY;    var X = Xm - 950;    var Y = Ym -500;    var A = (X+Y)/2;    var Z = (-X+Y)/10;    penta.css({      transform: 'translate(-50%, -50%) rotateZ('+Z/50+'deg)',      transition: 'none'    })
    estText.css({      transform: 'translate(-50%, -50%) rotateZ('+Z/15+'deg)'    })    handText.css({      transform: 'translate(-50%, -50%) rotateZ('+-Z/25+'deg)'    })
    hand.css({      top: -Y/6+'px',      left: -X/5+'px',      transform: 'translate(-10px, -120px) rotateZ('+-A/30+'deg)'    })  })}console.log('ver 0.2');