/** =================================================================
 *
 * METHODS - UTIL
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

/** =================================================================
 *
 * DESTROY OBSERVERS
 *
 * --------------------------------------------------------------- */

GLOBAL.methods.util.destroyObservers = function () {
	console.log(`destroyObservers: ${GLOBAL.observers.length} observers.`);

	GLOBAL.observers.forEach(function (_mIO, _index) {
		if (typeof _mIO === 'object' && _mIO.destroy) {
			_mIO.destroy();

			delete GLOBAL.observers[_index];
		}
	});

	GLOBAL.observers = [];
};


/** =================================================================
 *
 * DESTROY SWIPERS
 *
 * --------------------------------------------------------------- */

GLOBAL.methods.util.destroySwipers = function () {
	console.log(`destroySwipers: ${GLOBAL.swipers.length} swipers.`);

	GLOBAL.swipers.forEach(function (_swiper, _index) {
		_swiper.destroy();

		delete GLOBAL.swipers[_index];
	});

	GLOBAL.swipers = [];
};


/** =================================================================
 *
 * MODAL
 *
 * --------------------------------------------------------------- */

GLOBAL.methods.util.display_modal = (_option) => {
	_option = Object.assign({
		mode: null,
		complete: function () { return true; }
	}, _option);

	if (_option.mode === true) {
		$('.p-modal').show();

		gsap.to('.p-modal__veil', {
			opacity: .8,
			duration: .6
		});

		gsap.fromTo('.p-modal__video', { scale: 1.05 }, {
			opacity: 1,
			scale: 1,
			duration: .6,
			delay: .3,
			onComplete: function () {
				_option.complete();
			}
		});
	}
	else {
		gsap.to('.p-modal__video', {
			opacity: 0,
			scale: 1.05,
			duration: .3
		});

		gsap.to('.p-modal__veil', {
			opacity: 0,
			duration: .6,
			onComplete: function () {
				$('.p-modal').hide();

				_option.complete();
			}
		});
	}
};


/** =================================================================
 *
 * MODAL VIDEL
 *
 * --------------------------------------------------------------- */

