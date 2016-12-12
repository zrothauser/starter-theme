module.exports = {
	dist: {
		files: {
			'assets/css/starter-theme.src.css': 'assets/css/sass/starter-theme.scss',
			'assets/css/editor-styles.css': 'assets/css/sass/editor-styles.scss',
		},
		options: {
			imagePath:   'assets/img',
			outputStyle: 'nested',
			sourceMap:   false
		},
	},
	minDist: {
		files: {
			'assets/css/starter-theme.min.css': 'assets/css/sass/starter-theme.scss',
		},
		options: {
			imagePath:   'assets/img',
			outputStyle: 'compressed',
			sourceMap:   false
		},
	}
}
