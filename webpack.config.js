const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const plugins = [];

function resolve( ...paths ) {
    return path.resolve( __dirname, ...paths );
}

defaultConfig.plugins.forEach( ( item ) => {
    if ( item.constructor.name.toLowerCase() === 'minicssextractplugin' ) {
        item.options.filename = '../css/[name].css';
        item.options.chunkFilename = '../css/[name].css';
        item.options.esModule = true;
    }

    if ( item.constructor.name.toLowerCase() === 'livereloadplugin' ) {
        return;
    }

    plugins.push( item );
} );

module.exports = {
    ...defaultConfig,

    plugins,

    entry: {
        admin: resolve( 'src/admin/index.js' ),
        frontend: resolve( 'src/frontend/index.js' ),
    },

    output: {
        filename: '[name].js',
        path: resolve( 'assets', 'js' ),
    },
};
