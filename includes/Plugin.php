<?php

namespace WPPluginStarter;

use WPPluginStarter\Hooks;
use WPPluginStarter\Traits\SingletonTrait;

class Plugin {

    use SingletonTrait;

    /**
     * Plugin version.
     *
     * @since SINCE_TAG
     *
     * @var string
     */
    public $version = '1.0.0';

    /**
     * Minimum PHP version required
     *
     * @since SINCE_TAG
     *
     * @var string
     */
    public $min_php = '7.2.0';

    /**
     * Admin notice messages
     *
     * @since SINCE_TAG
     *
     * @var array
     */
    private $admin_notices = [];

    /**
     * Class constructor
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    public function __construct() {
        $this->define_constants();

        if ( ! $this->met_requirements() ) {
            add_action( 'admin_notices', [ $this, 'admin_notices' ] );
            return;
        }

        add_action( 'init', [ $this, 'load_plugin_textdomain' ] );
        new Hooks();
    }

    /**
     * Define plugin constants
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    private function define_constants() {
        define( 'WP_PLUGIN_STARTER_VERSION', $this->version );
        define( 'WP_PLUGIN_STARTER_ASSETS', WP_PLUGIN_STARTER_URL . '/assets' );
    }

    /**
     * Validate plugin requirements
     *
     * @since SINCE_TAG
     *
     * @return bool
     */
    private function met_requirements() {
        if ( version_compare( PHP_VERSION, $this->min_php, '<' ) ) {
            $this->admin_notices['unmet_php_version'] = sprintf(
                '<strong>%s</strong> requires PHP version <strong>%s</strong> but you are using version <strong>%s</strong>',
                'Reactive Forms',
                $this->min_php,
                PHP_VERSION
            );

            return false;
        }

        return true;
    }

    /**
     * Show admin notices
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    public function admin_notices() {
        foreach ( $this->admin_notices as $notice ) {
            printf( '<div class="error"><p>' . $notice . '</p></div>' );
        }
    }

    /**
     * Load plugin textdomain
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    public function load_plugin_textdomain() {
        load_plugin_textdomain( 'embed-github-profile', false, dirname( plugin_basename( WP_PLUGIN_STARTER_FILE ) ) . '/languages/' );
    }
}
