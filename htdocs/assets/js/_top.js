/* ==================================================================
 *
 * TOP
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

$(function () {

	/** =================================================================
	 *
	 * HERO
	 *
	 * --------------------------------------------------------------- */

	function initHero (_option) {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			const swiper = new Swiper('.p-hero .swiper', {
				init: false,
				autoHeight: 0,
				loop: 1,
				autoplay: {
					delay: 6000
				},
				effect: 'fade',
				fadeEffect: {
					crossFade: true
				},
				pagination: {
					el: '.p-hero .swiper-pagination'
				},
				navigation: 0,
				scrollbar: 0
			});

			swiper.init();
			GLOBAL.swipers.push(swiper);

			//

			$('.p-hero__arrow').on('click', function () {
				gsap.to(window, {
					duration: .6,
					scrollTo: { y: '.p-news', offsetY: $('#gh .p-gh__bar').height() }
				});
			});
		}
		else {

		}
	}


	/** =================================================================
	 *
	 * ABOUT
	 *
	 * --------------------------------------------------------------- */

	function initAbout (_option) {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			const swiperUpper = new Swiper('.p-about__item__sub .swiper-parent.is--upper .swiper', {
				init: 0,
				autoHeight: 0,
				loop: 1,
				pagination: {
					el: '.p-about__item__sub .swiper-parent.is--upper .swiper-pagination'
				},
				navigation: 0,
				scrollbar: 0
			});

			const swiperLower = new Swiper('.p-about__item__sub .swiper-parent.is--lower .swiper', {
				init: 0,
				autoHeight: 0,
				loop: 1,
				pagination: 0,
				navigation: 0,
				scrollbar: 0
			});

			swiperUpper.init();
			GLOBAL.swipers.push(swiperUpper);

			swiperLower.init();
			GLOBAL.swipers.push(swiperLower);

			swiperUpper.controller.control = [swiperLower];
			swiperLower.controller.control = [swiperUpper];
		}
		else {

		}
	}


	/** =================================================================
	 *
	 * PEOPLE
	 *
	 * --------------------------------------------------------------- */

	function initPeople (_option) {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {

			/** =================================================================
			 * CROSSTALK
			 * --------------------------------------------------------------- */

			const swiper = new Swiper('.p-people__crosstalk .swiper', {
				init: 0,
				autoHeight: 0,
				loop: 1,
				pagination: {
					el: '.p-people__crosstalk .swiper-pagination'
				},
				navigation: 0,
				scrollbar: 0
			});

			swiper.init();
			GLOBAL.swipers.push(swiper);


			/** =================================================================
			 * INTERVIEW
			 * --------------------------------------------------------------- */

			$('.p-people__interview__article a').on('click', function (_event) {
				_event.preventDefault();
				_event.stopPropagation();

				if (GLOBAL.is_process === true) { return false; }
				GLOBAL.is_process = true;

				const video_id = $(this).attr('data-video-id');

				const player = new YT.Player('player', {
					videoId: video_id
				});

				GLOBAL.methods.util.display_modal({
					mode : true,
					complete: function () {

						GLOBAL.is_process = false;

					}
				});

				$('.p-modal .p-modal__close').on('click.modal', function (_event) {
					_event.preventDefault();
					_event.stopPropagation();

					$('.p-modal .p-modal__close').off('click.modal');
					$(document).off('click.modal');

					player.stopVideo();

					GLOBAL.methods.util.display_modal({
						mode : false,
						complete: function () {

							player.destroy();

						}
					});
				});

				$(document).on('click.modal', function (_event) {
					if (!$.contains($('.p-modal__wrapper')[0], _event.target)) {
						_event.preventDefault();
						_event.stopPropagation();

						$('.p-modal .p-modal__close').trigger('click.modal');
					}
				});
			});

		}
		else {

		}
	}


	/** =================================================================
	 *
	 * STORY
	 *
	 * --------------------------------------------------------------- */

	function initStory (_option) {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			const swiper = new Swiper('.p-story__slides .swiper', {
				init: 0,
				initialSlide: 1,
				autoHeight: 0,
				loop: 0,
				pagination: 0,
				navigation: 0,
				scrollbar: 0,
				allowTouchMove: 0
			});

			swiper.init();
			GLOBAL.swipers.push(swiper);

			//

			$('.p-story article').each(function () {
				$(this).on('mouseenter', function () {
					const index = $(this).index();
					swiper.slideTo(index);
				});
			});
		}
		else {

		}
	}


	/* ==================================================================
	 *
	 *
	 * INITIALIZE
	 *
	 *
	 * --------------------------------------------------------------- */

	function init () {
		initHero({ mode: true });
		initAbout({ mode: true });
		initPeople({ mode: true });
		initStory({ mode: true });
	}


	/* ==================================================================
	 *
	 *
	 * EVENTS
	 *
	 *
	 * --------------------------------------------------------------- */

	$(window).on('initTop', function () {
		console.log(' ');
		console.log('EVENT: initTop');

		init();
	});

	$(window).on('unloadTop', function () {
		console.log(' ');
		console.log('EVENT: unloadTop');

	});

});
