<?php

namespace WPPluginStarter;

class Hooks {

    /**
     * Class constructor
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    public function __construct() {
        /**
         * ===== Add classes here using related hooks =====
         */
        add_action( 'rest_api_init', [ self::class, 'register_rest_controller' ] );
        // add_action( 'init', [ Block::class, 'register_block' ] );
        // add_filter( 'enqueue_block_editor_assets', [ Block::class, 'register_scripts' ] );
    }

    /**
     * Register REST Controller
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    public static function register_rest_controller() {
        // $rest_controller = new RESTController();
        // $rest_controller->register_routes();
    }
}
