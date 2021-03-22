const defaultConfig = require( '@wordpress/scripts/config/.eslintrc' );
const prettierConfig = require( './.prettierrc.js' );

module.exports = {
    ...defaultConfig,
    rules: {
        ...defaultConfig.rules,
        'prettier/prettier': [ 'error', prettierConfig ],
        'no-unused-expressions': [
            'error',
            {
                allowShortCircuit: true,
            },
        ],
        '@wordpress/i18n-text-domain': [
            'error',
            {
                allowedTextDomain: [ 'wp-plugin-starter' ],
            },
        ],
    },
    globals: {
        wpPluginStarter: true,
    },
};
