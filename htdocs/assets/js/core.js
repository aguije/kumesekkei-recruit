/* ==================================================================
 *
 * CORE
 *
 * ------------------------------------------------------------------
 *
 *
 *
 * --------------------------------------------------------------- */

var GLOBAL = {
	wW               : undefined,  // ウィンドウの幅
	wH               : undefined,  // ウィンドウの高さ

	is_process       : false,  // 処理中判別
	is_spview        : false,  // スマートフォンビューか
	is_mobile        : (document.documentElement.classList.contains('touch')) ? true : false,  // モバイルか
	is_popstate      : false,  // pop state によるアクセスか

	methods          : {
		core         : {},
		ui           : {},
		util         : {}
	},

	observers        : [],
	swipers          : []
};


GLOBAL.util = {

	/* ==================================================================
	 * GENERATE ID
	 * --------------------------------------------------------------- */

	generateId: function () {
 		return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
 			var r = Math.random() * 16 | 0, v = ((c === 'x') ? r : (r&0x3|0x8));  // jshint ignore:line
 			return v.toString(16);
 		});
 	},


	/* ==================================================================
	 * EASING
	 * --------------------------------------------------------------- */

	easing: {
		'linear'        : [0.250, 0.250, 0.750, 0.750],
		'ease'          : [0.250, 0.100, 0.250, 1.000],
		'easeIn'        : [0.420, 0.000, 1.000, 1.000],
		'easeOut'       : [0.000, 0.000, 0.580, 1.000],
		'easeInOut'     : [0.420, 0.000, 0.580, 1.000],
		'easeInQuad'    : [0.550, 0.085, 0.680, 0.530],
		'easeInCubic'   : [0.550, 0.055, 0.675, 0.190],
		'easeInQuart'   : [0.895, 0.030, 0.685, 0.220],
		'easeInQuint'   : [0.755, 0.050, 0.855, 0.060],
		'easeInSine'    : [0.470, 0.000, 0.745, 0.715],
		'easeInExpo'    : [0.950, 0.050, 0.795, 0.035],
		'easeInCirc'    : [0.600, 0.040, 0.980, 0.335],
		'easeInBack'    : [0.600, -0.280, 0.735, 0.045],

		'easeOutQuad'   : [0.250, 0.460, 0.450, 0.940],
		'easeOutCubic'  : [0.215, 0.610, 0.355, 1.000],
		'easeOutQuart'  : [0.165, 0.840, 0.440, 1.000],
		'easeOutQuint'  : [0.230, 1.000, 0.320, 1.000],
		'easeOutSine'   : [0.390, 0.575, 0.565, 1.000],
		'easeOutExpo'   : [0.190, 1.000, 0.220, 1.000],
		'easeOutCirc'   : [0.075, 0.820, 0.165, 1.000],
		'easeOutBack'   : [0.175, 0.885, 0.320, 1.275],

		'easeInOutQuad' : [0.455, 0.030, 0.515, 0.955],
		'easeInOutCubic': [0.645, 0.045, 0.355, 1.000],
		'easeInOutQuart': [0.770, 0.000, 0.175, 1.000],
		'easeInOutQuint': [0.860, 0.000, 0.070, 1.000],
		'easeInOutSine' : [0.445, 0.050, 0.550, 0.950],
		'easeInOutExpo' : [1.000, 0.000, 0.000, 1.000],
		'easeInOutCirc' : [0.785, 0.135, 0.150, 0.860],
		'easeInOutBack' : [0.680, -0.550, 0.265, 1.550],

		'opacity1'      : [0.26, 0.06, 0, 1],
		'opacity2'      : [0.18, 0.06, 0.23, 1],

		'transform1'    : [0.43, 0.05, 0.17, 1],
		'transform2'    : [0.55, 0.05, 0.22, 0.99]
	},


	/* ==================================================================
	 * INVIEW
	 * --------------------------------------------------------------- */

	inview: function ($_target) {
		if (GLOBAL.wW !== undefined && GLOBAL.wH !== undefined) {
			var bounding = $_target.get(0).getBoundingClientRect();

			if ((bounding.left + bounding.width > 0 && bounding.left <= GLOBAL.wW) &&
				(bounding.top + bounding.height > 0 && bounding.top <= GLOBAL.wH)) {
				return true;
			}
			else {
				return false;
			}
		}
	},


	/* ==================================================================
	 * OPEN LINK POPUP
	 * --------------------------------------------------------------- */

	openLinkPopup: function (wUrl, wTitle, _wWidth, _wHeight) {
		var wObj;
		var wWidth;
		var wHeight;
		var scWidthCenter;
		var scHeightCenter;
		var wOption;

		if (_wWidth) {
			wWidth = _wWidth;
		}
		else {
			wWidth = 650;
		}

		if (_wHeight) {
			wHeight = _wHeight;
		}
		else {
			wHeight = 600;
		}

		scWidthCenter = screen.availWidth / 2;
		scHeightCenter = screen.availHeight / 2;
		wOption = [
			'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=' + wWidth,
			',height=' + wHeight,
			',left=' + (scWidthCenter - (wWidth / 2)),
			',top=' + (scHeightCenter - (wHeight / 2))
		].join('');

		wObj = window.open(wUrl, wTitle ,wOption);
		wObj.focus();
	},


	/* ==================================================================
	 * HTML SPECIAL CHARS
	 * --------------------------------------------------------------- */

	htmlspecialchars: function (str) {
		return (str + '').replace(/&/g, '&amp;')
			.replace(/"/g,'&quot;')
			.replace(/'/g,'&#039;')
			.replace(/</g,'&lt;')
			.replace(/>/g,'&gt;');
	},


	/* ==================================================================
	 *
	 * elementsFromPoint Polyfill
	 * gist.github.com/oslego/7265412
	 *
	 * --------------------------------------------------------------- */

	elementsFromPoint: function (x, y) {
		var elements = [], previousPointerEvents = [], current;

		while ((current = document.elementFromPoint(x,y)) && elements.indexOf(current) === -1 && current !== null) {
			elements.push(current);
			previousPointerEvents.push({
				value: current.style.getPropertyValue('pointer-events'),
				priority: current.style.getPropertyPriority('pointer-events')
			});

			current.style.setProperty('pointer-events', 'none', 'important');
		}

		for (var i = previousPointerEvents.length; i > 0; i--) {
			var d = previousPointerEvents[i];
			elements[i].style.setProperty('pointer-events', d.value ? d.value : '', d.priority);
		}

		return elements;
	},


	/* ==================================================================
	 * Detect Element
	 * --------------------------------------------------------------- */

	exists: function (_selector) {
		if ($(_selector).length > 0) {
			return true;
		}
		else {
			return false;
		}
	},


	/* ==================================================================
	 * Load Video API
	 * --------------------------------------------------------------- */

	load_video_api: function (_option) {
		_option = Object.assign({
			complete: function () { return true; }
		}, _option);

		if (GLOBAL.is_yt_api_loaded === true) {
			_option.complete();
		}
		else {
			var tag = document.createElement('script');

			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			var onYouTubeIframeAPIReady = function () {
				GLOBAL.is_yt_api_loaded = true;
				_option.complete();
			}

			window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
		}
	}

};


/* ==================================================================
 * console.log の出力制御
 * --------------------------------------------------------------- */

(function () {

	const set_debug_cookie = function (_mode) {
		if (_mode === true) {
			Cookies.set('onotakehiko_debug', '1', { path: '/' });
		}
		else {
			Cookies.remove('onotakehiko_debug', { path: '/' });
		}
	};

	var urlObj = purl(location.href);
	if (urlObj && urlObj.search) {
		if (urlObj.search.indexOf('debug=1') !== -1) {
			set_debug_cookie(true);
		}
		else if (urlObj.search.indexOf('debug=0') !== -1) {
			set_debug_cookie(false);
		}
	}

	if (Cookies.get('onotakehiko_debug') && parseInt(Cookies.get('onotakehiko_debug')) === 1) {
		GLOBAL.debug = true;
	}
	else {
		GLOBAL.debug = false;
	}

	if (GLOBAL.debug === false) {
		console.log = function () {};
	}

})();


/* ==================================================================
 * Window Size • Resize Event
 * --------------------------------------------------------------- */

$(function () {
	let ticking = false;

	var resize = function () {
		GLOBAL.wW = $(window).width();
		GLOBAL.wH = $(window).height();

		//

		/* ==================================================================
		 *
		 * Mobile Detection
		 *
		 * --------------------------------------------------------------- */

		$('html').attr('data-tablet', '0');

		if (GLOBAL.wW < 768) {
			GLOBAL.is_spview = true;
		}
		else {
			GLOBAL.is_spview = false;
		}

		if (cssua.userAgent.mobile) {
			var md = new MobileDetect(window.navigator.userAgent);
			if (md.tablet()) {
				if (GLOBAL.wW < 768) {
					GLOBAL.is_spview = true;
				}
				else {
					GLOBAL.is_spview = false;

					$('html').attr('data-tablet', '1');
				}
			}
			else {
				GLOBAL.is_spview = true;
			}

			md = void 0;
		}
	};

	$(window).on('resize.core', function () {
		if (!ticking) {
			window.requestAnimationFrame(function () {
				resize();
				ticking = false;
			});

			ticking = true;
		}
	});

	resize();
});


/* ==================================================================
 * Variables
 * --------------------------------------------------------------- */

let $gh;


/* ==================================================================
 * Includes
 * --------------------------------------------------------------- */

// @codekit-append "methods/_util.js"
// @codekit-append "_top.js"
// @codekit-append "_people.js"
// @codekit-append "_ui.js"

// @codekit-append "_common.js"
