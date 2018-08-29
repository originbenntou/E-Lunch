const vueloaderplugin = require('vue-loader/lib/plugin');
const path = require('path');
const webpack = require('webpack');

module.exports = {
    entry: {
        'index': './src/index.ts',
        'admin': './src/admin.ts'
    },
    output: {
        path: path.resolve(__dirname, './public/dist'),
        filename: '[name].bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.vue$/,
                loader: 'vue-loader',
                options: {
                    loaders: {
                        'scss': 'vue-style-loader!css-loader!sass-loader',
                        'sass': 'vue-style-loader!css-loader!sass-loader?indentedSyntax'
                    }
                }
            },
            {
                test: /\.ts$/,
                loader: 'ts-loader',
                exclude: /node_modules/,
                options: {
                    appendTsSuffixTo: [/\.vue$/]
                }
            },
            {
                test: /\.(css|sass|scss)$/,
                loader: ['style-loader', 'css-loader', 'sass-loader']
            },
            {
                test: /\.(png|jpg|gif|svg)$/,
                loader: 'file-loader',
                options: {
                    name: '[name].[ext]?[hash]'
                }
            }
        ]
    },
    resolve: {
        extensions: ['.ts', '.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    },
    plugins: [
        // webpack4.15以降は必要
        new vueloaderplugin(),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: "jquery"
        })
    ]
};
