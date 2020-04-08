const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: './scripts/index.js',
  mode: 'development',
  output: {
    filename: 'out.js',
    path: path.resolve(__dirname, 'dist'),
  },
  devServer: {
    proxy: {
      target: 'https://iron-wp.lndo.site',
      secure: false,
    },
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'out.css',
    }),
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
