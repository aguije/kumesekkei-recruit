// Avoid `console` errors in browsers that lack a console.
(function () {
	var method;
	var noop = function () { };
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		// Only stub undefined methods.
		if (!console[method]) {
			console[method] = noop;
		}
	}
}());


/** =================================================================
 *
 * Throttling requestAnimationFrame to a FPS
 * FYI: https://blog.oimo.io/2021/06/06/adjust-fps/
 *
 * --------------------------------------------------------------- */

((window) => {
	window.requestFrameRateAnimation = (_function, _fps) => {
		const UPDATE_LOAD_COEFF = 0.5;

		const fps = _fps || 30;
		const interval = 1000 / fps;
		let prev = performance.now() - interval;
		let loop_timer = {};

		(loop = () => {
			let then = performance.now();
			let updated = false;

			while (then - prev > interval * 0.5) {
				updated = true;
				prev += interval;

				const now = performance.now();
				const updateTime = now - then;

				if (updateTime > interval * UPDATE_LOAD_COEFF) {
					if (prev < now - interval) {
						prev = now - interval;
					}
					break;
				}
			}

			if (updated) {
				_function();
			}

			loop_timer.value = requestAnimationFrame(loop);
		})();

		return loop_timer;
	};

	window.cancelFrameRateAnimation = (_timer) => {
		if (typeof _timer === 'object') {
			window.cancelAnimationFrame(_timer.value);
		}
	};
})(window);


/* ==================================================================
 *
 * Multiple Intersection Observer Class
 *
 * --------------------------------------------------------------- */

class MultipleIO {
	#defaults = {
		onEnter: null,
		onLeave: null,
		triggerOnce: false,
		config: {}
	};

	#config = {
		root: null,
		rootMargin: '0px',
		threshold: 0
	};

	#enterTriggers = [];

	constructor(_target = null, _option = {}) {
		const that = this;

		if (typeof _target === 'string') {
			this.target = document.querySelectorAll(_target);
		}
		else {
			this.target = _target;
		}

		this.option = Object.assign(this.#defaults, _option);
		this.config = Object.assign(this.#config, _option.config);

		this.observer = new IntersectionObserver((_elements, _observerInstance) => {
			_elements.forEach((_element, _index) => {

				if (_element.isIntersecting) {
					if (that.#enterTriggers[_index] === undefined) {
						that.#enterTriggers[_index] = true;
					}
					if (that.option.triggerOnce) {
						_observerInstance.unobserve(_element.target);
					}
					if (that.option.onEnter && typeof that.option.onEnter === 'function') {
						that.option.onEnter(_element.target);
					}
				}
				else {
					if (that.#enterTriggers[_index] === true) {
						if (that.option.onLeave && typeof that.option.onLeave === 'function') {
							that.option.onLeave(_element.target);
						}
					}
				}

			});
		}, this.config);

		if (this.target instanceof jQuery) {
			this.target.each(function () {
				that.observer.observe($(this)[0]);
			});
		}
		else {
			if (NodeList.prototype.isPrototypeOf(this.target)) {
				this.target.forEach((_target) => {
					that.observer.observe(_target);
				})
			}
			else if (HTMLCollection.prototype.isPrototypeOf(this.target)) {
				[...this.target].forEach((_target) => {
					that.observer.observe(_target);
				});
			}
			else {
				that.observer.observe(this.target);
			}
		}
	}

	unobserve = (_target) => {
		this.observer.unobserve(_target);
	};

	destroy = () => {
		const that = this;

		if (this.target instanceof jQuery) {
			this.target.each(function () {
				that.observer.unobserve($(this)[0]);
			});
		}
		else {
			if (NodeList.prototype.isPrototypeOf(this.target)) {
				this.target.forEach((_target) => {
					that.observer.unobserve(_target);
				})
			}
			else if (HTMLCollection.prototype.isPrototypeOf(this.target)) {
				[...this.target].forEach((_target) => {
					that.observer.unobserve(_target);
				});
			}
			else {
				that.observer.unobserve(this.target);
			}
		}

		this.observer.disconnect();

		delete this.observer;
		delete this.target;
		delete this.option;
	};
}


/** =================================================================
 *
 * ajaxWorker
 *
 * ------------------------------------------------------------------
 *
 * by Takehiko Ono (https://onotakehiko.com/)
 *
 * License: MIT (https://choosealicense.com/licenses/mit/)
 *
 * "Executor Service" forked from: https://qiita.com/cgetc/items/e8a59416ddb18236ca78
 * "WorkerInline" forked from: https://qiita.com/dojyorin/items/8e874b81648a21c1ea1d
 *
 * --------------------------------------------------------------- */

(function (_window) {

	var window = _window;


	/** =================================================================
	 *
	 * WorkerInline Class
	 *
	 * --------------------------------------------------------------- */

	class WorkerInline extends Worker {
		constructor (_source) {
			if (!(typeof _source === 'function' || typeof _source === 'string')) {
				throw new Error("Agument must be 'function' or 'string'.");
			}

			var source;
			if (typeof _source === 'function') {
				source = _source.toString();
				source = source.replace(/^.+?\{/, '').replace(/\}$/, '');
			}
			else {
				source = _source.toString();
			}

			var ctx = URL.createObjectURL(new Blob([source]));

			super(ctx);

			this.context = ctx;
		}

		terminate () {
			super.terminate();
			URL.revokeObjectURL(this.context);
		}
	}


	/** =================================================================
	 *
	 * XHR Worker
	 *
	 * --------------------------------------------------------------- */

	function xhr_worker () {
		var received_message;
		var retry_count = 0;


		/** =================================================================
		 * UTILITIES
		 * --------------------------------------------------------------- */

		var encodeDataObject = function (_data) {
			if (_data) {
				var params = [];
				for (var name in _data) {
					var value = _data[name];
					var param = encodeURIComponent(name) + '=' + encodeURIComponent(value);

					params.push(param);
				}

				var result = params.join('&').replace(/%20/g, '+');

				params = void 0;

				return result;
			}
			else {
				return '';
			}
		};

		var get_uncached_url = function (_url) {
			var url = '';
			var match = _url.match(/^([^?#]*)(\?[^#]*)?(#.*)?$/);

			if (match) {
				if (match[1]) {
					url += match[1];

					var timestamp = new Date();
					timestamp = timestamp.getTime() ;
					timestamp = Math.floor(timestamp / 1000);

					if (match[2]) {
						url += match[2] + '&timestamp=' + timestamp;
					}
					else {
						url += '?timestamp=' + timestamp;
					}

					if (match[3]) {
						url += match[3];
					}
				}
			}
			else {
				url = _url;
			}

			return url;
		};


		/** =================================================================
		 * METHODS
		 * --------------------------------------------------------------- */

		var onLoad = function (_callback) {
			return function onLoad () {
				if (this.readyState === 4) {
					if ((this.status >= 200 && this.status < 300) || this.status === 304) {
						_callback.call(this, this);
					}
					else {
						if (received_message.retry === true && retry_count < 1) {
							retry_count++;
							request(received_message);
						}
						else {
							throw [this.status, this.statusText, `Error`];
						}
					}
				}
			};
		};

		var postDataUri = onLoad(function (_xhr) {
			var blob = new Blob([_xhr.response]);
			var reader = new FileReader();

			reader.onload = function (_event) {
				reader.onload = reader = void 0;

				var data = _event.target.result;

				var match = data.match(/(data:(.*);)(.*)/);
				if (match) {
					data = data.replace(match[1], `data:${_xhr.getResponseHeader('Content-Type')};`);
				}

				self.postMessage([data, _xhr.status]);
			};

			reader.readAsDataURL(blob);
		});

		var postXML = onLoad(function (_xhr) {
			self.postMessage([_xhr.responseText, _xhr.status]);
		});

		var postJSON = onLoad(function (_xhr) {
			self.postMessage([JSON.parse(_xhr.responseText), _xhr.status]);
		});

		var postText = onLoad(function (_xhr) {
			self.postMessage([_xhr.responseText, _xhr.status]);
		});

		var request = function (_message) {
			var message = _message;

			var method = message.method.toUpperCase();
			var url = message.url;
			var dataType = message.dataType.toLowerCase();
			var data = encodeDataObject(message.data);

			var xhr = new XMLHttpRequest();

			if (method === 'GET' && data !== '') {
				var separator = (url.indexOf('?') !== -1) ? '&' : '?';
				url += separator + data;
			}

			if (message.cache === false) {
				url = get_uncached_url(url);
			}

			switch (dataType) {
				case 'json':
					xhr.responseType = 'text';
					xhr.onreadystatechange = postJSON;
					break;

				case 'xml':
					xhr.responseType = 'text';
					xhr.onreadystatechange = postXML;
					break;

				case 'datauri':
					xhr.responseType = 'blob';
					xhr.onreadystatechange = postDataUri;
					break;

				default:
					xhr.responseType = 'text';
					xhr.onreadystatechange = postText;
			}

			xhr.ontimeout = function () {
				if (received_message.retry === true && retry_count < 1) {
					retry_count++;
					request(received_message);
				}
				else {
					throw [xhr.status, xhr.statusText, `Timeout error [${message.timeout}]`];
				}
			};

			xhr.onerror = function () {
				throw [xhr.status, xhr.statusText, `Fetch error`];
			};

			xhr.open(method, url, true);
			xhr.timeout = message.timeout || 2000;

			if (message.headers) {
				for (var key in message.headers) {
					xhr.setRequestHeader(key, message.headers[key]);
				}
			}

			if (method === 'POST' && data !== '') {
				xhr.send(data);
			}
			else {
				xhr.send();
			}
		};


		/** =================================================================
		 * EVENT
		 * --------------------------------------------------------------- */

		self.onmessage = function (_event) {
			received_message = _event.data;
			request(received_message);
		};
	}


	/** =================================================================
	 *
	 * Fetch Worker
	 *
	 * --------------------------------------------------------------- */

	function fetch_worker () {
		const postDataUri = function (_blob) {
			if (_blob) {
				var blob = _blob;
				var reader = new FileReader();

				reader.onload = function (_event) {
					reader.onload = reader = void 0;

					var data = _event.target.result;
					self.postMessage([data, 200]);
				};

				reader.readAsDataURL(blob);
			}
			else {
				throw [200, ``, `Success Error`];
			}
		};

		const postBlob = function (_blob) {
			if (_blob) {
				self.postMessage([_blob, 200]);
			}
			else {
				throw [200, ``, `Success Error`];
			}
		};

		self.addEventListener(
			'message',
			async function (_event) {
				var message = _event.data;

				var url = message.url;
				if (message.cache === false) {
					url = get_uncached_url(url);
				}

				let urls = [url];

				const blobs = await Promise.all(
					urls.map(async function (_url) {
						try {
							const fetched = await fetch(_url);
							const blob = await fetched.blob();

							return blob;
						}
						catch (e) {
							return null;
						}
					})
				);

				if (message.elementType === 'blob') {
					postBlob(blobs[0]);
				}
				else {
					postDataUri(blobs[0]);
				}
			},
			false
		);
	}


	/** =================================================================
	 *
	 * Executor Service
	 *
	 * --------------------------------------------------------------- */

	var ExecutorService = (function () {
		ExecutorService.prototype.maxThreads = 5;

		function ExecutorService (_source, _maxThreads) {
			source = _source;
			this.queue = [];
			this.pool = [];
			this.running = 0;

			if (_maxThreads) {
				this.maxThreads = _maxThreads;
			}
		}

		ExecutorService.prototype.execute = function () {
			if (this.running >= this.maxThreads) {
				return this.queue.push(arguments);
			}
			else {
				return this._execute.apply(this, arguments);
			}
		};

		ExecutorService.prototype._execute = function (_message, _options) {
			var that = this;

			++this.running;

			var worker = this.pool.shift() || new WorkerInline(source);
			var context = _options.context || this;

			var onMessage = function (_event) {
				if (_options.success) {
					var filtered_arguments;

					new Promise(function (resolve) {
						dataFilter({
							data: _event.data,
							dataType: _message.dataType,
							elementType: _message.elementType,
							complete: function (_filtered_arguments) {
								filtered_arguments = _filtered_arguments;

								resolve();
							}
						});
					})
					.then(function () {
						_options.success.apply(context, filtered_arguments);

						return onComplete();
					});
				}
				else {
					return onComplete();
				}
			};

			var onError = function (_event) {
				if (_options.error) {
					_options.error.apply(context, [null, null, _event.message]);
				}

				return onComplete();
			};

			var onComplete = function (_event) {
				if (_options.complete) {
					_options.complete.apply(context, [_event]);
				}

				that.release(worker, onMessage, onError);

				return that.dequeue();
			};

			worker.addEventListener('message', onMessage, false);
			worker.addEventListener('error', onError, false);

			return worker.postMessage(_message);
		};

		ExecutorService.prototype.release = function (_worker, _onMessage, _onError) {
			_worker.removeEventListener('message', _onMessage, false);
			_worker.removeEventListener('error', _onError, false);

			_worker.terminate();

			return --this.running;
		};

		ExecutorService.prototype.dequeue = function () {
			var arguments = this.queue.shift();

			if (arguments) {
				return this.execute.apply(this, arguments);
			}
		};

		return ExecutorService;
	})();


	/** =================================================================
	 *
	 * Data Filter
	 *
	 * ------------------------------------------------------------------
	 *
	 * _args = {
	 *     @param object   data
	 *     @param string   elementType
	 *     @param function complete
	 * }
	 *
	 * --------------------------------------------------------------- */

	function dataFilter (_args) {
		var value = _args.data[0];
		var dataType = _args.dataType;
		var complete = _args.complete;

		switch (dataType) {
			case 'xml':
				var parser = new DOMParser();
				value = parser.parseFromString(value, 'text/xml');

				complete([value, dataType]);
				break;

			default:
				complete([value, dataType]);
		}
	}


	/** =================================================================
	 *
	 * ajaxWorker
	 *
	 * ------------------------------------------------------------------
	 *
	 * _settings = {
	 *     @param string   method
	 *     @param string   url
	 *     @param string   dataType
	 *     @param string   elementType
	 *     @param object   context
	 *     @param object   data
	 *     @param int      timeout
	 *     @param boolean  cache
	 *     @param object   headers
	 *     @param function success
	 *     @param function error
	 *     @param function complete
	 * }
	 *
	 * --------------------------------------------------------------- */

	window.ajaxWorker = function (_settings) {
		var message_defaults = {
			method: 'GET',
			url: null,
			dataType: 'text',
			elementType: 'inline',
			data: null,
			timeout: 2000,
			cache: true,
			retry: false,
			headers: null
		}

		var options_defaults = {
			success: function () {},
			error: function () {},
			complete: function () {}
		};

		var message = {};
		Object.keys(message_defaults).forEach(function (_key) {
			message[_key] = (typeof _settings[_key] !== 'undefined') ? _settings[_key] : message_defaults[_key];
		});

		var options = {};
		Object.keys(options_defaults).forEach(function (_key) {
			options[_key] = _settings[_key] || options_defaults[_key];
		});

		if (URL) {
			var url_obj = new URL(message.url, document.baseURI);
			message.url = url_obj.href;
		}

		let AjaxService;
		if (message.dataType === 'image') {
			AjaxService = new ExecutorService(fetch_worker);
		}
		else {
			AjaxService = new ExecutorService(xhr_worker);
		}

		AjaxService.execute(message, options);

		message_defaults = options_defaults = message = options = AjaxService = void 0;
	};

})(window);


/* ==================================================================
 * Import from Bower Components
 * --------------------------------------------------------------- */

//@codekit-append "../../../node_modules/cssuseragent/cssua.js"
//@codekit-append "../../../node_modules/purl/dist/purl.js"
//@codekit-append "../../../node_modules/js-cookie/dist/js.cookie.js"
//@codekit-append "../../../node_modules/mobile-detect/mobile-detect.js"
//@codekit-append "../../../node_modules/setanimationframetimeout/dist/setAnimationFrameTimeout.js"
//@codekit-append "../../../node_modules/swiper/swiper-bundle.js"
//@codekit-append "../../../node_modules/gsap/dist/gsap.js"
//@codekit-append "../../../node_modules/gsap/dist/ScrollToPlugin.js"
//@codekit-append "../../../node_modules/gsap/dist/ScrollTrigger.js"
//@codekit-append "../../../node_modules/jquery.scrollend/dist/jquery.scrollend.js"

//@codekit-append "../../../node_modules/58d24fc42e0f12614c110c6b854ade48/taphover.js"

//append "../../../node_modules/jquery.resizeend/lib/jquery.resizeend.js"
//append "../../../node_modules/jquery-inview/jquery.inview.js"
//append "../../../node_modules/sticky-sidebar/dist/sticky-sidebar.js"
//append "../../../node_modules/css-element-queries/src/ResizeSensor.js"
//append "../../../node_modules/photoswipe/dist/umd/photoswipe.umd.min.js"
//append "../../../node_modules/photoswipe/dist/umd/photoswipe-lightbox.umd.min.js"
//append "../../../node_modules/ajax-worker-js/ajax-worker.js"
