const path = require("path");

module.exports = {
    entry: {
        app: "./resources/js/app.js",
        styles: "./resources/sass/app.scss",
    },
    output: {
        path: path.resolve(__dirname, "public/assets"),
        filename: "[name].js",
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: ["style-loader", "css-loader", "sass-loader"],
            },
        ],
    },
};
