/* ==================================================================
 *
 * UI
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

$(function () {

	/** =================================================================
	 *
	 * MENU
	 *
	 * --------------------------------------------------------------- */

	function initMenu () {
		let ticking = false;

		const $gf_main_items = $('#gf .p-gm .p-gm__list.is--main > li');
		const $main_items = $('.p-gm .p-gm__list.is--main > li');

		const resize = () => {
			let main_item_h_array = [];
			let sub_item_h_array = [];

			$gf_main_items.each(function () {
				main_item_h_array.push($(this).find('h4').outerHeight());

				const $sub_items = $(this).find('.p-gm__list.is--sub > li');

				$sub_items.each(function (_i) {
					if (!sub_item_h_array[_i]) {
						sub_item_h_array[_i] = [];
					}
					sub_item_h_array[_i].push($(this).find('> a').outerHeight());
				});
			});

			//

			const main_item_h_max = Math.max.apply(null, main_item_h_array);
			$main_items.find('h4').css('height', main_item_h_max);

			//

			$.each(sub_item_h_array, function (_index, _array) {
				const sub_item_h_max = Math.max.apply(null, _array);

				$main_items.each(function () {
					const $sub_items = $(this).find('.p-gm__list.is--sub > li');
					$sub_items.eq(_index).css('height', sub_item_h_max);
				});
			});
		};

		$(window).on('resize.menu', function () {
			if (!ticking) {
				window.requestAnimationFrame(function () {
					resize();
					ticking = false;
				});

				ticking = true;
			}
		});

		resize();
	}


	/* ==================================================================
	 *
	 *
	 * INITIALIZE
	 *
	 *
	 * --------------------------------------------------------------- */

	function init () {
		initMenu();
	}


	/* ==================================================================
	 *
	 *
	 * EVENTS
	 *
	 *
	 * --------------------------------------------------------------- */

	$(window).on('initUI', function () {
		console.log(' ');
		console.log('EVENT: initUI');

		init();
	});

	$(window).on('unloadUI', function () {
		console.log(' ');
		console.log('EVENT: unloadUI');

	});

});
