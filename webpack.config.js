let Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    .copyFiles({
        from: './assets/pictures',
        to: 'images/[path][name].[ext]'
    })
    .copyFiles({
        from: './assets/profiles',
        to: 'profiles/[path][name].[ext]'
    })
    .addEntry('js/app', [
    './node_modules/jquery/dist/jquery.js',
    './node_modules/popper.js/dist/popper.min.js',
    './node_modules/bootstrap/dist/js/bootstrap.min.js',
    './node_modules/holderjs/holder.min.js',
    './node_modules/croppie/croppie.js',
    './assets/js/app.js',
    './assets/js/custom-bootstrap.js',
    './assets/js/profile-cropper-owner.js',
    './assets/js/profile-cropper-tenant.js'
    ])
    .addStyleEntry('css/app', [
        './node_modules/@fortawesome/fontawesome-free/css/all.css',
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './node_modules/croppie/croppie.css',
        './assets/css/base/animation.css',
        './assets/css/base/typography.css',
        './assets/css/components/buttons.css',
        './assets/css/components/cards.css',
        './assets/css/layout/footer.css',
        './assets/css/layout/header.css',
        './assets/css/layout/screens.css',
        './assets/css/layout/twitter-home.css'
    ]);


module.exports = Encore.getWebpackConfig();