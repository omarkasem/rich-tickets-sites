<?php
/**
 * Plugin Name: Rich Tickets Sites
 * Description: A plugin for managing ticket sites
 * Version: 1.0.1
 * Author: Omar Kasem
 * Text Domain: rich-tickets-sites
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define plugin constants
define( 'RTS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'RTS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'RTS_PLUGIN_VERSION', '1.0.1' );

// Include required files
require_once RTS_PLUGIN_PATH . 'includes/class-snippets.php';
require_once RTS_PLUGIN_PATH . 'includes/class-option-page.php';

// Initialize classes
if ( class_exists( 'RTS_Snippets' ) ) {
    $rts_snippets = new RTS_Snippets();
}

// if ( class_exists( 'RTS_Option_Page' ) ) {
//     $rts_options = new RTS_Option_Page();
// }
