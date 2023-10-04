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

	function initPeople () {
		GLOBAL.methods.util.initMovieThumb({ mode: true });
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});
	}

	function initPeopleCrosstalk () {
		$('.p-crosstalk-article__more a').on('click', function (_event) {
			_event.preventDefault();

			const $chapters = $(this).closest('.p-crosstalk-article__chapters');

			if (!$chapters.hasClass('is--opened')) {
				$chapters.addClass('is--opened');

				gsap.to($chapters, {
					duration: .9,
					height: $chapters.find('.p-crosstalk-article__chapters__container').height(),
					onComplete: () => {
						$chapters.find('.p-crosstalk-article__more').remove();
						$chapters.css({ height: 'auto' });
					}
				});
			}
			else {
				$chapters.removeClass('is--opened');
			}
		});

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

	$(window).on('initPeople', function () {
		console.log(' ');
		console.log('EVENT: initPeople');

		initPeople();
	});

	$(window).on('initPeopleCrosstalk', function () {
		console.log(' ');
		console.log('EVENT: initPeopleCrosstalk');

		initPeopleCrosstalk();
	});

});
