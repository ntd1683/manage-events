const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            jQuery: path.resolve(__dirname, "node_modules/jquery"),
        },
    },
};
