module.exports = {
	css: {
		files: ['assets/css/sass/**/*.scss'],
		tasks: ['css'],
	},
	js: {
		files: ['Gruntfile.js', 'assets/js/src/**/*.js', 'assets/js/admin/**/*.js'],
		tasks: ['js'],
		options: {
			nospawn: true
		}
	},
	svgstore: {
		files: ['assets/svg/src/**/*.svg'],
		tasks: ['svgstore', 'css'],
		options: {
			nospawn: true
		}
	}
};