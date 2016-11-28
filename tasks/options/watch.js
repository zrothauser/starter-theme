module.exports = {
	css: {
		files: ['assets/css/sass/**/*.scss'],
		tasks: ['sass','postcss'],
	},
	js: {
		files: ['Gruntfile.js', 'assets/js/src/**/*.js', 'assets/js/admin/**/*.js'],
		tasks: ['concat', 'uglify'],
		options: {
			nospawn: true
		}
	},
	svgstore: {
		files: ['assets/svg/src/**/*.svg'],
		tasks: ['svgstore'],
		options: {
			nospawn: true
		}
	}
};