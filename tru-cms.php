<?php
/**
 * Plugin Name:     TRU CMS
 * Plugin URI:      therunup.com
 * Description:     CMS for The Run Up
 * Author:          Erik Mitchell
 * Author URI:      erikmitchell.net
 * Text Domain:     tru-cms
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         TRU_CMS
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Define TRU_CMS_PLUGIN_FILE.
if ( ! defined( 'TRU_CMS_PLUGIN_FILE' ) ) {
    define( 'TRU_CMS_PLUGIN_FILE', __FILE__ );
}

// Include the main TRU_CMS class.
if ( ! class_exists( 'TRU_CMS' ) ) {
    include_once dirname( __FILE__ ) . '/class-tru-cms.php';
}
