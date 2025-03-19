<?php
/**
 * Functions related to plugin activation.
 *
 * @package WPMB_AME_Styler
 */

namespace WPMB_AME_Styler;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin activation hook.
 *
 * @return void
 */
function activate() {

	$is_ame_active = \is_plugin_active( 'admin-menu-editor/menu-editor.php' );

	if ( false === $is_ame_active() ) {
		\deactivate_plugins( 'jwr-admin-menu-styler/index.php' );
		// [] TODO: Add an admin notice.
		exit;
	}
}
add_action( 'activate_plugin', __NAMESPACE__ . '\activate' );
