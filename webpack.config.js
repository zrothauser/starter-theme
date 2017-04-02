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
				test: /\.jsx?$/,
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