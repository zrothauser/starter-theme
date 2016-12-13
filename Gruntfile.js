/**
 * Gruntfile methods
 *
 * A modular setup for Grunt that loads tasks and options from specified
 * directories instead of one individual Gruntfile.js
 *
 * @access public
 * @param  {Object} grunt the grunt object
 */
module.exports = function( grunt ) {

	/**
	 * Require `load-grunt-tasks`
	 *
	 * `load-grunt-tasks` will read the dependencies in your package.json file
	 * and load grunt tasks that match the provided patterns. This prevents
	 * loading each task one by one.
	 *
	 */
	require( 'load-grunt-tasks' )( grunt );

	/**
	 * Load grunt tasks defined in the `/tasks` folder.
	 *
	 */
	grunt.loadTasks( 'tasks' );

	/**
	 * Function to load the options for each grunt module
	 *
	 * This function loops through each file from the `path` param and returns
	 * the object as a grunt option.
	 *
	 */
	var loadConfig = function( path ) {
		var glob = require( 'glob' ),
			object = {},
			key;

		glob.sync( '*', {
			cwd: path
		} ).forEach( function( option ) {
			key = option.replace( /\.js$/, '' );
			object[ key ] = require( path + option );
		} );

		return object;
	};

	/**
	 * Object to read your package.json file.
	 *
	 */
	var config = {
		pkg: grunt.file.readJSON( 'package.json' ),
		env: process.env
	};

	/**
	 * Extend the `config` object
	 *
	 * @param  {Object} loadConfig('./tasks/options/' runs the `loadConfig` func
	 */
	grunt.util._.extend( config, loadConfig( './tasks/' ) );

	/**
	 * Initialize the config object
	 *
	 */
	grunt.initConfig( config );

	/**
	 * Register default tasks
	 */
	grunt.registerTask( 'js', [ 'jshint', 'concat', 'uglify' ] );
	grunt.registerTask( 'css', [ 'sass', 'postcss' ] );
	grunt.registerTask( 'default', [ 'svgstore', 'js', 'css' ] );
};
