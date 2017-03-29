/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	/*\_(ツ)_*/
	
	var _main = __webpack_require__(1);
	
	function ready(fn) {
	    // is content loaded
	    if (document.readyState != 'loading') {
	        fn();
	    } else {
	        document.addEventListener('DOMContentLoaded', fn);
	    }
	}
	
	ready(function () {
	    document.body.classList.remove('no-js');
	    (0, _main.init)();
	});

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	exports.init = init;
	
	var _helpers = __webpack_require__(2);
	
	var _Menu = __webpack_require__(3);
	
	var _Menu2 = _interopRequireDefault(_Menu);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function init() {
	    console.log('ta-daa starting main.js');
	
	    /**
	     * Main Menu
	     */
	    var elMenu = (0, _helpers.qs)('nav.main-menu');
	    if (elMenu !== null) {
	        new _Menu2.default(elMenu);
	    }
	}

/***/ },
/* 2 */
/***/ function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	exports.qs = qs;
	exports.qsa = qsa;
	exports.hasClass = hasClass;
	exports.addClass = addClass;
	exports.removeClass = removeClass;
	exports.toggleClass = toggleClass;
	/**
	 * querySelector wrapper
	 *
	 * @param {string} selector Selector to query
	 * @param {Element|Node} [scope] Optional scope element for the selector
	 */
	function qs(selector, scope) {
		return (scope || document).querySelector(selector);
	}
	
	/**
	 * querySelectorAll wrapper
	 *
	 * @param {string} selector Selector to query
	 * @param {Element} [scope] Optional scope element for the selector
	 */
	function qsa(selector, scope) {
		return (scope || document).querySelectorAll(selector);
	}
	
	/**
	 *
	 * @param {dom} el - dom element
	 * @param {string} className - dom element class name to find
	 * @returns {boolean}
	 */
	function hasClass(el, className) {
		var bool = void 0;
		if (el.classList) {
			bool = el.classList.contains(className);
		} else {
			bool = new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
		}
		return bool;
	}
	
	function addClass(el, className) {
		if (el.classList) el.classList.add(className);else el.className += ' ' + className;
	}
	
	function removeClass(el, className) {
		if (el.classList) el.classList.remove(className);else el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
	}
	
	function toggleClass(el, className) {
		if (hasClass(el, className)) removeClass(el, className);else addClass(el, className);
	}

/***/ },
/* 3 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	var _utils = __webpack_require__(4);
	
	var _utils2 = _interopRequireDefault(_utils);
	
	var _helpers = __webpack_require__(2);
	
	var _face = __webpack_require__(6);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	var Menu = function () {
	    function Menu(root) {
	        _classCallCheck(this, Menu);
	
	        // root -> current menu element
	        this.root = root;
	        this.elPage = document.getElementById('page');
	        // creating wrapper element for mob menu
	        this.elMobWrap = _utils2.default.make('div');
	        (0, _helpers.addClass)(this.elMobWrap, 'mob-menu');
	        //addClass(this.elMobWrap, face.str_hide);
	
	        // overlay
	        this.elOverlay = _utils2.default.make('div');
	        (0, _helpers.addClass)(this.elOverlay, '_overlay');
	
	        // create close button
	        this.elBtnWrapper = _utils2.default.make('div');
	        this.elBtn = _utils2.default.make('button');
	        this.elBtn.innerHTML = 'Close';
	        (0, _helpers.addClass)(this.elBtnWrapper, '_close');
	        this.elBtnWrapper.appendChild(this.elBtn);
	
	        // clone existing menu
	        this.elMobMenu = root.cloneNode(true);
	        (0, _helpers.removeClass)(this.elMobMenu, 'main-menu');
	
	        this.addMobMenuToDom();
	    }
	
	    _createClass(Menu, [{
	        key: 'addMobMenuToDom',
	        value: function addMobMenuToDom() {
	            this.elPage.insertBefore(this.elMobWrap, this.elPage.firstChild);
	            this.elMobWrap.appendChild(this.elBtn);
	            this.elMobWrap.appendChild(this.elMobMenu);
	        }
	    }, {
	        key: 'toggleBtn',
	        value: function toggleBtn() {}
	    }, {
	        key: 'showMenu',
	        value: function showMenu() {}
	    }, {
	        key: 'hideMenu',
	        value: function hideMenu() {}
	    }]);
	
	    return Menu;
	}();
	
	exports.default = Menu;

/***/ },
/* 4 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _Memoize = __webpack_require__(5);
	
	var _Memoize2 = _interopRequireDefault(_Memoize);
	
	var _helpers = __webpack_require__(2);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	var memoize = new _Memoize2.default();
	var utils = {
	
		/**
	  * Element distance from browser top border
	  * @param el DOM
	  * @returns {{x: number, y: number}}
	  */
		getPosition: function getPosition(el) {
			var xPos = 0;
			var yPos = 0;
	
			while (el) {
				if (el.tagName == "BODY") {
					// deal with browser quirks with body/window/document and page scroll
					var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
					var yScroll = el.scrollTop || document.documentElement.scrollTop;
	
					xPos += el.offsetLeft - xScroll + el.clientLeft;
					yPos += el.offsetTop - yScroll + el.clientTop;
				} else {
					// for all other non-BODY elements
					xPos += el.offsetLeft - el.scrollLeft + el.clientLeft;
					yPos += el.offsetTop - el.scrollTop + el.clientTop;
				}
	
				el = el.offsetParent;
			}
			return {
				x: xPos,
				y: yPos
			};
		},
	
	
		/**
	  * Loops through all parents and check if clicked Element is same as Node (needle)
	  *
	  * @param el {Element}
	  * @param needle {Element}
	  * @returns {boolean}
	  */
		isCurrentEl: function isCurrentEl(el, needle) {
			var isNeedle = false;
			while (el) {
				if (el.isEqualNode(needle)) {
					//console.log('--- el.tagname, needle', el, needle);
					isNeedle = true;
					break;
				}
				el = el.offsetParent;
			}
			return isNeedle;
		},
	
	
		/**
	  *
	  * @param event - string 'scroll' or 'resize'
	  * @param method - function to run
	  */
		binder: function binder(event, method) {
			var ticking = false;
			//TODO: option to wait till resize is over and then adjust
			window.addEventListener(event, function () {
				if (!ticking) {
					window.requestAnimationFrame(function () {
						method();
						ticking = false;
					});
				}
				ticking = true;
			});
		},
	
	
		/**
	  *
	  * @returns {{x: (Number|number), y: (Number|number)}}
	  */
		screenSize: function screenSize() {
			var w = window,
			    d = document,
			    e = d.documentElement,
			    g = d.getElementsByTagName('body')[0],
			    x = w.innerWidth || e.clientWidth || g.clientWidth,
			    y = w.innerHeight || e.clientHeight || g.clientHeight;
	
			return { x: x, y: y };
		},
	
	
		/**
	  *
	  * @param el string
	  * @returns {Element}
	  */
	
		make: function make(el) {
			return document.createElement(el);
		},
		on: function on(elems, events, method) {
			var option = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
	
			if (!elems.length) return;
			memoize.set(method);
			var _iteratorNormalCompletion = true;
			var _didIteratorError = false;
			var _iteratorError = undefined;
	
			try {
				for (var _iterator = elems[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
					var el = _step.value;
					var _iteratorNormalCompletion2 = true;
					var _didIteratorError2 = false;
					var _iteratorError2 = undefined;
	
					try {
						for (var _iterator2 = events[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
							var event = _step2.value;
	
							if (memoize.get(method)) {
								el.addEventListener(event, memoize.get(method), option);
							}
						}
					} catch (err) {
						_didIteratorError2 = true;
						_iteratorError2 = err;
					} finally {
						try {
							if (!_iteratorNormalCompletion2 && _iterator2.return) {
								_iterator2.return();
							}
						} finally {
							if (_didIteratorError2) {
								throw _iteratorError2;
							}
						}
					}
				}
			} catch (err) {
				_didIteratorError = true;
				_iteratorError = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion && _iterator.return) {
						_iterator.return();
					}
				} finally {
					if (_didIteratorError) {
						throw _iteratorError;
					}
				}
			}
		},
	
	
		/**
	  *
	  * @param {Array} elems - DOM element(s), single element must be wrapped in []
	  * @param {Array} events - ['click', 'resize', '..']
	  * @param {Function} method to attach listener
	  * @param {boolean} option - Optional parameter
	  */
		off: function off(elems, events, method) {
			var option = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
	
			if (!elems.length) return;
			var m = memoize.get(method);
			var _iteratorNormalCompletion3 = true;
			var _didIteratorError3 = false;
			var _iteratorError3 = undefined;
	
			try {
				for (var _iterator3 = elems[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
					var el = _step3.value;
					var _iteratorNormalCompletion4 = true;
					var _didIteratorError4 = false;
					var _iteratorError4 = undefined;
	
					try {
						for (var _iterator4 = events[Symbol.iterator](), _step4; !(_iteratorNormalCompletion4 = (_step4 = _iterator4.next()).done); _iteratorNormalCompletion4 = true) {
							var event = _step4.value;
	
							el.removeEventListener(event, m, option);
						}
					} catch (err) {
						_didIteratorError4 = true;
						_iteratorError4 = err;
					} finally {
						try {
							if (!_iteratorNormalCompletion4 && _iterator4.return) {
								_iterator4.return();
							}
						} finally {
							if (_didIteratorError4) {
								throw _iteratorError4;
							}
						}
					}
				}
			} catch (err) {
				_didIteratorError3 = true;
				_iteratorError3 = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion3 && _iterator3.return) {
						_iterator3.return();
					}
				} finally {
					if (_didIteratorError3) {
						throw _iteratorError3;
					}
				}
			}
		},
	
	
		/**
	  *
	  * @param property - string CSS3
	  * @returns string || null
	  */
		css3Support: function css3Support(property) {
			var prop = {
				transform: ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"]
			};
	
			//searching trough array of props and if browser understand it - return it
			for (var i = 0; i < prop[property].length; i++) {
				if (typeof document.body.style[prop[property][i]] != "undefined") {
					return prop[property][i];
				}
			}
			return null;
		}
	};
	
	exports.default = utils;

/***/ },
/* 5 */
/***/ function(module, exports) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	var _class = function () {
		function _class() {
			_classCallCheck(this, _class);
	
			this.events = {};
		}
	
		_createClass(_class, [{
			key: "set",
			value: function set(method) {
				if (this.events[method] === method) return;
				this.events[method] = method;
			}
		}, {
			key: "get",
			value: function get(method) {
				if (this.events[method]) {
					return this.events[method];
				}
			}
		}]);

		return _class;
	}();

	exports.default = _class;

/***/ },
/* 6 */
/***/ function(module, exports, __webpack_require__) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	  value: true
	});
	exports.face = undefined;
	
	var _App = __webpack_require__(7);
	
	var _App2 = _interopRequireDefault(_App);
	
	function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }
	
	/**
	 * Creating mediator between AppConfig and app, shortcut to available params
	 * @type {AppConfig}
	 */
	var appConfig = new _App2.default();
	var face = exports.face = appConfig.config;
	
	//export default _defaults;

/***/ },
/* 7 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";
	// import $$ from './common/utils';
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	
	var _userAgent = __webpack_require__(8);
	
	function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
	
	/**
	 * AppConfig - util to save defaults and do default checks only once
	 */
	var AppConfig = function AppConfig() {
		_classCallCheck(this, AppConfig);
	
		this.config = {
			isMobile: (0, _userAgent.userAgent)(), // returns mob device string or false
			evClick: 'click',
			evResize: 'resize',
			evTouchstart: 'touchstart',
			str_mobile: '_mobile',
			str_hide: '_hide',
			str_show: '_show',
			str_current: '_current',
			str_last: '_last'
		};
	};
	
	exports.default = AppConfig;

/***/ },
/* 8 */
/***/ function(module, exports) {

	"use strict";
	
	Object.defineProperty(exports, "__esModule", {
		value: true
	});
	exports.userAgent = userAgent;
	function userAgent() {
		var userAgent = navigator.userAgent;
	
		if (userAgent.match(/Android/i)) {
			return 'android';
		} else if (userAgent.match(/webOS/i)) {
			return 'webos';
		} else if (userAgent.match(/iPhone/i)) {
			return 'iphone';
		} else if (userAgent.match(/iPod/i)) {
			return 'ipod';
		} else if (userAgent.match(/iPad/i)) {
			return 'ipad';
		} else if (userAgent.match(/Windows Phone/i)) {
			return 'windows phone';
		} else if (userAgent.match(/SymbianOS/i)) {
			return 'symbian';
		} else if (userAgent.match(/RIM/i) || userAgent.match(/BB/i)) {
			return 'blackberry';
		} else {
			return false;
		}
	}

/***/ }
/******/ ]);
//# sourceMappingURL=bundle.js.map