require('jquery-visible');
require('slick-carousel');

jQuery(document).ready(() => {
	// Wrap embedded objects and force them into 16:9
	$('#container iframe, #container embed, #container video').not('.ignore-ratio').wrap('<div class="video-container" />');

	// HEADER: Responsive Nav Toggle
	$('#responsive-nav-toggle').click(e => {
		const $this = $(e.currentTarget);
		$this.toggleClass('is-active');
	});

	// HEADER: Fade In Logo on Home Page
	$(window).on('load', () => {
		if ($('body').hasClass('page-template-page-home')) {
			$('.logo-header').addClass('logo-home');
		}
	});
	$(window).on('scroll resize', () => {
		if ($('body').hasClass('page-template-page-home')) {
			const headerHeight = $('.module-slideshow').outerHeight();
			if($(window).scrollTop() > headerHeight) {
				$('.logo-header').addClass('is-scrolled');
			} else {
				$('.logo-header').removeClass('is-scrolled');
			}
		}
	});

	// MODULE: Slideshow
	$('.module-slideshow-wrap').slick({
		arrows: false,
		autoplay: true,
		autoplaySpeed: 9500,
		pauseOnHover: false,
		pauseOnFocus: false,
		fade: true,
		speed: 3500,
	});

	// MODULE: Testimonials
	$('.module-testimonials-wrap').slick({
		arrows: false,
		autoplay: true,
		pauseOnHover: false,
		pauseOnFocus: false,
		fade: true,
		dots: true,
		autoplaySpeed: 6500,
		speed: 1000,
	});

	// MODULE: Gallery Overlay
	$('#module-gallery-items li').on('click', (e) => {
		$('#module-gallery-overlay-image-inner').css('background-image', 'initial');
		const $this = $(e.currentTarget);
		const image = $this.data('image');
		const title = $this.find('.gallery-title').text();
		const caption = $this.find('.gallery-caption').text();
		const index = $this.index();
		$('#module-gallery-overlay-image-inner').css('background-image', `url(${image})`);
		$('#module-gallery-overlay-info h1').text(title);
		$('#module-gallery-overlay-info h2').text(caption);
		$('#module-gallery-overlay').addClass('is-active');
		$('#module-gallery-overlay-thumbs').slick('slickGoTo', parseInt(index));
	});
	$('#overlay-close').on('click', () => {
		$('#module-gallery-overlay').removeClass('is-active');
	});

	// MODULE: Gallery Thumbs
	$('#module-gallery-overlay-thumbs').slick({
		vertical: true,
		slidesToShow: 3,
		centerMode: true,
		focusOnSelect: true,
		speed: 1500,
	});
	$('#module-gallery-overlay-thumbs').on('afterChange', () => {
		const currentSlide = $('#module-gallery-overlay-thumbs').slick('slickCurrentSlide');
		const $list = $('#module-gallery-items li').eq(currentSlide);
		const image = $list.data('image');
		const title = $list.find('.gallery-title').text();
		const caption = $list.find('.gallery-caption').text();
		$('#module-gallery-overlay-image-inner').css('background-image', `url(${image})`);
		$('#module-gallery-overlay-info h1').text(title);
		$('#module-gallery-overlay-info h2').text(caption);
	});
	$('#module-gallery-overlay-thumbs').on('beforeChange', () => {
		const $text = $('#module-gallery-overlay-info h1');
		$text.text('Loading');
		setTimeout(() => { $text.text('Loading.'); }, 400);
		setTimeout(() => { $text.text('Loading..'); }, 800);
		setTimeout(() => { $text.text('Loading...'); }, 1200);
		$('#module-gallery-overlay-info h2').text('');
		$('#module-gallery-overlay-image-inner').css('background-image', 'initial');
	});


	// MODULES: Parallax
	$(window).on('load resize scroll', () => {
		const d_scroll = $(window).scrollTop();
		const w_height = $(window).height();
		$('.animate-parallax').each((i, e) => {
			const $this = $(e);
			const $thisBg = $this.find('.module-bg');
			const p_position = $this.offset().top;
			const e_height = $this.outerHeight();
			const ebg_height = $this.find('.module-bg').outerHeight();
			const bg_diff = ebg_height - e_height;
			const dhit_in = p_position - w_height;
			const dhit_out = p_position + e_height;
			const dhit_read = p_position - w_height - d_scroll;
			// Boolean hit Check
			if (dhit_read <= 0 && d_scroll <= dhit_out) {
				const per_scrolled = (d_scroll - dhit_in) / (dhit_out - dhit_in);
				const offset = (bg_diff * per_scrolled);
				$thisBg.css('transform', `translateY(-${offset}px)`);
			}
		});
	});

	// MODULES: Animate onScreen
	$(window).on('load resize scroll', () => {
		$('.animate-on-enter').each((i, el) => {
			const $this = $(el);
			if ($this.visible(true)) {
				$this.addClass('is-visible');
			}
		});
		$('.animate-on-leave').each((i, el) => {
			const $this = $(el);
			if (!$this.visible(true)) {
				$this.removeClass('is-visible');
			}
		});
	});

	// TEMPLATE: Contact Error Handling
	$('.wpcf7-response-output').click(e => {
		$(e.currentTarget).fadeOut();
	});
	$('.wpcf7-form-control-wrap input, .wpcf7-form-control-wrap textarea').on('focus', e => {
		$(e.currentTarget).next('span').fadeOut();
	})
});
