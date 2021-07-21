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

mix.alias({
    root: path.join(__dirname, ""),
    "~": path.join(__dirname, "resources/js"),
    css: path.join(__dirname, "resources/css"),
    boot: path.join(__dirname, "resources/js/boot"),
    ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"),
    components: path.join(__dirname, "resources/js/components"),
});

mix.disableNotifications();

if (mix.inProduction()) {
    mix.version();
}
