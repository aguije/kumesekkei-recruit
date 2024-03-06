/* ==================================================================
 *
 * ABOUT
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

$(function () {

	/* ==================================================================
	 *
	 *
	 * INITIALIZE
	 *
	 *
	 * --------------------------------------------------------------- */

	function initAbout () {
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});
	}

	function initAboutCsr () {
		const $nav_links = $('.p-about__csr__nav a');

		const set_active = (_hash) => {
			const $active = $nav_links.filter(`[href="${_hash}"]`);
			const $siblings = $active.closest('li').siblings().find('a');

			$active.addClass('is--active');
			$siblings.removeClass('is--active');
		};

		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});

		$('.p-about__csr__nav').find('a').on('click', function (_event) {
			_event.preventDefault();

			const hash = $(this).attr('href');

			gsap.to(window, {
				duration: .6,
				scrollTo: { y: hash },
				onComplete: () => {
					set_active(hash);
					window.location.hash = hash;
				}
			});
		});

		$(function(){
			var hash = window.location.hash;

			gsap.to(window, {
				duration: .6,
				scrollTo: { y: hash }
			});

			set_active(hash);
		});
	}

	function initAboutStats () {
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});

		$('.p-about__stats__article__sections nav a').on('click', function (_event) {
			_event.preventDefault();

			gsap.to(window, {
				duration: .6,
				scrollTo: { y: $(this).attr('href') }
			});
		});

		GLOBAL.methods.util.initStatsSwiper();

		$('.p-about__stats__belt a').on('click', function (_event) {
			_event.preventDefault();

			gsap.to(window, {
				duration: .6,
				scrollTo: { y: $(this).attr('href') }
			});
		});
	}


	/* ==================================================================
	 *
	 *
	 * EVENTS
	 *
	 *
	 * --------------------------------------------------------------- */

	$(window).on('initAbout', function () {
		console.log(' ');
		console.log('EVENT: initAbout');

		initAbout();
	});

	$(window).on('initAboutCsr', function () {
		console.log(' ');
		console.log('EVENT: initAboutCsr');

		initAboutCsr();
	});

	$(window).on('initAboutStats', function () {
		console.log(' ');
		console.log('EVENT: initAboutStats');

		initAboutStats();
	});

});
