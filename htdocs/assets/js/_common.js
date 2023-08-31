/* ==================================================================
 *
 * COMMON
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */


$(function () {

	/* ==================================================================
	 *
	 * INITIALIZE
	 *
	 * --------------------------------------------------------------- */

	function init () {

		/** --------------------------------
		 * GSAP */

		gsap.defaults({ ease: 'power2.inOut' });


		/** --------------------------------
		 * EVENT DISPATCH */

		let eventObj = new $.Event('initUI');
		$(window).trigger(eventObj);

		eventObj = new $.Event('initTop');
		$(window).trigger(eventObj);

	}

	function unload () {

	}

	$(window).on('initCommon', function () {
		console.log(' ');
		console.log('EVENT: initCommon');

		init();
	});

	$(window).on('unloadCommon', function () {
		console.log(' ');
		console.log('EVENT: unloadCommon');

		unload();
	});

});
