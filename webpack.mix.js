let mix = require('laravel-mix');

mix.js('./themes/mero/assets/js/app.js', 'js')
    .sass('./themes/mero/assets/sass/style.scss', 'css')
    .setPublicPath('./themes/mero/assets/dist');

mix.browserSync({
    proxy: 'october-movies',
    host: 'october-movies',
    files: ['./themes/mero/assets/dist/css/*.css', './themes/mero/assets/dist/js/*.js', './themes/mero/**/*.htm']
});