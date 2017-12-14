/* ------------------------------------------ */
/*             TABLE OF CONTENTS
/* ------------------------------------------ */

/*   01 - MENU                   */
/*   02 - owl Slider             */
/*   03 - Instafeed              */
/*   04 - Tweet                  */
/*   05 - Loading Overlay        */
/*   06 - Back to top button     */
/*   07 - Parallax Mobile        */
/*   08 - WOW Animation          */


jQuery(document).ready(function ($) {

"use strict";

/*-----------------------------------------------------------------------------------*/
/*	Start Sticky Sidebar
/*-----------------------------------------------------------------------------------*/

$('.sidebar').theiaStickySidebar({
// Settings
additionalMarginTop: 30
});

$('.single-share-left').theiaStickySidebar({
	additionalMarginTop: 50,
	additionalMarginBottom: 90,
});

function calcWidth() {
	var navwidth = 0;
	var morewidth = $('#main .more').outerWidth(true);
	$('#main > li:not(.more)').each(function() {
		navwidth += $(this).outerWidth( true );
	});

	//var availablespace = $('nav').outerWidth(true) - morewidth;
	var availablespace = $('#nav-main').width() - morewidth;

	if (navwidth > availablespace) {
		var lastItem = $('#main > li:not(.more)').last();
		lastItem.attr('data-width', lastItem.outerWidth(true));
		lastItem.prependTo($('#main .more ul'));
		calcWidth();
	} else {

	var firstMoreElement = $('#main li.more li').first();
	if (navwidth + firstMoreElement.data('width') < availablespace) {
		firstMoreElement.insertBefore($('#main .more'));
	}
}

if ($('.more li').length > 0) {
	$('.more').css('display','inline-block');
	} else {
		$('.more').css('display','none');
	}
}

$(window).on('resize load',function(){
	calcWidth();
});

$('.more a').on('click', function(){
 $('.overflow').slideToggle();
 $('.more > a').toggleClass('active-more');
});


/*-----------------------------------------------------------------------------------*/
/*	End Sticky Sidebar
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Start Search
/*-----------------------------------------------------------------------------------*/

$(".scrollbar-inner").niceScroll({cursorcolor:"#1b1d25"});

var sharer = new SelectionSharer('.post-content p');

$(".Search-Icon-click").on('click', function(){
	$(".Block-Search-header").fadeIn(150);
  $(".Block-Search-header").addClass('active-search');
});
$(".close-search").on('click', function(){
	$(".Block-Search-header").fadeOut(300);
  $(".Block-Search-header").removeClass('active-search');
})

$(window).load(function() {
  $('.Block-Search-header').css({'display':'none'});
});

$(".header-social-icons").on('click', '.social-toggle', function(){
	$(this).next(".social-toggle").addClass("active");
	$(this).next(".Social-header").addClass("open");
	return false;
});

$(".Social-header .close-button").on('click', function(){
	$(".social-toggle").removeClass("active");
	$(".Social-header").removeClass("open");
	return false;
});

$(".login-icon-click").on('click', function(){
	$(".login-popup-header").fadeIn(150);
  $(".login-popup-header").addClass('active-login');
});
$(".close-login").on('click', function(){
	$(".login-popup-header").fadeOut(300);
  $(".login-popup-header").removeClass('active-login');
})

/*-----------------------------------------------------------------------------------*/
/*	End Search
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Start MENU
/*-----------------------------------------------------------------------------------*/

$(".flexnav").flexNav({
  'animationSpeed':     250,            // default for drop down animation speed
});

$('header #headermenu > ul > li').each(function(){
  function mousein_triger(){
    var fullsize = $('body').width();
    if (fullsize > 700) {
    $("header .main-menu .menu-item").removeClass("menu-active");
    $(this).addClass("menu-active");
    $(this).find('.mega-menu-content').height($(this).find('.mega-category').height());
    $(this).find('.mega-category-content, .sub-menu').fadeIn(100);
    }
  }
  function mouseout_triger() {}
  var settings = {
    sensitivity: 4,
    interval: 30,
    timeout: 300,
    over: mousein_triger,
    out:mouseout_triger
  };
  $('.main-menu .menu-item').not( '.sub-menu .menu-item' ).hoverIntent( settings );
  var settings1 = {
      sensitivity: 4,
      interval: 0,
      timeout: 300,
      over: mousein_triger,
      out:mouseout_triger
  };
  $( '.sub-menu .menu-item' ).hoverIntent( settings1 );

	jQuery(document).ready(function ($) {
		//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
		var MQL = 1170;
		//primary navigation slide-in effect
		if ($(window).width() > MQL) {
			var headerHeight = $('.header-sticky').height();
			$(window).on('scroll',
					{
						previousTop: 0
					},
			function () {
				var currentTop = $(window).scrollTop();
				//check if user is scrolling up
				if (currentTop < this.previousTop) {
					//if scrolling up...
					if (currentTop > 0 && $('.header-sticky').hasClass('is-fixed open')) {
						$('.header-sticky').addClass('is-visible');
					} else {
						$('.header-sticky').removeClass('is-visible is-fixed open');
					}
				} else {
					//if scrolling down...
					$('.header-sticky').removeClass('is-visible');
					if (currentTop > headerHeight && !$('.header-sticky').hasClass('is-fixed open'))
						$('.header-sticky').addClass('is-fixed open');
				}
				this.previousTop = currentTop;
			});
		}
	});

});


/*-----------------------------------------------------------------------------------*/
/*	End MENU
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Star Sidebar Navigation
/*-----------------------------------------------------------------------------------*/

$('.sidebar-navigation').each(function(){
  $("body").on("click",".sidebar-button a", function(e){
    $("html").addClass("sidebar-open");
    $(".sidebar-navigation, .blog-inwrap").addClass("open");
  	e.stopPropagation();
    e.preventDefault();
  });

  $("body").on("click",".close-btn", function(e){
    $("html").removeClass("sidebar-open");
    $(".sidebar-navigation, .blog-inwrap").removeClass("open");
    e.preventDefault();
  });

	// Toggle Menu Sidebar
	$('.sidebar-navigation').find('li.menu-item-has-children > a').on('click', function (e) {
		e.preventDefault();

		$(this).closest('li').siblings().find('ul.sub-menu').slideUp();
		$(this).closest('li').siblings().removeClass('active');

		$(this).closest('li').children('ul.sub-menu').slideToggle();
		$(this).closest('li').toggleClass('active');
	});
  $(".scrollbar-macosx").niceScroll({cursorcolor:"#1b1d25"});
});

/*-----------------------------------------------------------------------------------*/
/*	End Sidebar Navigation
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Start Featured Slider
/*-----------------------------------------------------------------------------------*/

	$('.breaking-style1').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		nextArrow: '.next-arrow',
		prevArrow: '.prev-arrow'
	});

	$('.breaking-style2').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		fade: false,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		nextArrow: '.next-arrow',
		prevArrow: '.prev-arrow',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 780,
			settings: {
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				centerMode: false,
				slidesToScroll: 1
			}
		}
	]
	});

	$('.featured-style-1').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.featured-style-2').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.featured-style-3').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.featured-style-4').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.featured-style-5').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.featured-style-6').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.featured-style-7').slick({
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				centerMode: false,
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 780,
			settings: {
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				centerMode: false,
				slidesToScroll: 1
			}
		}
	]
	});

	$('.featured-style-8').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				centerMode: false,
				slidesToShow: 3,
				slidesToScroll: 3
			}
		},
		{
			breakpoint: 780,
			settings: {
				centerMode: false,
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	]
	});

	$('.featured-style-9').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		speed: 1000,
		centerMode: true,
		centerPadding: '40px',
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 780,
			settings: {
				centerMode: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				centerMode: false,
				slidesToScroll: 1
			}
		}
	]
	});

	$('.featured-style-10').slick({
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		speed: 1000,
		centerMode: true,
		centerPadding: '40px',
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 780,
			settings: {
				centerMode: false,
				slidesToShow: 2,
				slidesToScroll: 2
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				centerMode: false,
				slidesToScroll: 1
			}
		}
	]
	});
	
	$('.featured-style-11').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
  	autoplaySpeed: 4000,
		prevArrow:'<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
		nextArrow:'<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
	});

	$('.posts-category-sidebar').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		nextArrow: '.post-slide-nav .next-nav',
		prevArrow: '.post-slide-nav .prev-nav'
	});

	$('.slider-gallery').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 1000,
		autoplay: true,
		rtl: true,
  	autoplaySpeed: 4000,
		nextArrow: '.post-slide-nav .next-nav',
		prevArrow: '.post-slide-nav .prev-nav'
	});

	$('.video-playlist').slick({
		infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 1,
		speed: 1000,
		rtl: true,
		autoplay: true,
		responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
	});
	$('.slides-single-shop').slick({
		infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
		speed: 1000,
		rtl: true,
		asNavFor: '.slider-nav'
	});
	$('.slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.slides-single-shop',
	  dots: true,
	  centerMode: true,
		rtl: true,
	  focusOnSelect: true
	});


	// Basic FitVids
	$(".video-wrapper").fitVids();

	// Popup Images Gallery
	$('.post-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
	});

	// Justify Gallery
	$(".post-gallery").justifiedGallery({
		rowHeight: 250,
		margins: 3,
		lastRow: 'justify',
	});

	// Popup Images Shop
	$('.shop-img-poup').magnificPopup({type:'image'});

/*-----------------------------------------------------------------------------------*/
/*	End owl Slider
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Start Progress-Bar
/*-----------------------------------------------------------------------------------*/

if (jQuery(".progress-bar").length) {
	jQuery(".progress-bar").each(function(){
		var $this = jQuery(this);
		var percent = $this.attr("data-percent");
		$this.bind("inview", function(event, isInView, visiblePartX, visiblePartY) {
			if (isInView) {
				$this.animate({ "width" : percent + "%"}, percent*20);
			}
		});
	});
}


/*-----------------------------------------------------------------------------------*/
/*	End Progress-Bar
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Start Back to top button
/*-----------------------------------------------------------------------------------*/

var winScroll = $(window).scrollTop();
	if (winScroll > 1) {
		$('#to-top').css({bottom:"10px"});
	} else {
		$('#to-top').css({bottom:"-100px"});
	}
	$(window).on("scroll",function(){
		winScroll = $(window).scrollTop();

		if (winScroll > 1) {
			$('#to-top').css({opacity:1,bottom:"30px"});
		} else {
			$('#to-top').css({opacity:0,bottom:"-100px"});
		}
	});
	$('#to-top').click(function(){
		$('html, body').animate({scrollTop: '0px'}, 800);
		return false;
});

$('.fa-hover').wrapInner('<span />');

/*-----------------------------------------------------------------------------------*/
/*	End Back to top button
/*-----------------------------------------------------------------------------------*/

function bs_fix_vc_full_width_row(){
  var $elements = jQuery('[data-vc-full-width="true"]');
  jQuery.each($elements, function () {
      var $el = jQuery(this);
      $el.css('right', $el.css('left')).css('left', '');
  });
}

// Fixes rows in RTL
jQuery(document).on('vc-full-width-row', function () {
  bs_fix_vc_full_width_row();
});

// Run one time because it was not firing in Mac/Firefox and Windows/Edge some times
bs_fix_vc_full_width_row();

/*-----------------------------------------------------------------------------------*/
/*	Start Parallax Mobile
/*-----------------------------------------------------------------------------------*/

  $(".product-page-tabs-nav li:first").addClass("active");
  $(".product-page-tabs-content-wrapper div:first").addClass("active");
  if (navigator.userAgent.match(/Android/i) ||
      navigator.userAgent.match(/webOS/i) ||
      navigator.userAgent.match(/iPhone/i) ||
      navigator.userAgent.match(/iPad/i) ||
      navigator.userAgent.match(/iPod/i) ||
      navigator.userAgent.match(/BlackBerry/i)) {
      $('.parallax').addClass('mobile');
  }

/*-----------------------------------------------------------------------------------*/
/*	End Parallax Mobile
/*-----------------------------------------------------------------------------------*/

});
