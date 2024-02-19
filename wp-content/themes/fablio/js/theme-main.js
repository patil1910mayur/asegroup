/**
 * Functionality specific to invess.
 *
 * Provides helper functions to enhance the theme experience.
 */
"use strict";

	/* ***************** */
	/*  Carousel effect  */
	/* ***************** */
var themetechmount_carousel = function() {
	jQuery('.themetechmount-boxes-view-carousel').each(function(){
		
		var thisElement = jQuery(this);

		// Column
		var tm_column         = 3;
		var tm_slidestoscroll = 3;
		
		var tm_slidestoscroll_1200 = 3;
		var tm_slidestoscroll_992  = 3;
		var tm_slidestoscroll_768  = 2;
		var tm_slidestoscroll_479  = 1;
		var tm_slidestoscroll_0    = 1;
		if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
			var tm_slidestoscroll      = 1;
			var tm_slidestoscroll_1200 = 1;
			var tm_slidestoscroll_992  = 1;
			var tm_slidestoscroll_768  = 1;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
		}		
		
		// responsive
		var tm_responsive = [
			{ breakpoint: 1200, settings: {
				slidesToShow  : 3,
				slidesToScroll: tm_slidestoscroll_1200
			} },
			{ breakpoint: 768, settings: {
				slidesToShow  : 2,
				slidesToScroll: tm_slidestoscroll_768
			} },
			{ breakpoint: 574, settings: {
				slidesToShow  : 1,
				slidesToScroll: tm_slidestoscroll_479
			} },
			{ breakpoint: 0, settings: {
				slidesToShow  : 1,
				slidesToScroll: tm_slidestoscroll_0
			} }
		];
								
		if( jQuery(this).hasClass('themetechmount-boxes-col-three') ){
			tm_column         = 3;
			tm_slidestoscroll = 3;
			
			var tm_slidestoscroll_1200 = 3;
			var tm_slidestoscroll_992  = 2;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200,
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('themetechmount-boxes-col-one') ){
		
			tm_column         = 1;
			tm_slidestoscroll = 1;
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: false
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: false
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: 1
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1
				} }
			];
			
		} else if( jQuery(this).hasClass('themetechmount-boxes-col-two') ){
			tm_column         = 2;
			tm_slidestoscroll = 2;
			
			var tm_slidestoscroll_1200 = 2;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('themetechmount-boxes-col-four') ){
			tm_column         = 4;
			tm_slidestoscroll = 4;
			
			var tm_slidestoscroll_1200 = 4;
			var tm_slidestoscroll_992  = 2;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 4,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];			
			
		} else if( jQuery(this).hasClass('themetechmount-boxes-col-five') ){
			tm_column         = 5;
			tm_slidestoscroll = 5;
			
			var tm_slidestoscroll_1200 = 5;
			var tm_slidestoscroll_992  = 3;
			var tm_slidestoscroll_768  = 3;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 5,
					slidesToScroll: tm_slidestoscroll_1200,
					centerMode: false,
					centerPadding: '0px'
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
			
		} else if( jQuery(this).hasClass('themetechmount-boxes-col-six') ){
			tm_column         = 6;
			tm_slidestoscroll = 6;
			
			var tm_slidestoscroll_1200 = 6;
			var tm_slidestoscroll_992  = 3;
			var tm_slidestoscroll_768  = 3;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 6,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
		}		
		if( jQuery(this).hasClass('tm_1200slidestoshow_2') ){
			tm_column         = 3;
			tm_slidestoscroll = 3;
			
			var tm_slidestoscroll_1200 = 3;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('tm-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			tm_responsive     = [
				{ breakpoint: 1400, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200,
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];	
		
		}	
		// Fade effect
		var tm_fade = false;
		if( jQuery(this).data('tm-effecttype')=='fade' ){
			tm_fade = true;
		}
		

		// Transaction Speed
		var tm_speed = 800;
		if( jQuery.trim( jQuery(this).data('tm-speed') ) != '' ){
			tm_speed = jQuery.trim( jQuery(this).data('tm-speed') );
		}
		
		// Autoplay
		var tm_autoplay = false;
		if( jQuery(this).data('tm-autoplay')=='1' ){
			tm_autoplay = true;
		}
		
		// Autoplay Speed
		var tm_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('tm-autoplayspeed') ) != '' ){
			tm_autoplayspeed = jQuery.trim( jQuery(this).data('tm-autoplayspeed') );
		}
		
		// Loop
		var tm_loop = false;
		if( jQuery.trim( jQuery(this).data('tm-loop') ) == '1' ){
			tm_loop = true;
		}
		
		// Dots
		var tm_dots = false;
		if( jQuery.trim( jQuery(this).data('tm-dots') ) == '1' ){
			tm_dots = true;
		}
		
		// Next / Prev navigation
		var tm_nav = false;
		if( jQuery.trim( jQuery(this).data('tm-nav') ) == '1' || jQuery.trim( jQuery(this).data('tm-nav') ) == 'above' || jQuery.trim( jQuery(this).data('tm-nav') ) == 'below' ){
			tm_nav = true;
		}
		
		// Center mode
		var tm_centermode = false;
		if( jQuery.trim( jQuery(this).data('tm-centermode') ) == '1' ){
			tm_centermode = true;
		}
		
		// Center padding
		var tm_centerpadding = 800;
		if( jQuery.trim( jQuery(this).data('tm-centerpadding') ) != '' ){
			var tm_centerpadding = jQuery.trim( jQuery(this).data('tm-centerpadding') );
		}
		
		// Pause on Focus
		var tm_pauseonfocus = false;
		if( jQuery.trim( jQuery(this).data('tm-pauseonfocus') ) == '1' ){
			tm_pauseonfocus = true;
		}
		
		// Pause on Hover
		var tm_pauseonhover = false;
		if( jQuery.trim( jQuery(this).data('tm-pauseonhover') ) == '1' ){
			tm_pauseonhover = true;
		}
		
		
		// RTL
		var tm_rtl = false;
		if( jQuery('body').hasClass('rtl') ){
			tm_rtl = true;
		}
		
		jQuery('.themetechmount-boxes-row-wrapper > div', this).removeClass (function (index, css) {
			return (css.match (/(^|\s)col-\S+/g) || []).join(' ');
		});
	
		jQuery('.themetechmount-boxes-row-wrapper', this).slick({
			fade             : tm_fade,
			speed            : tm_speed,
			centerMode       : tm_centermode,
			centerPadding    : tm_centerpadding+'px',
			pauseOnFocus     : tm_pauseonfocus,
			pauseOnHover     : tm_pauseonhover,
			slidesToShow     : tm_column,
			slidesToScroll   : tm_slidestoscroll,
			autoplay         : tm_autoplay,
			autoplaySpeed    : tm_autoplayspeed,
			rtl              : tm_rtl,
			dots             : tm_dots,
			pauseOnDotsHover : false,
			arrows           : tm_nav,
			adaptiveHeight   : false,
			infinite         : tm_loop,
			responsive       : tm_responsive
  
		});
	});
		
	// On resize.. it will re-arrange the Flexslider
	jQuery('.themetechmount-boxes-row-wrapper', this).on('setPosition', function(event, slick){
		jQuery( this ).find( ".tm-flexslider" ).each(function(){
			jQuery(this).resize();
		});
	});
	
	// Next button in heading area
	jQuery(".tm-slick-arrow.tm-slick-next", this ).on('click', function(){
		jQuery('.themetechmount-boxes-row-wrapper', jQuery(this).closest('.themetechmount-boxes-view-carousel') ).slick('slickNext');
	});
	
	// Pre button in heading area
	jQuery(".tm-slick-arrow.tm-slick-prev", this).on('click', function(){
		jQuery('.themetechmount-boxes-row-wrapper', jQuery(this).closest('.themetechmount-boxes-view-carousel') ).slick('slickPrev');
	});	
	
	
	
	// Testimonials Slick view
	jQuery('.themetechmount-boxes-view-slickview').each(function(){

		// Fade effect
		var tm_fade = false;
		if( jQuery(this).data('tm-effecttype')=='fade' ){
			tm_fade = true;
		}
		
		// Transaction Speed
		var tm_speed = 800;
		if( jQuery.trim( jQuery(this).data('tm-speed') ) != '' ){
			tm_speed = jQuery.trim( jQuery(this).data('tm-speed') );
		}
		
		// Autoplay
		var tm_autoplay = false;
		if( jQuery(this).data('tm-autoplay')=='1' ){
			tm_autoplay = true;
		}
		
		// Autoplay Speed
		var tm_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('tm-autoplayspeed') ) != '' ){
			tm_autoplayspeed = jQuery.trim( jQuery(this).data('tm-autoplayspeed') );
		}
		
		// Loop
		var tm_loop = false;
		if( jQuery.trim( jQuery(this).data('tm-loop') ) == '1' ){
			tm_loop = true;
		}
		
		// Dots
		var tm_dots = false;
		if( jQuery.trim( jQuery(this).data('tm-dots') ) == '1' ){
			tm_dots = true;
		}
		
		// Next / Prev navigation
		var tm_nav = false;
		if( jQuery.trim( jQuery(this).data('tm-nav') ) == '1' ){
			tm_nav = true;
		}
		
	
		var testinav 	= jQuery('.testimonials-nav', this);
		var testiinfo 	= jQuery('.testimonials-info', this);
		
		/* Options for "Owl Carousel 2"
		 * http://owlcarousel.owlgraphic.com/index.html
		 */
		var rtloption = false;
		if( jQuery('body').hasClass('rtl') ){
			rtloption = true;
		}
		
		// Info
		jQuery('.testimonials-info', this).slick({
			fade			: tm_fade,
			//arrows			: tm_nav,
			arrows			: false,
			asNavFor		: testinav,
			adaptiveHeight	: true,
			speed			: tm_speed,
			autoplay		: tm_autoplay,
			autoplaySpeed	: tm_autoplayspeed,
			infinite		: tm_loop,
			rtl             : rtloption
		});
		// Navigation
	   jQuery('.testimonials-nav', this).slick({
		    slidesToShow: 3,
			vertical: true,
			verticalScrolling: true,
			asNavFor		: testiinfo,
			centerMode		: true,
			centerPadding	: 0,
			focusOnSelect	: true,
			autoplay		: tm_autoplay,
			autoplaySpeed	: tm_autoplayspeed,
			speed			: tm_speed,
			arrows			: false,
			dots			: tm_dots,
			infinite		: tm_loop,
			rtl             : rtloption
		});
	});
};	
	

 jQuery(document).ready(function() {
	setTimeout(function(){
		themetechmount_carousel();
	}, 100);
	
 });