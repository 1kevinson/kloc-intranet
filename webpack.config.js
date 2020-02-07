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
    .addEntry('js/app', [
    './node_modules/jquery/dist/jquery.slim.js',
    './node_modules/popper.js/dist/popper.min.js',
    './node_modules/bootstrap/dist/js/bootstrap.min.js',
    './node_modules/holderjs/holder.min.js',
    './assets/js/app.js'
])
    .addStyleEntry('css/app', [
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
        './assets/css/base/animation.css',
        './assets/css/base/typography.css',
        './assets/css/components/buttons.css',
        './assets/css/components/cards.css',
        './assets/css/layout/footer.css',
        './assets/css/layout/header.css',
        './assets/css/layout/image-home.css'
    ]);



module.exports = Encore.getWebpackConfig();