const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = {
  entry: './scripts/index.js',
  mode: 'development',
  output: {
    filename: 'out.js',
    path: path.resolve(__dirname, 'dist'),
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'out.css',
    }),
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 8000,
      proxy: 'https://iron-wp.lndo.site',
      files: [
        './styles/**/*',
        './scripts/**/*',
        './views/**/*',
        './*.php',
      ],
    })
  ],
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.css$/,
        include: path.resolve(__dirname, 'styles/main.css'),
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
          },
          { loader: 'css-loader', options: { importLoaders: 1 } },
          'postcss-loader',
        ]
      },
    ]
  },
};
