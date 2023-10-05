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

	function initPeopleEmployee () {
		GLOBAL.methods.util.lazy({
			mode: true,
			wrapper: '.c-lazy-trigger'
		});

		(function () {
			$('.p-people__employee__article__schedule').each(function () {
				const $this = $(this);
				const $nav = $(this).find('nav');

				const randRange = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);

				const swiper = new Swiper($(this).find('.swiper')[0], {
					init: 0,
					autoHeight: 1,
					autoplay: 0,
					loop: 0,
					pagination: 0,
					navigation: 0,
					scrollbar: 0
				});

				swiper.on('slideChange', function () {
					const cookie_name = $this.attr('data-cookie-name');

					$nav.find('li').eq(swiper.activeIndex).addClass('is--active');
					$nav.find('li').eq(swiper.activeIndex).siblings().removeClass('is--active');

					Cookies.set(cookie_name, swiper.activeIndex, { path: '/' });
				});

				swiper.on('init', function () {
					const cookie_name = $this.attr('data-cookie-name');
					let saved_index = Cookies.get(cookie_name);

					if (saved_index) {
						saved_index = parseInt(saved_index);
					}
					else {
						saved_index = randRange(0, $nav.find('li').length - 1);
						Cookies.set(cookie_name, saved_index, { path: '/' });
					}

					//

					$nav.find('a').on('click', function (_event) {
						_event.preventDefault();

						const index = parseInt($(this).attr('data-index'));
						swiper.slideTo(index);
					});

					swiper.slideTo(saved_index, 0);
				});

				swiper.init();
			});
		})();
	}

	function initPeopleCrosstalk () {
		$('.p-people__crosstalk__article__more a').on('click', function (_event) {
			_event.preventDefault();

			const $chapters = $(this).closest('.p-people__crosstalk__article__chapters');

			if (!$chapters.hasClass('is--opened')) {
				$chapters.addClass('is--opened');

				gsap.to($chapters, {
					duration: .9,
					height: $chapters.find('.p-people__crosstalk__article__chapters__container').height(),
					onComplete: () => {
						$chapters.find('.p-people__crosstalk__article__more').remove();
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

	$(window).on('initPeopleEmployee', function () {
		console.log(' ');
		console.log('EVENT: initPeopleEmployee');

		initPeopleEmployee();
	});

	$(window).on('initPeopleCrosstalk', function () {
		console.log(' ');
		console.log('EVENT: initPeopleCrosstalk');

		initPeopleCrosstalk();
	});

});
