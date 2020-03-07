const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss","public/css");

// version does not work in hmr mode
if (process.env.npm_lifecycle_event !== "hot") {
    mix.version();
}

const path = require("path");

// fix css files 404 issue
mix.webpackConfig({

    resolve: {
        extensions: ['.js', '.vue' ],
        alias: {
            '@': __dirname + '/resources'
        }
    },

    output: { publicPath: "http://localhost:8080" },

    devServer: {
        //contentBase: path.resolve(__dirname, './public'),
        hot: true,
        // this enables hot reload
        //inline: true, // use inline method for hmr
        contentBase: path.join(__dirname, "public"),
        //https: true, //
        //trueport: 8080,
        headers: { "Access-Control-Allow-Origin": "*" },
        watchOptions: { exclude: [/bower_components/, /node_modules/] }
    },

    node: { fs: "empty", module: "empty" }
});
