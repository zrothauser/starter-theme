const CommonsChunkPlugin = require('webpack/lib/optimize/CommonsChunkPlugin');

module.exports = {
	entry: {
        vendor: [
        	'babel-polyfill',
        	'svg4everybody',
        	'fontfaceobserver'
        ],
        main: './assets/js/src/main.js'
    },
	output: {
		path: __dirname + '/assets/js/dist',
		filename: 'bundle.js'
	},
	module: {
		rules: [
			{
				enforce: 'pre',
				test: /\.js?$/,
				exclude: /node_modules/,
				loader: 'eslint-loader',
				options: {
					cache: true
				}
			},
			{
				test: /\.js$/,
				loader: 'babel-loader',
				exclude: /node_modules/,
				options: {
					plugins: ['transform-runtime'],
					presets: ['es2015']
				}
			}
		]
	},
	plugins: [
		new CommonsChunkPlugin({
            name: "vendor",
            filename: "vendor.bundle.js"
        })
	]
};
