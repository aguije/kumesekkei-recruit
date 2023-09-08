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
			opacity: .5,
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

