const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");


module.exports = function () {
	const baseConf = {
		externals: {
			jquery: 'jQuery'
		},
		optimization: {
			minimizer: [
				// Enable the js minification plugin
				new UglifyJSPlugin({
					test: /\.js(\?.*)?$/i,
					sourceMap: false,
					extractComments: true,
					parallel: true,
					uglifyOptions: {
						warnings: false,
						compress: {
							unsafe: true,
							inline: true,
							passes: 2,
							keep_fargs: false,
						},
						mangle: true, // Note `mangle.properties` is `false` by default.
						output: {
							beautify: false,
						},
						toplevel: false,
						ie8: false,
					}
				}),
				// Enable the css minification plugin
				// new OptimizeCSSAssetsPlugin({
				// 	cssProcessor: require('cssnano'),
				// 	cssProcessorPluginOptions: {
				// 		preset: ['default', {discardComments: {removeAll: true}}],
				// 		canPrint: true
				// 	}
				// })
			]
		},
		module: {
		 
			rules: [
			    // Move images from src to build
                {
                    test: /\.(png|jpg|svg|gif)$/i,
                    use: [{
                        loader: 'file-loader',
                        options: {
                          name: '[path]../../assets/img/[name].[ext]',
                          //publicPath: '../../img/'       // override the default path
                        },
                    }]
                },
                // Compile all .scss files to plain old css
                {
                    test: /\.(sass|scss)$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        {loader: 'css-loader', options: {sourceMap: false, minimize: true}},
                        {loader: 'postcss-loader'},
                        {loader: 'sass-loader', options: {sourceMap: false, minimize: true}},
                    ]
                },
                // Babel
                {
                    test: /\.js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                    }
                }
			]
	    },
		devtool: 'source-map',
		plugins: [
			new FixStyleOnlyEntriesPlugin({
				silent: true
			})
		],
	};

	/*
	const fs = require('fs');
	if (process.env.SYNC === "true" && fs.existsSync('./browser-sync.config')) {
		const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
		baseConf.plugins.push(
			new BrowserSyncPlugin(
				require('./browser-sync.config')
			)
		)
	}
	*/

	return baseConf;
};
