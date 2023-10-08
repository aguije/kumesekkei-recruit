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
								delay: 0,
								target: '.p-hero .p-hero__body h2.c-inset-mask'
							});

							GLOBAL.methods.util.showInsetMask({
								mode: true,
								delay: .15,
								target: '.p-hero .p-hero__body p > .c-inset-mask'
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
				let border_y;

				let ticking = false;

				const resize = () => {
					border_y = $('.p-hero').height();
					scroll();
				};

				$(window).on('resize.parallax', function () {
					if (!ticking) {
						window.requestAnimationFrame(function () {
							resize();
							ticking = false;
						});

						ticking = true;
					}
				});

				const scroll = () => {
					if (window.scrollY < border_y) {

						const start_ratio = .98;
						const ratio = 1 - window.scrollY / border_y;

						if (ratio < .98) {
							$swiper.css({ transform: `translateY(${(1 - (ratio + (1 - start_ratio))) * .333 * 100}%) translateZ(0)` });
						}
						else {
							$swiper.css({ transform: `translateY(0%) translateZ(0)` });
						}

					}
				};

				$(window).on('scroll.parallax touchmove.parallax', function () {
					if (!ticking) {
						window.requestAnimationFrame(function () {
							scroll();
							ticking = false;
						});

						ticking = true;
					}
				});

				resize();
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
									loop: 0,
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
									loop: 0,
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

			swiper.on('afterInit', function () {
				GLOBAL.methods.util.lazy({
					mode: true,
					wrapper: '.p-people__crosstalk .swiper'
				});
			});

			swiper.init();
			GLOBAL.swipers.push(swiper);


			/** =================================================================
			 * INTERVIEW
			 * --------------------------------------------------------------- */



		}
		else {
			$('.a.c-movie-thumb').off('click');
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

			swiper.on('afterInit', function () {
				GLOBAL.methods.util.lazy({
					mode: true,
					wrapper: '.p-story__slides .swiper'
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

		GLOBAL.methods.util.initMovieThumb({ mode: true });
		GLOBAL.methods.util.initInviewBorder({ mode: true });
		GLOBAL.methods.util.lazy({
			mode: true,
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

});
