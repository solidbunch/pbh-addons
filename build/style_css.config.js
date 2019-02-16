const baseConfig = require('./basic.config')();
const path = require('path');
const glob = require('glob');
let dir = path.resolve();

const pathTo = dir.replace(/\\/g, '/') + '/addons/';

// Read all styles.scss from shortcodes
const files = glob.sync(pathTo + '**/style.scss');

let entry = files.reduce((acc, item) => {
	let name = item.replace(pathTo, '');
	name = name.replace('/src/css/style.scss', '');
	acc[name] = new Array(item);
	return acc;
}, {});

//console.log( entry );
//return;

// include the css extraction and minification plugins

const MiniCssExtractPlugin = require("mini-css-extract-plugin");

baseConfig.plugins.push(
	new MiniCssExtractPlugin({
		filename: './addons/[name]/assets/css/style.min.css'
	})
);


let _exports = Object.assign(
	{
		entry,
        output: {
			path: path.resolve("./"),
			filename: "./addons/[name]/assets/app.js"
		}
	},
	baseConfig
);

module.exports = _exports;