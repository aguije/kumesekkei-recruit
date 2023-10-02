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

	function unloadMessage () {

	}

	function initCrosstalkSingle () {

	}

	function unloadCrosstalkSingle () {

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

	$(window).on('unloadMessage', function () {
		console.log(' ');
		console.log('EVENT: unloadMessage');

		unloadMessage();
	});

	$(window).on('initCrosstalkSingle', function () {
		console.log(' ');
		console.log('EVENT: initCrosstalkSingle');

		initCrosstalkSingle();
	});

	$(window).on('unloadCrosstalkSingle', function () {
		console.log(' ');
		console.log('EVENT: unloadCrosstalkSingle');

		unloadCrosstalkSingle();
	});

});
