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
			(function () {
				let mIO = new MultipleIO('.p-hero .swiper', {
					onEnter: () => {

						const promises = [
							new Promise(function (resolve) {
								$('.p-hero .p-hero__body').imagesLoaded(function () {
									resolve();
								});
							}),
							new Promise(function (resolve) {
								GLOBAL.methods.util.lazyall({
									mode: true,
									wrapper: '.p-hero .swiper',
									worker: false,
									swiper: true,
									complete: function () {
										resolve();
									}
								});
							})
						];

						Promise.all(promises).then(function () {
							GLOBAL.methods.util.showInsetMask({
								mode: true,
								stagger: .15,
								target: '.p-hero .p-hero__body .c-inset-mask'
							});

							//

							const swiper = new Swiper('.p-hero .swiper', {
								init: false,
								autoHeight: 0,
								loop: 1,
								autoplay: {
									delay: 6000,
									disableOnInteraction: false
								},
								effect: 'fade',
								fadeEffect: {
									crossFade: true
								},
								pagination: {
									el: '.p-hero .swiper-pagination',
									clickable: 1
								},
								navigation: 0,
								scrollbar: 0,
								allowTouchMove: 0
							});

							/*
							swiper.on('slideChange', function () {
								$('.p-hero__lead').find('.c-progress').remove();

								$('.p-hero__lead').append(`
									<svg class="c-progress" viewBox="0 0 63.6619772368 63.6619772368">
										<circle cx="31.8309886184" cy="31.8309886184" r="15.9154943092" fill="transparent" stroke="#000000" stroke-dashoffset="25" stroke-width="1" stroke-dasharray="0 100"></circle>
									</svg>
								`);
							});
							*/

							swiper.init();
							GLOBAL.swipers.push(swiper);
						});
					},
					onLeave: () => {

					},
					triggerOnce: true
				});
				GLOBAL.observers.push(mIO);
			})();

			//

			(function () {
				const $swiper = $('.p-hero .swiper');

				const threshold = [];
				for (let i = 0; i <= 1.0; i += 0.005) {
					threshold.push(i);
				}

				let ticking = false;
				const start_ratio = .95;

				let mIO = new MultipleIO('.p-hero', {
					config: {
						threshold: threshold
					},
					onEnter: (_entry, _ratio) => {
						if (!ticking) {
							window.requestAnimationFrame(function () {
								if (_ratio < .95) {
									$swiper.css({ transform: `translateY(${(1 - (_ratio + (1 - start_ratio))) * .3 * 100}%)` });
								}
								else {
									$swiper.css({ transform: `translateY(0%)` });
								}

								ticking = false;
							});

							ticking = true;
						}
					},
					onLeave: () => {

					},
					triggerOnce: false
				});
				GLOBAL.observers.push(mIO);
			})();

			//

			$('.p-hero__arrow').on('click', function () {
				gsap.to(window, {
					duration: .6,
					scrollTo: { y: '.p-news', offsetY: $('#gh .p-gh__bar').height() }
				});
			});
		}
		else {
			$('.p-hero__arrow').off('click');
		}
	}


	/** =================================================================
	 *
	 * ABOUT
	 *
	 * --------------------------------------------------------------- */

	function initNews (_option) {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			$('.p-news__item').on('click', function (_event) {
				_event.preventDefault();

				window.open($(this).find('h4 > a'));
			});
		}
		else {
			$('.p-news__item').off('click');
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
			(function () {
				let mIO = new MultipleIO('.p-about__item__sub', {
					onEnter: () => {

						GLOBAL.methods.util.lazyall({
							mode: true,
							wrapper: '.p-about__item__sub',
							worker: false,
							complete: function () {

								const swiperUpper = new Swiper('.p-about__item__sub .swiper-parent.is--upper .swiper', {
									init: 0,
									autoHeight: 0,
									autoplay: {
										delay: 4500,
										disableOnInteraction: false
									},
									loop: 1,
									pagination: {
										el: '.p-about__item__sub .swiper-parent.is--upper .swiper-pagination',
										clickable: 1
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
									scrollbar: 0,
									allowTouchMove: 0
								});

								swiperUpper.init();
								GLOBAL.swipers.push(swiperUpper);

								swiperLower.init();
								GLOBAL.swipers.push(swiperLower);

								swiperUpper.controller.control = [swiperLower];

							}
						});

					},
					onLeave: () => {

					},
					triggerOnce: true
				});
				GLOBAL.observers.push(mIO);
			})();

			(function () {
				const $chart = $('.p-about__stats__figs .c-chart');

				let mIO = new MultipleIO('.p-about__stats__figs', {
					config: {
						threshold: .5
					},
					onEnter: () => {
						$chart.removeClass('is--out');
					},
					onLeave: () => {
						$chart.addClass('is--out');
					}
				});
				GLOBAL.observers.push(mIO);

			})();
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
			 * THEME COLOR
			 * --------------------------------------------------------------- */

			let mIO = new MultipleIO('.p-top .p-people', {
				config: {
					rootMargin: '-50% 0%'
				},
				onEnter: (_element) => {
					_element.setAttribute('data-theme', 'dark');
				},
				onLeave: (_element) => {
					_element.setAttribute('data-theme', 'light');
				},
				triggerOnce: false
			});
			GLOBAL.observers.push(mIO);


			/** =================================================================
			 * CROSSTALK
			 * --------------------------------------------------------------- */

			const swiper = new Swiper('.p-people__crosstalk .swiper', {
				init: 0,
				autoHeight: 0,
				autoplay: {
					delay: 4500,
					disableOnInteraction: false
				},
				loop: 1,
				pagination: {
					el: '.p-people__crosstalk .swiper-pagination',
					clickable: 1
				},
				navigation: 0,
				scrollbar: 0
			});

			swiper.on('slideChange', function () {
				GLOBAL.methods.util.lazy({
					mode: true,
					wrapper: swiper.slides[swiper.activeIndex]
				});
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
				const video_start = ($(this).attr('data-video-start')) ? parseInt($(this).attr('data-video-start')) : 0;

				const player = new YT.Player('player', {
					videoId: video_id,
					playerVars: {
						start: video_start
					}
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
			$('.p-people__interview__article a').off('click');
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

			swiper.on('slideChange', function () {
				GLOBAL.methods.util.lazy({
					mode: true,
					wrapper: swiper.slides[swiper.activeIndex]
				});
			});

			swiper.init();
			GLOBAL.swipers.push(swiper);

			//

			$('.p-story article').on('mouseenter', function () {
				const index = $(this).index();
				swiper.slideTo(index);
			});
		}
		else {
			$('.p-story article').off('mouseenter');
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
		initNews({ mode: true });
		initAbout({ mode: true });
		initPeople({ mode: true });
		initStory({ mode: true });

		GLOBAL.methods.util.initInviewBorder({ mode: true });
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});
	}

	function unload () {
		GLOBAL.methods.util.destroyObservers();
		GLOBAL.methods.util.destroySwipers();

		initHero({ mode: false });
		initNews({ mode: false });
		initAbout({ mode: false });
		initPeople({ mode: false });
		initStory({ mode: false });

		GLOBAL.methods.util.initInviewBorder({ mode: false });
		GLOBAL.methods.util.lazy({
			mode: false,
			wrapper: '.c-lazy-trigger'
		});
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

		unload();
	});

});
