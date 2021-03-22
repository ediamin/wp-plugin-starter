<?php
/**
 * Plugin Name: WP Plugin Starter
 * Plugin URI: http://plugin-url.com
 * Description: Some plugin description
 * Version: 1.0.0
 * Author: Author Name
 * Author URI: http://plugin-author-url.com
 * Text Domain: wp-plugin-starter
 * Domain Path: /languages/
 */

// Do not call the file directly.
defined( 'ABSPATH' ) || exit;

class_exists( 'WPPluginStarter\Plugin' ) || require_once __DIR__ . '/vendor/autoload.php';

define( 'WP_PLUGIN_STARTER_FILE', __FILE__ );
define( 'WP_PLUGIN_STARTER_ABSPATH', dirname( WP_PLUGIN_STARTER_FILE ) );
define( 'WP_PLUGIN_STARTER_URL', plugins_url( '', WP_PLUGIN_STARTER_FILE ) );

// Initialize
wp_plugin_starter();
