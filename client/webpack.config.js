const webpack = require('webpack');
const Path = require('path');

// const extractSass = new ExtractTextPlugin({
//   filename: "[name].css",
//   disable: false
// });

module.exports = {
  entry: {
    vendor: [
      'babel-polyfill',
      'react',
      'react-dom',
      'axios',
      'qs',
      'webfontloader',
      'react-multiple-render',
      'minigrid',
      'card-validator',
      'lazysizes',
      'lazysizes/plugins/bgset/ls.bgset.min.js',
      'hammerjs',
    ],
    app: './src/app.js',
  },
  output: {
    path: Path.join(__dirname, '/dist/'),
    filename: '[name].js',
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader?cacheDirectory=true',
      },
    ],
  },

  plugins: [
    new webpack.optimize.CommonsChunkPlugin({
      name: 'vendor',
      filename: 'vendor.js',
      minChunks: 2,
    }),
  ],
};
