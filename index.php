<?php
/**
 * Plugin Name: WPMB AME Styler
 * Plugin URI: https://joshrobbs.com
 * Description: A plugin to style meta boxes in WordPress.
 * Version: 0.1.0
 * Author: Josh Robbs
 * Author URI: https://joshrobbs.com
 * License: The Unlicense
 *
 * @package WPMB_AME_Styler
 */

namespace WPMB_AME_Styler;

use WPMB_AME_Styler\classes\AdminMenuStyle;
use WPMB_AME_Styler\classes\AMEOptionsPage;

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/constants.php';
require_once __DIR__ . '/activation.php';

new AdminMenuStyle(); // refactor to use static fns.
new AMEOptionsPage(); // refactor to use static fns.
