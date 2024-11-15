<?php

declare(strict_types=1);

use Plugin_Example\Includes\Example_Table;
use Plugin_Example\Includes\WP_REST_API;

/**
 * Load Includes files
 */
require_once 'includes/class-example-table.php';
require_once 'includes/class-shortcode.php';
require_once 'includes/class-wp-rest-api.php';

/**
 * Load Styles files
 */
require_once 'styles/html/class-shortcode-html.php';

/**
 * Instantiate REST Routes
 */
$example_table = new Example_Table();
$wp_rest_api  = new WP_REST_API( $example_table );

/**
 * Register Activation hooks 
 */
register_activation_hook( CODE_EXAMPLE_PLUGIN_INDEX, [ 'Plugin_Example\Includes\Example_Table', 'create_example_table' ] );
register_activation_hook( CODE_EXAMPLE_PLUGIN_INDEX, [ 'Plugin_Example\Includes\Example_Table', 'example_data' ] );

// Register Deactivation hooks
register_deactivation_hook( CODE_EXAMPLE_PLUGIN_INDEX, [ 'Plugin_Example\Includes\Example_Table', 'drop_example_table' ] );

// Add actions
add_action( 'rest_api_init', 'register_custom_plugin_rest_route' );
add_action( 'wp_enqueue_scripts', 'add_plugin_main_css' );
add_action( 'init', 'register_shortcodes' );

/**
 * Add the main stylesheet for this plugin
 * 
 * @return void
 */
function add_plugin_main_css(): void
{
    wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . "styles/css/main.css" );
}

/**
 * Register shortcodes 
 * 
 * @return void
 */
function register_shortcodes(): void
{
    add_shortcode( 'display_records', [ 'Plugin_Example\Includes\Shortcode', 'display_records_shortcode' ] );
}

/**
 * Register a custom route in the REST API for this plugin
 * 
 * @return void
 */
function register_custom_plugin_rest_route(): void
{
    global $wp_rest_api;
    register_rest_route( 'custom-plugin/v1', '/records', [ 
        'methods'  => 'GET',
        'callback' => [ $wp_rest_api, 'show_filtered_records' ],
    ] );
}
