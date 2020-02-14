const Encore = require("@symfony/webpack-encore");
let tailwindcss = require("tailwindcss");

const purgecss = require("@fullhuman/postcss-purgecss")({
  content: ["./templates/**/*.twig", "./templates/**/*.html"],
  defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
});

Encore.setOutputPath("public/build/")
  .setPublicPath("/build")
  .addStyleEntry("tailwind", "./public/css/tailwind.css")
  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  // enable post css loader
  .enablePostCssLoader(options => {
    options.plugins = [
      tailwindcss("./tailwind.config.js"), // your tailwind.js configuration file path
      require("autoprefixer"),
      require("postcss-import")
    ];
    if (Encore.isProduction()) {
      options.plugins.push(purgecss);
    }
  });
module.exports = Encore.getWebpackConfig();
