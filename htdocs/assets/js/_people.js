/* ==================================================================
 *
 * PEOPLE
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

	function init () {
		GLOBAL.methods.util.initMovieThumb({ mode: true });
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});
	}

	function unload () {
		GLOBAL.methods.util.destroyObservers();
		GLOBAL.methods.util.destroySwipers();

		GLOBAL.methods.util.initMovieThumb({ mode: false });
		GLOBAL.methods.util.lazy({
			mode: false,
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

	$(window).on('initPeople', function () {
		console.log(' ');
		console.log('EVENT: initPeople');

		init();
	});

	$(window).on('unloadPeople', function () {
		console.log(' ');
		console.log('EVENT: unloadPeople');

		unload();
	});

});
