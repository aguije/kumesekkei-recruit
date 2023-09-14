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
 * LAZY IMAGE LOADING
 *
 * --------------------------------------------------------------- */

GLOBAL.methods.util.lazy = function (_option) {
	_option = Object.assign({
		mode: true,
		wrapper: null,
		complete: function () { return true; }
	}, _option);

	if (_option.mode === true) {
		if ($(_option.wrapper).attr('data-lazy') === 'processed') { return false; }

		let mIO = new MultipleIO($(_option.wrapper).find('img[data-src]'), {
			onEnter: (_element) => {

				const img = _element;

				if ($(img).hasClass('is--loaded')) { return false; }

				ajaxWorker({
					url: img.getAttribute('data-src'),
					dataType: 'image',
					elementType: 'blob',
					success: function (_response) {
						//console.log('success', _response, _status);

						let blobsrc = URL.createObjectURL(_response);
						img.onload = function () {
							this.onload = void 0;
							URL.revokeObjectURL(blobsrc);
						}
						img.src = blobsrc;


					},
					error: function () {
						// console.log('error', _status, _statusText, _message);


					},
					complete: function () {
						// img.removeAttribute('data-src');

						img.classList.add('is--loaded');
					}
				});

			},
			triggerOnce: true
		});
		GLOBAL.observers.push(mIO);

		$(_option.wrapper).attr('data-lazy', 'processed');
	}
	else if (_option.mode === false) {

	}
};


/** =================================================================
 *
 * LAZY IMAGE LOADING (ALL)
 *
 * --------------------------------------------------------------- */

GLOBAL.methods.util.lazyall = function (_option) {
	_option = Object.assign({
		mode: true,
		wrapper: null,
		worker: false,
		swiper: false,
		complete: function () { return true; }
	}, _option);

	if (_option.mode === true) {
		const $wrapper = $(_option.wrapper);
		const $images = $wrapper.find('img[data-src]');

		if (_option.swiper) {
			const $spinner = $('<p class="c-spinner"><img src="/assets/images/spinner--black.svg" alt=""></p>');
			$wrapper.append($spinner);
		}

		let promises = [];

		$images.each(function () {
			const img = $(this)[0];

			const promise = new Promise(function (resolve, reject) {

				if (_option.worker === true) {
					ajaxWorker({
						url: img.getAttribute('data-src'),
						dataType: 'image',
						elementType: 'blob',
						success: function (_response) {
							//console.log('success', _response, _status);

							let blobsrc = URL.createObjectURL(_response);
							img.onload = function () {
								this.onload = void 0;
								URL.revokeObjectURL(blobsrc);
							}
							img.src = blobsrc;

							resolve();
						},
						error: function () {
							// console.log('error', _status, _statusText, _message);

							reject();
						},
						complete: function () {
							// img.removeAttribute('data-src');

							img.classList.add('is--loaded');
						}
					});
				}
				else {
					img.onload = function () {
						img.onload = void 0;
						img.classList.add('is--loaded');

						resolve();
					};

					img.onerror = function () {
						img.onerror = void 0;

						reject();
					};

					img.src = img.getAttribute('data-src');
				}

			});
			promises.push(promise);

		});

		Promise.all(promises).then(function () {
			if (_option.swiper) {
				gsap.to($wrapper.find('.c-spinner'), {
					opacity: 0,
					onComplete: function () {
						$wrapper.find('.c-spinner').remove();

						_option.complete();
					}
				})
			}
			else {
				_option.complete();
			}
		});
	}
	else if (_option.mode === false) {

	}

};


GLOBAL.methods.util.showInsetMask = function (_option) {
	_option = Object.assign({
		mode: true,
		target: null,
		stagger: 0,
		complete: function () { return true; }
	}, _option);

	if (_option.mode === true) {
		$(_option.target).each(function (_index) {

			const $this = $(this);
			let tween = { value: 100 };

			gsap.to(tween, {
				value: 0,
				duration: .6,
				delay: _option.stagger * _index,
				onUpdate: function () {
					$this.css({ clipPath: `inset(0% ${tween.value}% 0% 0%)` });
				},
				onComplete: function () {
					gsap.to($this.find('.is--mask'), {
						translateX: '100%',
						duration: .3
					});
				}
			})

		});
	}
	else if (_option.mode === false) {

	}
};
