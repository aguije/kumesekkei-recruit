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
								duration: .3,
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
						duration: .3,
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
			const is_top = ($('main.p-top').length > 0) ? true : false;

			const resize = () => {
				if (is_top) {
					border = GLOBAL.wH - $gh.find('.p-gh__bar').height() - 1;
				}
				else {
					let h = 600;
					if (GLOBAL.wW < 1120) {
						h = 600 * GLOBAL.wW / 1120;
					}

					border = h;
				}
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
				const $this = $(this);
				const id = $this.attr('href');

				if (id.charAt(0) === '#') {
					_event.preventDefault();

					if ($this.attr('data-offset') && $this.attr('data-offset') === '0') {
						gsap.to(window, {
							duration: .6,
							scrollTo: { y: id }
						});
					}
					else {
						gsap.to(window, {
							duration: .6,
							scrollTo: { y: id, offsetY: $('#gh .p-gh__bar').height() }
						});
					}
				}
			});
		}
		else {
			$('.c-page-nav a').off();
		}
	};


	/** =================================================================
	 *
	 * Run a callback after the user scrolls, calculating the distance and direction scrolled
	 * (c) 2019 Chris Ferdinandi, MIT License, https://gomakethings.com
	 * @param  {Function} callback The callback function to run
	 * @param  {Integer}  refresh  How long to wait between scroll events [optional]
	 *
	 * FYI: https://codepen.io/cferdinandi/pen/BEOVOa
	 *
	 * --------------------------------------------------------------- */

	const get_scroll_distance = (_option) => {
		_option = Object.assign({
			callback: function () { return true; },
			refresh: 90,
			className: ''
		}, _option);

		let isScrolling, start, end, distance;

		let eventName = (GLOBAL.is_mobile) ? `touchmove touchend scroll` : 'scroll';
		if (_option.className !== '') {
			eventName = (GLOBAL.is_mobile) ? `touchstart.${_option.className} touchmove.${_option.className} touchend.${_option.className} scroll.${_option.className}` : `scroll.${_option.className}`;
		}

		$(window).on(eventName, function () {
			if (!start) {
				start = window.pageYOffset;
			}

			$.clearAnimationFrameTimeout(isScrolling);

			isScrolling = $.setAnimationFrameTimeout(function() {
				end = window.pageYOffset;
				distance = end - start;

				_option.callback(distance, start, end);

				start = null;
				end = null;
				distance = null;

			}, _option.refresh);
		});
	};


	/** =================================================================
	 *
	 * LEAD
	 *
	 * --------------------------------------------------------------- */

	const initLead = (_option) => {
		_option = Object.assign({
			mode: null,
			complete: function () { return true; }
		}, _option);

		if (_option.mode === true) {
			let scroll_delta = 0;
			const $lead = $('.p-lead');

			const ui_display = () => {
				// ページ下方へ移動した場合 UI を隠す
				if (scroll_delta > 0) {
					if (!$lead.hasClass('ui--hidden')) {
						$lead.addClass('ui--hidden')
					}
				}

				// ページ情報へ移動した場合 UI を表示
				else if (scroll_delta <= 0) {
					if ($lead.hasClass('ui--hidden')) {
						$lead.removeClass('ui--hidden')
					}
				}
			};


			/** =================================================================
			 * MAIN
			 * --------------------------------------------------------------- */

			if ($lead.length > 0) {
				get_scroll_distance({
					callback: (_distance) => {
						if (_distance < 0) {
							if (scroll_delta >= 0) { scroll_delta = 0; }
						}
						else {
							if (scroll_delta < 0) { scroll_delta = 0; }
						}

						scroll_delta = scroll_delta + _distance;

						ui_display();
					},
					interval: 5,
					className: 'lead'
				});
			}


		}
		else {

			$(window).off('scroll.lead');
			$(window).off('touchstart.lead');
			$(window).off('touchmove.lead');
			$(window).off('touchend.lead');
			$(window).off('resize.lead');

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
		initLead({ mode: true });
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

});
