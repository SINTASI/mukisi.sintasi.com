const mix = require("laravel-mix");
const path = require("path");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/css/app.scss", "public/css");
// .postCss("resources/css/app.css", "public/css");

// mix.autoload({
//     jquery: ["$", "window.jQuery"],
// });
mix.copy("node_modules/jquery/dist", "storage/app/vendor/jquery");

mix.alias({
    "~": path.join(__dirname, "resources/js"),
    ziggy: path.resolve("vendor/tightenco/ziggy/dist"),
});
