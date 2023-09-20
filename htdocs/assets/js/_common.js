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

	$gh = $('#gh');


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

		if ($('main.p-top').length > 0) {
			eventObj = new $.Event('initTop');
			$(window).trigger(eventObj);
		}

		else if ($('main.p-people.is--index').length > 0) {
			eventObj = new $.Event('initPeople');
			$(window).trigger(eventObj);
		}

		else if ($('main.p-crosstalk.is--single').length > 0) {
			eventObj = new $.Event('initCrosstalkSingle');
			$(window).trigger(eventObj);
		}

	}

	function unload () {

	}


	/* ==================================================================
	 *
	 * EVENTS
	 *
	 * --------------------------------------------------------------- */

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


	/* ==================================================================
	 *
	 * SITE START
	 *
	 * --------------------------------------------------------------- */

	const promises = [
		new Promise(function (resolve) {
			GLOBAL.util.load_video_api({
				complete: function () {
					resolve();
				}
			});
		})
	];

	Promise.all(promises).then(function () {

		let eventObj = new $.Event('initCommon');
		$(window).trigger(eventObj);

	});

});
