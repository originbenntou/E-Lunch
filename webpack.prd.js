const webpack = require('webpack');
const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
    mode: 'production',
    plugins: [
        new webpack.EnvironmentPlugin({
            'SOCKET_PATH': 'wss://www.e-lunch.info',
            'POST_PATH': 'https://www.e-lunch.info:8080/post'
        })
    ]
});
