// Hide Header on on scroll down
if (jQuery('.main-header').length) {
	// Hide Header on on scroll down
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = jQuery('.main-header').outerHeight();

	jQuery(window).scroll(function (event) {
		didScroll = true;
	});

	setInterval(function () {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);

	function hasScrolled() {
		var st = jQuery(this).scrollTop();

		// Make sure they scroll more than delta
		if (Math.abs(lastScrollTop - st) <= delta)
			return;

		// If they scrolled down and are past the navbar, add class .nav-up.
		// This is necessary so you never see what is "behind" the navbar.
		if (st > lastScrollTop && st > navbarHeight) {
			// Scroll Down
			jQuery('.main-header').removeClass('header-down').addClass('header-up');
		} else {
			// Scroll Up
			if (st + jQuery(window).height() < jQuery(document).height()) {
				jQuery('.main-header').removeClass('header-up').addClass('header-down');
			}
		}

		lastScrollTop = st;
	}
}


(function (jQuery) {

	"use strict";


	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if (jQuery('.loader-wrap').length) {
			jQuery('.loader-wrap').delay(1000).fadeOut(500);
		}
	}

	if (jQuery(".preloader-close").length) {
		jQuery(".preloader-close").on("click", function () {
			jQuery('.loader-wrap').delay(200).fadeOut(500);
		})
	}


	//Update Header Style and Scroll to Top
	function headerStyle() {
		if (jQuery('.main-header').length) {
			var windowpos = jQuery(window).scrollTop();
			var siteHeader = jQuery('.main-header');
			var scrollLink = jQuery('.scroll-to-top');
			if (windowpos >= 1) {
				siteHeader.addClass('fixed-header');
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.fadeOut(300);
			}
		}
	}
	headerStyle();


	//Search Toggle
	if (jQuery('.search-box').length) {
		jQuery('.search-toggle').on('click', function () {
			jQuery('body').toggleClass('visible-search');
		});
		jQuery('.s-close-btn,.search-backdrop').on('click', function () {
			jQuery('body').removeClass('visible-search');
		});
		jQuery(document).keydown(function (e) {
			if (e.keyCode == 27) {
				jQuery('body').removeClass('visible-search');
			}
		});
	}

	//Info Sidebar Toggle
	if (jQuery('.main-header .info-toggler .info-btn').length) {
		//Show Form
		jQuery('.main-header .info-toggler .info-btn').on('click', function (e) {
			e.preventDefault();
			jQuery('body').addClass('side-content-visible');
		});
		//Hide Form
		jQuery('.info-bar .inner-box .cross-icon,.info-back-drop,.close-menu').on('click', function (e) {
			e.preventDefault();
			jQuery('body').removeClass('side-content-visible');
		});
		jQuery(document).keydown(function (e) {
			if (e.keyCode == 27) {
				jQuery('body').removeClass('side-content-visible');
			}
		});
	}

	//Hidden Bar Menu Config
	function hiddenBarMenuConfig() {
		var menuWrap = jQuery('.hidden-bar .side-menu');
		// appending expander button
		menuWrap.find('li.dropdown > a').append(function () {
			return '<button type="button" class="btn-expander"><i class="far fa-angle-right"></i></button>';
		});
		// hidding submenu
		menuWrap.find('.dropdown').children('ul').hide();

		jQuery(".hidden-bar .side-menu ul li.dropdown .btn-expander").on('click', function (e) {
			e.preventDefault();
			jQuery(this).parent('a').parent('li').children('ul').slideToggle();
			// toggling arrow of expander
			jQuery(this).find('i').toggleClass('fa-angle-right fa-angle-down');
			return false;
		});
	}

	hiddenBarMenuConfig();


	//Custom Scroll for Hidden Sidebar
	if (jQuery('.hidden-bar').length) {

		jQuery('.hidden-bar-closer,.menu-backdrop').on('click', function () {
			jQuery('.hidden-bar,body').removeClass('visible-sidebar');
			jQuery('.side-menu ul li.dropdown ul').slideUp();
			jQuery('.side-menu ul li.dropdown > a i').removeClass('fa-angle-right').addClass('fa-angle-down');
		});
		jQuery(document).keydown(function (e) {
			if (e.keyCode == 27) {
				jQuery('.hidden-bar,body').removeClass('visible-sidebar');
				jQuery('.side-menu ul li.dropdown ul').slideUp();
				jQuery('.side-menu ul li.dropdown > a i').removeClass('fa-angle-right').addClass('fa-angle-down');
			}
		});
		jQuery('.hidden-bar-opener').on('click', function () {
			jQuery('.hidden-bar,body').addClass('visible-sidebar');
		});
	}

	//Banner Carousel
	if (jQuery('.banner-slider').length) {
		var swiper = new Swiper('.banner-slider', {
			autoplay: true,
			autoplaySpeed: 7000,
			effect: "fade",
			speed: 1000,
			margin: 0,
			slidesPerView: 1,
			spaceBetween: 0,
			loop: true,
			autoplay: {
				delay: 7000
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			}
		});
	}


	//Parallax Scene for Icons
	if (jQuery('.parallax-scene-1').length) {
		var scene = jQuery('.parallax-scene-1').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if (jQuery('.parallax-scene-2').length) {
		var scene = jQuery('.parallax-scene-2').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if (jQuery('.parallax-scene-3').length) {
		var scene = jQuery('.parallax-scene-3').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if (jQuery('.parallax-scene-4').length) {
		var scene = jQuery('.parallax-scene-4').get(0);
		var parallaxInstance = new Parallax(scene);
	}




	//Dish Gallery Carousel
	if (jQuery('.dish-gallery-slider').length) {
		jQuery('.dish-gallery-slider').owlCarousel({
			loop: true,
			margin: 45,
			nav: true,
			smartSpeed: 700,
			autoplay: true,
			autoplayTimeout: 7000,
			navText: ['<span class="icon fa-light fa-angle-left"></span>', '<span class="icon fa-light fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1,
					nav: false,
				},
				600: {
					items: 1
				},
				768: {
					items: 2,
					margin: 30
				},
				992: {
					items: 3,
					margin: 30
				},
				1200: {
					items: 4
				}
			}
		});
	}

	//Testimonials Carousel
	if (jQuery('.testimonial-slider').length) {
		jQuery('.testimonial-slider').owlCarousel({
			loop: true,
			margin: 50,
			nav: true,
			smartSpeed: 700,
			autoplay: true,
			autoplayTimeout: 7000,
			navText: ['<span class="icon fa-light fa-angle-left"></span>', '<span class="icon fa-light fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 1
				},
				768: {
					items: 2,
					margin: 30
				},
				992: {
					items: 2,
					margin: 30
				},
				1200: {
					items: 3
				}
			}
		});
	}

	//Gallery Carousel
	if (jQuery('.image-gallery-slider').length) {
		jQuery('.image-gallery-slider').owlCarousel({
			loop: true,
			margin: 50,
			nav: true,
			smartSpeed: 700,
			autoplay: true,
			autoplayTimeout: 5000,
			navText: ['<span class="icon fa-light fa-angle-left"></span>', '<span class="icon fa-light fa-angle-right"></span>'],
			responsive: {
				0: {
					items: 1
				},
				768: {
					items: 1
				},
				992: {
					items: 1
				}
			}
		});
	}

	// Testimonials Carousel
	if (jQuery('.testimonials-section .testi-top').length && jQuery('.testimonials-section .testi-thumbs').length) {

		var jQuerysync1 = jQuery(".testimonials-section .testi-top"),
			jQuerysync2 = jQuery(".testimonials-section .testi-thumbs"),
			flag = false,
			duration = 500;

		jQuerysync1
			.owlCarousel({
				loop: true,
				items: 1,
				margin: 30,
				nav: true,
				navText: ['<span class="prev-btn far fa-angle-left"></span>', '<span class="next-btn far fa-angle-right"></span>'],
				dots: false,
				autoplay: true,
				autoplayTimeout: 5000
			})
			.on('changed.owl.carousel', function (e) {
				if (!flag) {
					flag = false;
					jQuerysync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
					flag = false;
				}
			});

		jQuerysync2
			.owlCarousel({
				loop: true,
				margin: 0,
				items: 1,
				nav: false,
				navText: ['<span class="icon far fa-angle-left"></span>', '<span class="icon far fa-angle-right"></span>'],
				dots: false,
				center: false,
				autoplay: true,
				centered: true,
				autoplayTimeout: 5000
			})

			.on('click', '.owl-item', function () {
				jQuerysync1.trigger('to.owl.carousel', [jQuery(this).index(), duration, true]);
			})
			.on('changed.owl.carousel', function (e) {
				if (!flag) {
					flag = true;
					jQuerysync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
					flag = false;
				}
			});

	}

	//Date Picker
	if (jQuery('.datepicker').length) {
		jQuery(".datepicker").datepicker();
	}

	//Fact Counter + Text Count
	if (jQuery('.count-box').length) {
		jQuery('.count-box').appear(function () {

			var jQueryt = jQuery(this),
				n = jQueryt.find(".count-text").attr("data-stop"),
				r = parseInt(jQueryt.find(".count-text").attr("data-speed"), 10);

			if (!jQueryt.hasClass("counted")) {
				jQueryt.addClass("counted");
				jQuery({
					countNum: jQueryt.find(".count-text").text()
				}).animate({
					countNum: n
				}, {
					duration: r,
					easing: "linear",
					step: function () {
						jQueryt.find(".count-text").text(Math.floor(this.countNum));
					},
					complete: function () {
						jQueryt.find(".count-text").text(this.countNum);
					}
				});
			}

		}, { accY: 0 });
	}

	//Accordion Box
	if (jQuery('.accordion-box').length) {
		jQuery(".accordion-box").on('click', '.acc-btn', function () {

			var outerBox = jQuery(this).parents('.accordion-box');
			var target = jQuery(this).parents('.accordion');

			if (jQuery(this).next('.acc-content').is(':visible')) {
				//return false;
				jQuery(this).removeClass('active');
				jQuery(this).next('.acc-content').slideUp(300);
				jQuery(outerBox).children('.accordion').removeClass('active-block');
			} else {
				jQuery(outerBox).find('.accordion .acc-btn').removeClass('active');
				jQuery(this).addClass('active');
				jQuery(outerBox).children('.accordion').removeClass('active-block');
				jQuery(outerBox).find('.accordion').children('.acc-content').slideUp(300);
				jQuery(this).next('.acc-content').slideDown(300);
				jQuery(this).parent('.accordion').addClass('active-block');
			}
		});
	}


	//Tabs Box
	if (jQuery('.tabs-box').length) {
		jQuery('.tabs-box .tab-buttons .tab-btn').on('click', function (e) {
			e.preventDefault();
			var target = jQuery(jQuery(this).attr('data-tab'));

			if (jQuery(target).is(':visible')) {
				return false;
			} else {
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				jQuery(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				jQuery(target).fadeIn(300);
				jQuery(target).addClass('active-tab');
			}
		});
	}

	//LightBox / Fancybox
	if (jQuery('.lightbox-image').length) {
		jQuery('.lightbox-image').fancybox({
			thumbs: {
				autoStart: true
			},
			openEffect: 'fade',
			closeEffect: 'fade',
			helpers: {
				media: {
					youtube: {
						params: {
							autoplay: 1
						}
					}
				}
			}
		});
	}


	// Scroll to a Specific Div
	if (jQuery('.scroll-to-target').length) {
		jQuery(".scroll-to-target").on('click', function () {
			var target = jQuery(this).attr('data-target');
			// animate
			jQuery('html, body').animate({
				scrollTop: jQuery(target).offset().top
			}, 1500);

		});
	}

	// Elements Animation
	if (jQuery('.wow').length) {
		var wow = new WOW(
			{
				boxClass: 'wow',      // animated element css class (default is wow)
				animateClass: 'animated', // animation css class (default is animated)
				offset: 0,          // distance to the element when triggering the animation (default is 0)
				mobile: false,       // trigger animations on mobile devices (default is true)
				live: true       // act on asynchronously loaded content (default is true)
			}
		);
		wow.init();
	}


	/* ==========================================================================
	   When document is Scrollig, do
	   ========================================================================== */

	jQuery(window).on('scroll', function () {
		headerStyle();
	});

	/* ==========================================================================
	   When document is loading, do
	   ========================================================================== */

	jQuery(window).on('load', function () {
		handlePreloader();
		if (jQuery('body.page-loaded').length) {
			jQuery('body').addClass('page-done');
		}
	});

	/* ==========================================================================
	   When document is Resized
	   ========================================================================== */

	jQuery(window).on('resize', function () {

	});



})(window.jQuery);