jQuery('document').ready(function ($) {


	$('.header.menu-section').show();
	// header search option
	$('.search-icon .fa-search').click(function () {
		$('.ed-search ').addClass('search-active');
	});
	$('.search-icon .ed-search .search-close .fa-close ').on('click', function () {
		$('.ed-search').removeClass('search-active');
	});


	//Smooth Scrolling
	var
		menuWrap = $('body .nav__primary')
		, offsetArray = []
		, offsetValueArray = []
		, _document = $(document)
		, currHash = ''
		, isAnim = false
		, isHomePage = $('body').hasClass('home') ? true : false
		;

	//--------------------------- Menu navigation ---------------------------
	$('#topnav > li', menuWrap).each(function () {
		if ($(this).hasClass('menu-item-type-custom')) {
			var newUrl = $('.front-header-logo a, .site-logo a').attr('href');
			newUrl += $('>a', this).attr('href');
			if (!isHomePage) {
				$('>a', this).attr({ 'href': newUrl });
			}
		}
	})

	// Select all links with hashes
	$('a[href*="#"]')
		// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.click(function (event) {
			// On-page links
			if (
				location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
				&&
				location.hostname == this.hostname
			) {
				// Figure out element to scroll to
				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				// Does a scroll target exist?
				if (target.length) {
					// Only prevent default if animation is actually gonna happen
					event.preventDefault();
					$('html, body').animate({
						scrollTop: target.offset().top
					}, 1000, function () {
						// Callback after animation
						// Must change focus!
						var $target = $(target);
						$target.focus();
						if ($target.is(":focus")) { // Checking if the target was focused
							return false;
						} else {
							$target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
							$target.focus(); // Set focus again
						};
					});
				}
			}
		});

	//back to top button
	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('#back-to-top').addClass('show');
		} else {
			$('#back-to-top').removeClass('show');
		}
	});

	$("#back-to-top").click(function () {
		$('html,body').animate({ scrollTop: 0 }, 600);
	});

	// homepage client slider
	$('.client-slider').owlCarousel({
		navigation: true,
		pagination: false,
		slideSpeed: 500,
		paginationNumbers: false,
		items: 3,
		addClassActive: true,
		center: true,
		loops: true,
		responsiveClass: true,
		itemsDesktop: [1000, 3], //3 items between 1000px and 901px
		itemsDesktopSmall: [900, 3], // betweem 900px and 601px
		itemsTablet: [600, 2],
	});

	$('.testimonial-slider').owlCarousel({
		stagePadding: 50,
		loops: true,
		autoPlay: false,
		navigation: true,
		pagination: false,
		slideSpeed: 500,
		paginationNumbers: false,
		items: 3,
		responsiveClass: true,
		itemsDesktop: [1000, 3], //3 items between 1000px and 901px
		itemsDesktopSmall: [900, 2], // betweem 900px and 601px
		itemsTablet: [600, 1],
		afterAction: function (eq) {
			//remove class active
			this
				.$owlItems
				.removeClass('active')

			//add class active
			this
				.$owlItems //owl internal $ object containing items
				.eq(this.currentItem + 1)
				.addClass('active')

		},
	});

	$('button.menu-toggle').click(function () {
		$('body').toggleClass('menu-on');
	});

	// counter section
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});

	// classyloader function
	$('.skill-loader').each(function () {
		var that = $(this);
		var percent = that.attr("data-percentage");
		that.waypoint({
			handler: function (direction) {
				that.ClassyLoader({
					width: 120,
					height: 120,
					percentage: percent,
					diameter: 70,
					lineWidth: 10,
					fontFamily: 'lato',
					fontSize: '20px',
					speed: 30,
					diameter: 50,
					lineColor: 'rgba(255, 255, 255, 1)',
					remainingLineColor: 'rgba(255, 255, 255, 0.5)',
					fontColor: 'rgba(255, 255, 255, 1)',
					start: 'top'
				});
			},
			offset: '95%'
		});
	});
});
