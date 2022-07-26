const mix = require('laravel-mix');

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

// mix.js('resources/js/app.js', 'public/js').
//     postCss('resources/css/app.css', 'public/css', [
//         require('postcss-import'),
//         require('tailwindcss'),
//         require('autoprefixer'),
//     ]);

mix.copyDirectory('node_modules/intl-tel-input/build/img',
    'public/assets/img');
mix.copyDirectory([
    'resources/assets/images',
], 'public/assets/images');

mix.copyDirectory('resources/images', 'public/images');

mix.copyDirectory('node_modules/intl-tel-input/build/img',
    'public/assets/css/inttel/img');

mix.copyDirectory('resources/fonts', 'public/fonts');

// light theme css
mix.styles('resources/theme/css/style.css', 'public/assets/css/style.css');
mix.styles('resources/theme/css/plugins.css', 'public/assets/css/plugins.css');

//phone-number dark css
mix.sass('resources/assets/css/phone-number-dark.scss','public/assets/css/phone-number-dark.css')


// dark theme css
mix.styles('resources/theme/css/style.dark.css','public/assets/css/style.dark.css');
mix.styles('resources/theme/css/plugins.dark.css', 'public/assets/css/plugins.dark.css');

// backend third party css
mix.styles([
    'resources/theme/css/third-party.css',
    'node_modules/intl-tel-input/build/css/intlTelInput.css',
    'node_modules/@simonwep/pickr/dist/themes/nano.min.css',
    'node_modules/izitoast/dist/css/iziToast.min.css'
], 'public/assets/css/third-party.css')

// backend third party js
mix.scripts([
    'resources/theme/js/vendor.js',
    'resources/theme/js/plugins.js',
    'node_modules/intl-tel-input/build/js/intlTelInput.js',
    'node_modules/intl-tel-input/build/js/utils.js',
    'node_modules/chart.js/dist/chart.min.js',
    'node_modules/@simonwep/pickr/dist/pickr.min.js',
    'node_modules/izitoast/dist/js/iziToast.min.js'
], 'public/assets/js/third-party.js').version();

mix.js('resources/assets/js/auth/auth.js','public/assets/js/auth/auth.js').version();

mix.sass('resources/assets/css/custom.scss', 'assets/css/custom.css').
    sass('resources/assets/css/dashboard.scss', 'assets/css/dashboard.css').
    sass('resources/assets/css/app.scss', 'assets/css/app.css').
    sass('resources/assets/css/full-screen.scss', 'assets/css/full-screen.css').
    sass('resources/assets/css/invoice-pdf.scss', 'assets/css/invoice-pdf.css').
    sass('resources/assets/css/invoice-template.scss',
        'assets/css/invoice-template.css').
    sass('resources/assets/css/infy-loader.scss',
        'assets/css/infy-loader.css').
    sass('resources/assets/css/custom-dark-mode.scss',
        'assets/css/custom-dark-mode.css').
    sass('resources/assets/css/invoice-template-dark-mode.scss',
        'assets/css/invoice-template-dark-mode.css').
    version();

mix.js('resources/assets/js/custom/custom.js',
    'public/assets/js/custom/custom.js').
    js('resources/assets/js/roles/roles.js',
        'public/assets/js/roles/roles.js').
    js('resources/assets/js/dashboard/dashboard.js',
        'public/assets/js/dashboard/dashboard.js').
    js('resources/assets/js/users/users.js',
        'public/assets/js/users/users.js').
    js('resources/assets/js/category/category.js',
        'public/assets/js/category/category.js').
    js('resources/assets/js/custom/phone-number-country-code.js'
        , 'public/assets/js/custom/phone-number-country-code.js').
    js('resources/assets/js/client/client.js',
        'public/assets/js/client/client.js').
    js('resources/assets/js/client/create-edit.js',
        'public/assets/js/client/create-edit.js').
    js('resources/assets/js/product/product.js',
        'public/assets/js/product/product.js').
    js('resources/assets/js/product/create-edit.js',
        'public/assets/js/product/create-edit.js').
    js('resources/assets/js/invoice/invoice.js',
        'public/assets/js/invoice/invoice.js').
    js('resources/assets/js/invoice/create-edit.js',
        'public/assets/js/invoice/create-edit.js').
    js('resources/assets/js/settings/setting.js',
        'public/assets/js/settings/setting.js').
    js('resources/assets/js/tax/tax.js',
        'public/assets/js/tax/tax.js').
    js('resources/assets/js/currency/currency.js',
        'public/assets/js/currency/currency.js').
    js('resources/assets/js/users/user-profile.js',
        'public/assets/js/users/user-profile.js').
    js('resources/assets/js/sidebar_menu_search/sidebar_menu_search.js',
        'public/assets/js/sidebar_menu_search/sidebar_menu_search.js').
    js('resources/assets/js/invoice/invoice_payment_history.js',
        'public/assets/js/invoice/invoice_payment_history.js').
    js('resources/assets/js/client_panel/invoice/invoice.js',
        'public/assets/js/client_panel/invoice/invoice.js').
    js('resources/assets/js/transaction/transaction.js',
        'public/assets/js/transaction/transaction.js').
    js('resources/assets/js/client_panel/transaction/transaction.js',
        'public/assets/js/client_panel/transaction/transaction.js').
    js('resources/assets/js/settings/invoice-template.js',
        'public/assets/js/settings/invoice-template.js').
    js('resources/assets/js/client/invoice.js',
        'public/assets/js/client/invoice.js').
    js('resources/assets/js/invoice/invoice_send.js',
        'public/assets/js/invoice/invoice_send.js').
    js('resources/assets/js/payment/payment.js',
        'public/assets/js/payment/payment.js').js('resources/assets/js/fullscreen/fullscreen.js',
    'public/assets/js/fullscreen/fullscreen.js').js('resources/assets/js/custom/payment.js',
    'public/assets/js/custom/payment.js').version();

mix.copyDirectory('resources/theme/webfonts', 'public/assets/webfonts')
// mix.copyDirectory('resources/theme/css/fonts', 'public/css/fonts')
mix.copyDirectory('resources/theme/css/fonts', 'public/assets/css/fonts')

mix.babel(
    'vendor/phpunit/php-code-coverage/src/Report/Html/Renderer/Template/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');
