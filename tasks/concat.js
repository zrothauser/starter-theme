module.exports = {
	options: {
		stripBanners: true
	},
	dist: {
		src: [
			// JS Check is first priority
			'assets/js/src/js-check.js',

			// Then load fonts
			'assets/js/vendor/fontfaceobserver.js',
			'assets/js/src/fonts.js',

			// SVG polyfill
			'assets/js/vendor/svg4everybody.js',
			'assets/js/src/svg.js',

			// Other JS functionality
			'assets/js/vendor/smooth-scroll.js',
			'assets/js/src/links.js'
			'assets/js/src/menu-toggle.js'
		],
		dest: 'assets/js/starter-theme.src.js'
	},
}
