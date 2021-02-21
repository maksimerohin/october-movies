// webpack.mix.js

let mix = require('laravel-mix');

// mix.js('src/app.js', 'js')
//     .sass('src/app.scss', 'css')
//     .setPublicPath('dist');

mix.js('./themes/mero/assets/js/app.js', 'js')
    .sass('./themes/mero/assets/sass/style.scss', 'css')
    .setPublicPath('./themes/mero/assets/dist');

mix.browserSync({
    proxy: 'october-lessons.loc',
    host: 'october-lessons.loc',
    files: ['./themes/mero/assets/dist/css/*.css', './themes/mero/assets/dist/js/*.js', './themes/mero/**/*.htm']
});