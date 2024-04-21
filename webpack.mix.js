// webpack.mix.js

let mix = require("laravel-mix");

mix
  .setPublicPath("assets")
  .sourceMaps()
  .webpackConfig({
    devtool: "source-map",
  })
  .js("src/js/script.js", "assets/js")
  .postCss('src/css/style.css', 'assets/css', [
    require('postcss-custom-properties'),
    require('postcss-import'),
    require('postcss-url'),
    require('postcss-nesting')
  ])
  // .sass("src/scss/style.scss", "assets/css")
  .browserSync({
    proxy: "http://lucia-monge-portfolio.test/",
    files: ["assets/**/*", "site/**/*", "content/**/*"],
  })
  .disableSuccessNotifications();
