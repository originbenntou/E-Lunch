const webpack = require('webpack');
const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
    mode: 'development',
    devServer: {
        contentBase: 'public',
        port: 8090,
        historyApiFallback: true,
        noInfo: true
    },
    performance: {
        hints: false
    },
    devtool: 'inline-source-map',
    plugins: [
        new webpack.EnvironmentPlugin({
            'SOCKET_PATH': 'ws://localhost:3000',
            'POST_PATH': 'http://localhost:8080/post'
        })
    ]
});
