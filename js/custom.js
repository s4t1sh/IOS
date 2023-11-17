$(document).on('ready',function(){
	"use strict";
	
	/*================================================
		select script 
	=================================================*/
	if($('select').length){
		$('select').selectric();
	}
		
		
	/* ---------------------------------------------------------------------- */
	/*	Search Script
	/* ---------------------------------------------------------------------- */
	$(".search-fld").on('click',function(){
		if($(this).hasClass('minus')){        
			$(this).toggleClass("plus minus");
			$('.search-wrapper-area').fadeOut();
		}else{
			$('.search-wrapper-area').fadeIn();
			$(this).toggleClass("minus plus");
		}
	});
	
	/*
	==============================================================
	   Latest Blog Post Owl Carousel Script Start
	============================================================== */
	if($('#kode-client-slider').length){	 
		$("#kode-client-slider").owlCarousel({
			navigation : true, 
			slideSpeed : 300,
			paginationSpeed : 400,
			items : 7, 
			itemsDesktop : true,
			itemsDesktopSmall : true,
			itemsTablet: true,
			itemsMobile : true
		});
	}


		
	/*================================================
			slick slider
	=================================================*/
	if($('.attorney-slide').length){
		$('.attorney-slide').slick({
			autoplay: true,
			autoplaySpeed: 1500,
			slidesToShow: 1,
		});
	}
	
	/*
	  ==============================================================
		  slick Script
	  ============================================================== */
	if($('.spb-center').length){
		$('.spb-center').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			dots:true,
			autoplaySpeed:1500,
		});
	}
	
	/*
	==============================================================
	  slick Script
	============================================================== */
	if($('.kode-plumber-client').length){
		$('.kode-plumber-client').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			dots:true,
			autoplaySpeed: 2000,
		});
	}
	
	/*
	==============================================================
	  slick Script
	============================================================== */
	if($('.banner2-center').length){	
		$('.banner2-center').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			dots:true,
			autoplaySpeed:1500,
			speed: 1000
		});
	}	
	
	
	/*
	==============================================================
	  slick Script
	============================================================== */
	if($('#slider1').length){
		$('#slider1').bxSlider({
			mode: 'fade',
			auto: true,
			autoControls: true,
			pause: 2000
		});
	}
		
	/*================================================
		slick slider
	=================================================*/
	if($('.kode_testimonial_slider').length){
		$('.kode_testimonial_slider').slick({
			autoplay: true,
			autoplaySpeed: 2000,
			slidesToShow: 1,
		});	
	}	
	/*
	==============================================================
		  slick Script
	============================================================== */
	if($('.kode-member-slid').length){
		$('.kode-member-slid').slick({
			slidesToShow: 2,
			slidesToScroll: 2,
			autoplay: true,
			autoplaySpeed: 2000,
			 responsive: [
				{
				  breakpoint: 768,
				  settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					arrows: false,
					centerMode: true,
					centerPadding: '0px',
					slidesToShow: 1
				  }
				}
			  ]
		});
	}
	
	/*
	==============================================================
	  slick Script
	============================================================== */
	if($('.kode-customer_slid').length){
		$('.kode-customer_slid').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
		});
	}
	
	/* ---------------------------------------------------------------------- */
	/*	DL Responsive Menu
	/* ---------------------------------------------------------------------- */
	if(typeof($.fn.dlmenu) == 'function'){
		$('#kode-responsive-navigation').each(function(){
			$(this).find('.dl-submenu').each(function(){
				if( $(this).siblings('a').attr('href') && $(this).siblings('a').attr('href') != '#' ){
					var parent_nav = $('<li class="menu-item kode-parent-menu"></li>');
					parent_nav.append($(this).siblings('a').clone());
					
					$(this).prepend(parent_nav);
				}
			});
			$(this).dlmenu();
		});
	}
	
	/*
	  ==============================================================
		   Tab View Script Start
	  ============================================================== */
	if($('#tabs').length){
		$('#tabs').tab();
	}
		
		
	/* ==================================================================
					Number Count Up(WayPoints) Script
	  =================================================================	*/		
	if($('.counter').length){	
		$('.counter').counterUp({
			delay: 10,
			time: 1000
		});
	}
	/*
	==============================================================
	  Date Countdown
	============================================================== */	
	if($(".DateCountdown").length){
		$(".DateCountdown").TimeCircles();
	}
	
	/*
	==============================================================
	  Tooltip
	============================================================== */		
	if($('[data-toggle="tooltip"]').length){
		$('[data-toggle="tooltip"]').tooltip()
	}
	 
	/*
	==============================================================
	   Countdown - Downcount
	============================================================== */
	if($('.countdown').length){
		$('.countdown').downCount({ date: '08/08/2016 12:00:00', offset: +1 });
	}
	  
	/*
	==============================================================
	   Recent Property and Our Agent Owl Carousel Script Start
	============================================================== */
	if($('.kf_rent_property,.kf_agent_slider').length){
		var owl = $(".kf_rent_property,.kf_agent_slider");
		owl.owlCarousel({	
		 autoPlay: 3000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 1],
			[700, 2],
			[1000, 3],
			[1200, 4],
			[1400, 4],
			[1600, 4]
		  ],
		  navigation : true

		});
	}
	
	/*
	==============================================================
	   Latest Blog Post Owl Carousel Script Start
	============================================================== */
	if($('.kf_blog_slider').length){
		var owl = $(".kf_blog_slider");
		owl.owlCarousel({	
		 autoPlay: 3000, //Set AutoPlay to 3 seconds
		  itemsCustom : [
			[0, 1],
			[450, 1],
			[600, 1],
			[700, 2],
			[1000, 3],
			[1200, 3],
			[1400, 3],
			[1600, 3]
		  ],
		  navigation : true

		});
	}
	
	/*
	  ==============================================================
		   Company List Owl Carousel Script Start
	  ============================================================== */
	if($('.kf_company_slider').length){
		var owl = $(".kf_company_slider");
		owl.owlCarousel({	
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 2],
				[700, 2],
				[1000, 3],
				[1200, 5],
				[1400, 5],
				[1600, 5]
			],
			navigation : true
		});
	}
	
	/*=======================================================================
		  		Range Slider Script Script
	  =======================================================================
	*/	
	if($('[data-toggle="tooltip"]').length){
		$('[data-toggle="tooltip"]').filterable()
	}
	
	/*
	==============================================================
	  accordion Script Start
	============================================================== */  
	if($('.accordion').length){
		$.fn.slideFadeToggle = function(speed, easing, callback) {
			return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
		};

		$('.accordion').accordion({
			defaultOpen: 'section1',
			cookieName: 'accordion_nav',
			speed: 'slow',
			animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
				elem.next().stop(true, true).slideFadeToggle(opts.speed);
			},
			animateClose: function (elem, opts) { //replace the standard slideDown with custom function
				elem.next().stop(true, true).slideFadeToggle(opts.speed);
			}
		});
	
	}
	
	/*
	  =======================================================================
		  		 Pretty Photo Script
	  =======================================================================
	*/
	if($("a[data-rel^='prettyPhoto']").length){
		$("a[data-rel^='prettyPhoto']").prettyPhoto();
	}	
			
	/*
	  =======================================================================
		  		Range Slider Script Script
	  =======================================================================
	*/
	if($('.bxslider').length){
		$('.bxslider').bxSlider({
			pagerCustom: "#bx-pager"
		});	
	}	
		
	/*
	==============================================================
	   Progress Bar Script Start
	============================================================== */  
	$('.progressbar').each(function(){
		var t = $(this),
			dataperc = t.attr('data-perc'),
			barperc = Math.round(dataperc*5.56);
		t.find('.bar').animate({width:barperc}, dataperc*25);
		t.find('.label').append('<div class="perc"></div>');
		
		function perc() {
			var length = t.find('.bar').css('width'),
				perc = Math.round(parseInt(length)/5.56),
				labelpos = (parseInt(length)-2);
			t.find('.label').css('left', labelpos);
			t.find('.perc').text(perc+'%');
		}
		perc();
		setInterval(perc, 0); 
	});
	
	/*================================================
		owlCarouse2 start
	=================================================*/
	if($('.kode-pharmacy-brand-img').length){
		var owl = $(".kode-pharmacy-brand-img");
		owl.owlCarousel({ 
			autoWidth:true,
			autoPlay: 3000,    //Set AutoPlay to 3 seconds
			itemsCustom : [
				[0, 1],
				[450, 1],
				[600, 1],
				[700, 3],
				[1000, 5],
				[1200, 6],
				[1400, 6],
				[1600, 6]
			]
		});
	}
	
	/* ---------------------------------------------------------------------- */
	if($('#map-canvas').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}



	/* ---------------------------------------------------------------------- */
	/*	Click to Top 
	/* ---------------------------------------------------------------------- */
	if($('#child-topbtn').length){
		$('#child-topbtn').on("click",function() {		
			jQuery('html, body').animate({scrollTop : 0},800);
			return false;
		});
	}
});	

/* ---------------------------------------------------------------------- */
/*	Google Map Initializer
/* ---------------------------------------------------------------------- */
function initialize() {
	var MY_MAPTYPE_ID = 'custom_style';
	var map;
	var brooklyn = new google.maps.LatLng(40.6743890, -73.9455);
	var featureOpts = [
		{
		  stylers: [
			{ hue: '#ddd' },			
			{ visibility: 'simplified' },
			{ gamma: 0.7 },
			{ saturation: -200 },
			{ lightness: 15 },
			{ weight: 0.6 }
		  ]
		},
		{
		featureType: "road",
		  elementType: "geometry",
		  stylers: [
			{ lightness: 30 },
			{ visibility: "simplified" }
		  ]
		},
		{
		  elementType: 'labels',
		  stylers: [		  
			{ visibility: 'on' }
		  ]
		},
		{
		  featureType: 'water',
		  stylers: [
			{ color: '#ddd' }
		  ]
		}
	];	

	var mapOptions = {
		zoom: 13,
		center: brooklyn,
		mapTypeControlOptions: {
		  mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};

	map = new google.maps.Map(document.getElementById('map-canvas'),
		  mapOptions);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}	



/* ---------------------------------------------------------------------- */
/*	Cursor Animation
/* ---------------------------------------------------------------------- */

var cursorCanvas = document.getElementById("cursorCanvas");
var ctx = cursorCanvas.getContext("2d");

cursorCanvas.width = window.innerWidth;
cursorCanvas.height = window.innerHeight;

var mouseX = cursorX = window.innerWidth / 2;
var mouseY = cursorY = window.innerHeight / 2;
var ringRadius = 20;
var ringLineWidth = 1;
var chaseSpeed = 0.1;

window.addEventListener('mousemove', function (evt) {
    mouseX = evt.clientX;
    mouseY = evt.clientY; // Include scroll position
});

function chaseCursor() {
    var dx = (mouseX - cursorX) * chaseSpeed;
    var dy = (mouseY - cursorY) * chaseSpeed;

    cursorX += dx;
    cursorY += dy;
}

function drawCursor() {
    ctx.clearRect(0, 0, cursorCanvas.width, cursorCanvas.height);

    // Draw chasing ring
    ctx.beginPath();
    ctx.arc(cursorX, cursorY, ringRadius, 0, 2 * Math.PI);
    ctx.lineWidth = ringLineWidth;
    ctx.strokeStyle = "black";
    ctx.stroke();
    ctx.closePath();

    // Draw cursor dot
    ctx.beginPath();
    ctx.arc(cursorX, cursorY, 2, 0, 2 * Math.PI);
    ctx.fillStyle = "black";
    ctx.fill();
    ctx.closePath();

    requestAnimationFrame(drawCursor);
}

function updateCanvasSize() {
    cursorCanvas.width = window.innerWidth;
    cursorCanvas.height = window.innerHeight;
}

window.addEventListener('resize', function() {
    updateCanvasSize();
});

function animate() {
    chaseCursor();
    requestAnimationFrame(animate);
}

function scrollHandler() {
    mouseY = mouseY; // Update mouseY on scroll
}

// Initial setup
updateCanvasSize();
animate();
drawCursor();

// Listen for scroll events
window.addEventListener('scroll', scrollHandler);

