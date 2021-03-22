<?php

namespace WPPluginStarter\Traits;

/**
 * Singleton Trait
 *
 * @since SINCE_TAG
 */
trait SingletonTrait {

    /**
     * The single instance of the class.
     *
     * @since SINCE_TAG
     *
     * @var object
     */
    protected static $instance = null;

    /**
     * Constructor
     *
     * @since SINCE_TAG
     *
     * @return void
     */
    protected function __construct() {}

    /**
     * Get class instance.
     *
     * @since SINCE_TAG
     *
     * @return object Instance.
     */
    final public static function instance() {
        if ( is_null( static::$instance ) ) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Prevent cloning.
     *
     * @since SINCE_TAG
     */
    private function __clone() {}

    /**
     * Prevent unserializing.
     *
     * @since SINCE_TAG
     */
    private function __wakeup() {}
}
