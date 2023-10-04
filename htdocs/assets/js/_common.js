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

		const initEventName = $('main').attr('data-init-event');
		if (initEventName !== '') {
			eventObj = new $.Event(initEventName);
			$(window).trigger(eventObj);
		}

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
