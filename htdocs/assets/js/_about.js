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

	function initMessage () {
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});
	}

	function initCsr () {
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
		});
	}


	/* ==================================================================
	 *
	 *
	 * EVENTS
	 *
	 *
	 * --------------------------------------------------------------- */

	$(window).on('initMessage', function () {
		console.log(' ');
		console.log('EVENT: initMessage');

		initMessage();
	});

	$(window).on('initCsr', function () {
		console.log(' ');
		console.log('EVENT: initCsr');

		initCsr();
	});

});
