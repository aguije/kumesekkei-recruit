/* ==================================================================
 *
 * UI
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

$(function () {

	/** =================================================================
	 *
	 * MENU
	 *
	 * --------------------------------------------------------------- */

	const initMenu = () => {

		const $main_items = $('.p-gm .p-gm__list.is--main > li');

		/** =================================================================
		 * サイズ調整
		 * --------------------------------------------------------------- */

		(function () {
			let ticking = false;

			const $gf_main_items = $('#gf .p-gm .p-gm__list.is--main > li');

			const resize = () => {
				let main_item_h_array = [];
				let sub_item_h_array = [];

				$gf_main_items.each(function () {
					main_item_h_array.push($(this).find('h4').outerHeight());

					const $sub_items = $(this).find('.p-gm__list.is--sub > li');

					$sub_items.each(function (_i) {
						if (!sub_item_h_array[_i]) {
							sub_item_h_array[_i] = [];
						}
						sub_item_h_array[_i].push($(this).find('> a').outerHeight());
					});
				});

				//

				const main_item_h_max = Math.max.apply(null, main_item_h_array);
				$main_items.find('h4').css('height', main_item_h_max);

				//

				$.each(sub_item_h_array, function (_index, _array) {
					const sub_item_h_max = Math.max.apply(null, _array);

					$main_items.each(function () {
						const $sub_items = $(this).find('.p-gm__list.is--sub > li');
						$sub_items.eq(_index).css('height', sub_item_h_max);
					});
				});
			};

			$(window).on('resize.menu', function () {
				if (!ticking) {
					window.requestAnimationFrame(function () {
						resize();
						ticking = false;
					});

					ticking = true;
				}
			});

			resize();
		})();


		/** =================================================================
		 * リンクエリアの拡張
		 * --------------------------------------------------------------- */

		(function () {
			$main_items.on('click', function (_event) {
				_event.preventDefault();

				const $a = $(this).find('h4 > a');
				const url = $a.attr('href');
				const is_blank = ($a.attr('target') && $a.attr('target') === '_blank') ? true : false;

				if (is_blank) {
					window.open(url);
				}
				else {
					location.href = url;
				}
			});

			$main_items.find('a').on('click', function (_event) {
				_event.stopPropagation();
			});
		})();


		/** =================================================================
		 * メニューボタン
		 * --------------------------------------------------------------- */

		(function () {
			const $button = $('.p-sh__menu a');
			const $spans = $button.find('span');

			$button.on('click', function (_event) {
				_event.preventDefault();

				$button.addClass('is--disabled');

				if (!$gh.hasClass('is--opened')) {
					gsap.to($spans.eq(0), {
						width: '0%',
						duration: .3
					});
					gsap.to($spans.eq(1), {
						width: '0%',
						duration: .3,
						delay: .15,
						onComplete: function () {

							$spans.eq(0).css({
								backgroundColor: '#000000',
								width: '100%',
								transform: 'translateY(3px) rotate(45deg)'
							});
							$spans.eq(1).css({
								backgroundColor: '#000000',
								width: '100%',
								transform: 'translateY(-3px) rotate(135deg)'
							});

							gsap.to($button, {
								backgroundColor: '#ffffff',
								rotate: '180deg',
								dutation: .3,
								onComplete: function () {
									$button.removeClass('is--disabled');
								}
							});

							$gh.addClass('is--opened');

						}
					});
				}
				else {
					// $(document).off('click.menu');

					gsap.to($button, {
						backgroundColor: '#000000',
						rotate: '0deg',
						dutation: .3,
						onComplete: function () {

							$spans.eq(0).css({
								backgroundColor: '',
								width: '0%',
								transform: ''
							});
							$spans.eq(1).css({
								backgroundColor: '',
								width: '0%',
								transform: ''
							});

							gsap.to($spans.eq(0), {
								width: '100%',
								duration: .3 * .5
							});
							gsap.to($spans.eq(1), {
								width: '84%',
								duration: .3 * .5,
								delay: .15 * .5,
								onComplete: function () {
									$button.removeClass('is--disabled');
								}
							});

						}
					});

					$gh.removeClass('is--opened');
				}
			});
		})();

		(function () {
			let border = 0;
			let ticking = false;

			const resize = () => {
				border = GLOBAL.wH - $gh.find('.p-gh__bar').height() - 1;
			};

			const scroll = () => {
				if (window.pageYOffset >= border) {
					if (!$gh.hasClass('is--scrolled')) {
						$gh.addClass('is--scrolled');
					}
				}
				else {
					if ($gh.hasClass('is--scrolled')) {
						$gh.removeClass('is--scrolled');
					}
				}
			};

			$(window).on('resize.gh', function () {
				if (!ticking) {
					window.requestAnimationFrame(function () {
						scroll();
						ticking = false;
					});

					ticking = true;
				}
			});

			$(window).on('scrollend.gh', 90, function () {
				if (!ticking) {
					window.requestAnimationFrame(function () {
						scroll();
						ticking = false;
					});

					ticking = true;
				}
			});

			resize();
			scroll();
		})();

	}


	/* ==================================================================
	 *
	 * SCROLL TO TOP
	 *
	 * --------------------------------------------------------------- */

	function initScrollToTop () {
		let ticking = false;

		const $button = $('.p-scroll-to-top').find('a');

		$button.on('click.stt', function (_event) {
			_event.preventDefault();

			gsap.to(window, {
				duration: .6,
				scrollTo: { y: 0 }
			});
		});

		const scroll = () => {
			if (window.pageYOffset > GLOBAL.wH) {
				if (!$button.hasClass('is--active')) {
					$button.addClass('is--active');
				}
			}
			else {
				if ($button.hasClass('is--active')) {
					$button.removeClass('is--active');
				}
			}
		};

		$(window).on('scroll.stt', function () {
			if (!ticking) {
				window.requestAnimationFrame(function () {
					scroll();
					ticking = false;
				});

				ticking = true;
			}
		});
	}


	/** =================================================================
	 *
	 * THEME COLOR
	 *
	 * --------------------------------------------------------------- */

	const initThemeColorTransition = (_option) => {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			let mIO = new MultipleIO('[data-theme]', {
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
		}
		else {

		}
	};


	/** =================================================================
	 *
	 * PAGE NAVIGATION
	 *
	 * --------------------------------------------------------------- */

	const initPageNav = (_option) => {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			$('.c-page-nav a').on('click', function (_event) {
				const id = $(this).attr('href');

				if (id.charAt(0) === '#') {
					_event.preventDefault();

					gsap.to(window, {
						duration: .6,
						scrollTo: { y: id, offsetY: $('#gh .p-gh__bar').height() }
					});
				}
			});
		}
		else {
			$('.c-page-nav a').off();
		}
	};


	/* ==================================================================
	 *
	 *
	 * INITIALIZE
	 *
	 *
	 * --------------------------------------------------------------- */

	function init () {
		initMenu();
		initScrollToTop();
		initThemeColorTransition({ mode: true });
		initPageNav({ mode: true });
	}

	function unload () {
		initThemeColorTransition({ mode: false });
		initPageNav({ mode: false });
	}


	/* ==================================================================
	 *
	 *
	 * EVENTS
	 *
	 *
	 * --------------------------------------------------------------- */

	$(window).on('initUI', function () {
		console.log(' ');
		console.log('EVENT: initUI');

		init();
	});

	$(window).on('unloadUI', function () {
		console.log(' ');
		console.log('EVENT: unloadUI');

		unload();
	});

});
