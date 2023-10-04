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
