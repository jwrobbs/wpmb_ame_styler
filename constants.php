<?php
/**
 * Plugin constants.
 *
 * - Path
 * - URL
 *
 * @package WPMB_AME_Styler
 */

defined( 'ABSPATH' ) || exit;

// Plugin path.
if ( ! defined( 'WPMB_AME_STYLER_PATH' ) ) {
	define( 'WPMB_AME_STYLER_PATH', plugin_dir_path( __FILE__ ) );
}

// Plugin URL.
if ( ! defined( 'WPMB_AME_STYLER_URL' ) ) {
	define( 'WPMB_AME_STYLER_URL', plugin_dir_url( __FILE__ ) );
}
