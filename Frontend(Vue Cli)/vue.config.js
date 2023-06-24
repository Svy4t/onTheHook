const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
  transpileDependencies: true,
  chainWebpack: (config) => {
    config.module
      .rule("fonts")
      .test(/\.(woff|woff2)$/)
      .use("file-loader")
      .loader("file-loader")
      .tap((options) => {
        options = {
          // limit: 10000,
          name: "/assets/fonts/[name].[ext]",
        };
        return options;
      })
      .end();
  },
});
