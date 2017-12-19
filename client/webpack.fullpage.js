"use strict";
const webpack = require("webpack");
const fs = require("fs");
const Path = require("path");

module.exports = {
  entry: {
    vendor: [
      "mitt",
			"fullpage.js",
			"lazysizes",
    ],
  	app_me: "./src/fullpage/index.js"
  },
  output: {
  	path: Path.join(__dirname, '/dist/'),
    filename: "[name].js"
  },
  module: {
  	loaders: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: "babel-loader?cacheDirectory=true"
			}
		]
  },
	plugins: [
      new webpack.optimize.CommonsChunkPlugin({
        name: "vendor",
        filename: "vendor_me.js",
        minChunks: Infinity
      })
    ]
};
