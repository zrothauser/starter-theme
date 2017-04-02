webpackJsonp([0],{

/***/ 117:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
/**
 * Handles toggling the navigation menu for small screens.
 */

function enableMenuToggle() {
	var siteWrapper = document.getElementById('wrapper');
	var mobileToggleButton = document.getElementById('js-menu-toggle');

	// Return if the parts we need aren't there
	if (!mobileToggleButton || !siteWrapper) {
		return;
	}

	/**
  * Toggle the menu from the menu button
  */
	mobileToggleButton.addEventListener('click', function (event) {
		event.preventDefault();

		siteWrapper.classList.toggle('b-site-wrapper--menu-open');
		mobileToggleButton.classList.toggle('b-header__toggle--open');
	});
}

exports.default = enableMenuToggle;

/***/ }),

/***/ 118:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});
/**
 * Simple check to remove the .no-js class on the html element if JavaScript is enabled
 */

function jsCheck() {
  document.documentElement.classList.remove('no-js');
  document.documentElement.classList.add('js');
}

exports.default = jsCheck;

/***/ }),

/***/ 119:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
  value: true
});

var _fontfaceobserver = __webpack_require__(87);

var _fontfaceobserver2 = _interopRequireDefault(_fontfaceobserver);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function loadFonts() {
  var sourceSansObserver = new _fontfaceobserver2.default('Source Sans Pro');

  sourceSansObserver.load().then(function () {
    document.documentElement.classList.add('fonts-loaded');
  });
} /**
   * Watch loading of web fonts.
   *
   * Replace this with the actual fonts.
   */
exports.default = loadFonts;

/***/ }),

/***/ 120:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


__webpack_require__(59);

var _svg4everybody = __webpack_require__(60);

var _svg4everybody2 = _interopRequireDefault(_svg4everybody);

var _loadFonts = __webpack_require__(119);

var _loadFonts2 = _interopRequireDefault(_loadFonts);

var _enableMenuToggle = __webpack_require__(117);

var _enableMenuToggle2 = _interopRequireDefault(_enableMenuToggle);

var _jsCheck = __webpack_require__(118);

var _jsCheck2 = _interopRequireDefault(_jsCheck);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// Run the check for JS
(0, _jsCheck2.default)();

// Run svg4everybody()


// Sources
// Dependencies
(0, _svg4everybody2.default)();

// Load fonts
(0, _loadFonts2.default)();

// Menus
(0, _enableMenuToggle2.default)();

/***/ })

},[120]);