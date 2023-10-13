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
	 * INITIALIZE WORKPLACE MODAL
	 *
	 * --------------------------------------------------------------- */

	const initWorkplaceModal = () => {
		$('.p-workplace-modal').each(function () {
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
