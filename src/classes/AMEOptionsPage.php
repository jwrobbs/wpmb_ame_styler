<?php
/**
 * Class for the Admin Menu Options Page.
 *
 * @package WPMB_AME_Styler
 */

namespace WPMB_AME_Styler\classes;

defined( 'ABSPATH' ) || exit;

/**
 * Class for the Admin Menu Options Page.
 */
class AMEOptionsPage {
	/**
	 * The option name.
	 *
	 * @var string
	 */
	private $option_name = 'ame_options';

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	/**
	 * Add the options page to the admin menu.
	 */
	public function add_options_page() {
		add_menu_page(
			'AME Options', // Page title.
			'AME Options', // Menu title.
			'manage_options', // Capability.
			'ame-options', // Menu slug.
			array( $this, 'render_options_page' ), // Callback.
			'', // Icon URL.
			100 // Position.
		);
	}

	/**
	 * Render the options page.
	 */
	public function render_options_page() {
		?>
		<div class="wrap">
			<h1>AME Options</h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( $this->option_name );
				do_settings_sections( $this->option_name );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register the settings.
	 */
	public function register_settings() {
		register_setting(
			$this->option_name,
			$this->option_name,
			array(
				'sanitize_callback' => array( $this, 'sanitize_options' ),
			)
		);

		add_settings_section(
			'ame_color_settings', // ID.
			'Color Settings', // Title.
			null, // Callback.
			$this->option_name // Page.
		);

		$fields = array(
			'foreground'        => 'Foreground Color',
			'background'        => 'Background Color',
			'active_foreground' => 'Active Foreground Color',
			'active_background' => 'Active Background Color',
		);

		foreach ( $fields as $field_id => $field_label ) {
			add_settings_field(
				$field_id, // ID.
				$field_label, // Title.
				array( $this, 'render_color_picker_field' ), // Callback.
				$this->option_name, // Page.
				'ame_color_settings', // Section.
				array( 'id' => $field_id ) // Args.
			);
		}
	}

	/**
	 * Render the color picker field.
	 *
	 * @param array $args Field arguments.
	 */
	public function render_color_picker_field( $args ) {
		$options = get_option( $this->option_name );
		$value   = isset( $options[ $args['id'] ] ) ? esc_attr( $options[ $args['id'] ] ) : '';
		?>
		<input type="text" name="<?php echo $this->option_name . '[' . $args['id'] . ']'; ?>" value="<?php echo $value; ?>" class="color-picker" data-default-color="#ffffff" />
		<?php
	}

	/**
	 * Sanitize the options.
	 *
	 * @param array $options Options to sanitize.
	 * @return array Sanitized options.
	 */
	public function sanitize_options( $options ) {
		foreach ( $options as $key => $value ) {
			$options[ $key ] = sanitize_hex_color( $value );
		}
		return $options;
	}
}

