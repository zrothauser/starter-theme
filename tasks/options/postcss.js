/**
 * Configures postcss plugins.
 *
 * See https://gist.github.com/jonathantneal/82ab2e96cfaa269a34f6 for documentation on postcss-svg-fragments.
 */

module.exports = {
	dist: {
		options: {
			map: false,
			processors: [
				require( 'autoprefixer' )({ browsers: ['last 2 versions', 'ie 10'] }),
				require( 'postcss-svg-fragments' )()
			]
		},
		files: {
			'assets/css/starter-theme.min.css': [ 'assets/css/starter-theme.min.css' ],
			'assets/css/starter-theme.src.css': [ 'assets/css/starter-theme.src.css' ]
		}
	}
}