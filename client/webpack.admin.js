'use strict';
const Path = require('path');

module.exports = {
  entry: {
  	admin: './admin.js',
  },
  output: {
  	path: Path.join(__dirname, './dist'),
    filename: '[name].js'
  },
  module: {
  	loaders: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'babel-loader'
			}
		]
  }
};
