/* ==================================================================
 *
 * WORK
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

$(function () {

	let swipers = {};

	let hash_array = [];
	$('.p-work__workplace__link').each(function () {
		hash_array.push($(this).attr('href'));
	});


	/** =================================================================
	 *
	 * DISPLAY
	 *
	 * --------------------------------------------------------------- */

	const displaySlide = (_option) => {
		_option = Object.assign({
			mode: null,
			modal: null,
			slide: null,
			complete: function () { return true; }
		}, _option);

		console.log(`_option`, _option);

		if (_option.mode === true) {
			const $modals = $('.p-workplace-modal');
			const $modal = $modals.filter(`[id="${_option.modal}"]`);
			const $others = $modals.filter(`:not([id="${_option.modal}"])`);
			const $slide = $modal.find(`[data-hash='${_option.slide}']`).eq(0);

			const swiper = swipers[_option.modal];
			const slide_index = parseInt($slide.attr('data-swiper-slide-index')) + 1;

			if (!$modal.hasClass('is--opened')) {
				$modal.addClass('is--opened')
			}

			$others.removeClass('is--opened');

			if (swiper.activeIndex !== slide_index) {
				swiper.slideTo(slide_index);
			}
			else {
				window.location.hash = `#${_option.slide}`;
			}
		}
		else {
			$('.p-workplace-modal')
				.css('pointer-events', 'none')
				.removeClass('is--opened')
			;
		}
	};


	/** =================================================================
	 *
	 * INITIALIZE ILLUSTRATION
	 *
	 * --------------------------------------------------------------- */

	const initIllustration = () => {
		const $navlinks = $('.p-work__workplace__map').find('a');
		const $overlays = $('.p-map-overlay');

		const $spinner = $('<p class="c-spinner"><img src="/assets/images/spinner--black.svg" alt=""></p>');
		$('.p-map-wrapper').append($spinner);

		const initEvent = () => {
			$navlinks
				.on('mouseenter', function () {
					if (!GLOBAL.is_spview) {
						const id = $(this).attr('href').replace('#', '');
						const $activeOverlay = $overlays.filter('[data-overlay="' + id + '"]');

						$activeOverlay.css('z-index', '1').addClass('is--active');
					}
				})
				.on('mouseleave', function () {
					if (!GLOBAL.is_spview) {
						$overlays.css('z-index', '').removeClass('is--active');
					}
				})
			;

			$('#hotspots .hotspot')
				.on('click', function () {
					if (!GLOBAL.is_spview) {
						const id = $(this).attr('data-overlay');
						location.hash = '#' + id;
					}
				})
				.on('mouseenter', function () {
					if (!GLOBAL.is_spview) {
						const id = $(this).attr('data-overlay');
						const $activeOverlay = $overlays.filter('[data-overlay="' + id + '"]');
						const $activeLink = $navlinks.filter('[href="#' + id + '"]');

						$activeOverlay.css('z-index', '1').addClass('is--active');
						$activeLink.addClass('is--active');
					}
				})
				.on('mouseleave', function () {
					if (!GLOBAL.is_spview) {
						$overlays.css('z-index', '').removeClass('is--active');
						$navlinks.removeClass('is--active');
					}
				})
			;
		};

		let mIO = new MultipleIO('.p-map-wrapper', {
			onEnter: () => {

				const promises = [
					new Promise(function (resolve, reject) {
						const img = new Image();
						const src = $('#illustration > image').attr('data-href');

						img.onload = function () {
							img.onload = null;
							resolve();

							$('#illustration > image').attr('xlink:href', src);
						};

						img.error = function () {
							img.error = null;
							reject();
						};

						img.src = src;
					})
				];

				$('.p-map-overlay img').each(function () {
					const $this = $(this);

					const promise = new Promise(function (resolve, reject) {
						$this[0].onload = function () {
							$this[0].onload = null;
							resolve();
						};

						$this[0].error = function () {
							$this[0].error = null;
							reject();
						};

						$this[0].src = $this.attr('data-src');
					});

					promises.push(promise);
				});

				Promise.all(promises).then(function () {
					gsap.to('.p-map-wrapper .c-spinner', {
						opacity: 0,
						duration: 1,
						onComplete: () => {
							$('.p-map-wrapper .c-spinner').remove();
						}
					});

					$('.p-work__workplace__map').removeClass('is--loading');

					initEvent();
				});

			},
			triggerOnce: true
		});
		GLOBAL.observers.push(mIO);
	};


	/** =================================================================
	 *
	 * INITIALIZE WORKPLACE MODAL
	 *
	 * --------------------------------------------------------------- */

	const initWorkplaceModal = () => {
		const $modals = $('.p-workplace-modal');

		$modals.each(function () {
			const $this = $(this);

			swipers[$this.attr('id')] = new Swiper($this.find('.swiper')[0], {
				init: 0,
				autoHeight: 1,
				autoplay: 0,
				loop: 1,
				pagination: 0,
				scrollbar: 0,
				navigation: {
					nextEl: $this.find('.swiper').find('.c-circle-arrow.is--next')[0],
					prevEl: $this.find('.swiper').find('.c-circle-arrow.is--prev')[0]
				},
				hashNavigation: {
					replaceState: 1
				}
			});

			swipers[$this.attr('id')].on('afterInit', function () {
				GLOBAL.methods.util.lazy({
					mode: true,
					wrapper: $this.find('.swiper')
				});
			});

			swipers[$this.attr('id')].init();
		});

		//

		/*
		$('.p-work__workplace__map').find('a').on('click', function (_event) {
			_event.preventDefault();

			const hash = $(this).attr('href');
			const modal = $(this).attr('data-modal');

			displaySlide({
				mode: true,
				modal: modal,
				slide: hash.replace('#', '')
			});
		});

		$('.p-work__workplace__link').on('click', function (_event) {
			_event.preventDefault();

			const hash = $(this).attr('href');
			const modal = $(this).attr('data-modal');

			displaySlide({
				mode: true,
				modal: modal,
				slide: hash.replace('#', '')
			});
		});
		*/

		$('.p-workplace-modal__veil').each(function () {
			$(this).on('click', function (_event) {
				_event.preventDefault();

				window.history.pushState(null, null, window.location.origin + window.location.pathname);

				displaySlide({
					mode: false
				});
			});
		});

		window.addEventListener('hashchange', function() {
			const hash = window.location.hash;

			if (hash_array.includes(hash)) {
				displaySlide({
					mode: true,
					modal: $(`.p-work__workplace__link[href="${hash}"]`).attr('data-modal'),
					slide: hash.replace('#', '')
				});
			}
			else {
				displaySlide({
					mode: false
				});
			}
		}, false);


		/** =================================================================
		 * ページロード時にhashが存在していた場合
		 * --------------------------------------------------------------- */

		(function () {
			const hash = window.location.hash;
			const $modal = $(`.p-work__workplace__link[href="${hash}"]`);

			if (hash_array.includes(hash)) {
				displaySlide({
					mode: true,
					modal: $modal.attr('data-modal'),
					slide: hash.replace('#', '')
				});
			}
		})();
	};


	/* ==================================================================
	 *
	 *
	 * INITIALIZE
	 *
	 *
	 * --------------------------------------------------------------- */

	function initWork () {
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});

		initIllustration();
		initWorkplaceModal();
	}

	function initWorkHrd () {
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});
	}

	function initWorkWelfare () {
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

	$(window).on('initWork', function () {
		console.log(' ');
		console.log('EVENT: initWork');

		initWork();
	});

	$(window).on('initWorkHrd', function () {
		console.log(' ');
		console.log('EVENT: initWorkHrd');

		initWorkHrd();
	});

	$(window).on('initWorkWelfare', function () {
		console.log(' ');
		console.log('EVENT: initWorkWelfare');

		initWorkWelfare();
	});

});
