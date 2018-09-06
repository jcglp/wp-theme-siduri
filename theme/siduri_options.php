<?php
/**
 * Create A Simple Theme Options Panel
 * https://www.wpexplorer.com/wordpress-theme-options/
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'SIDURI_Theme_Options' ) ) {

	class SIDURI_Theme_Options {

		/**
		 * Start things up
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			// We only need to register the admin panel on the back-end
			if ( is_admin() ) {
				add_action( 'admin_menu', array( 'SIDURI_Theme_Options', 'add_admin_menu' ) );
				add_action( 'admin_init', array( 'SIDURI_Theme_Options', 'register_settings' ) );
			}

		}

		/**
		 * Returns all theme options
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_options() {
			return get_option( 'SIDURI_theme_options' );
		}

		/**
		 * Returns single theme option
		 *
		 * @since 1.0.0
		 */
		public static function get_theme_option( $id ) {
			$options = self::get_theme_options();
			if ( isset( $options[$id] ) ) {
				return $options[$id];
			}
		}

		/**
		 * Add sub menu page
		 *
		 * @since 1.0.0
		 */
		public static function add_admin_menu() {
			add_submenu_page(
				'themes.php',
				esc_html__( 'SIDURI Configuración', SIDURI_TEXTDOMAIN ),
				esc_html__( 'SIDURI Configuración', SIDURI_TEXTDOMAIN ),
				'manage_options',
				'theme-settings',
				array( 'SIDURI_Theme_Options', 'create_admin_page' )
			);
		}

		/**
		 * Register a setting and its sanitization callback.
		 *
		 * We are only registering 1 setting so we can store all options in a single option as
		 * an array. You could, however, register a new setting for each option
		 *
		 * @since 1.0.0
		 */
		public static function register_settings() {
			register_setting( 'SIDURI_theme_options'
                      , 'SIDURI_theme_options'
                      , array( 'SIDURI_Theme_Options', 'sanitize' ) );
		}

		/**
		 * Sanitization callback
		 *
		 * @since 1.0.0
		 */
		public static function sanitize( $options ) {
			error_log(json_encode($options));
			// If we have options lets sanitize them
			if ( $options ) {
        /* DEJO COMENTADOS EJEMPLOS DE SANITAZACIÓN DE DATOS

				// Checkbox
				if ( ! empty( $options['checkbox_example'] ) ) {
					$options['checkbox_example'] = 'on';
				} else {
					unset( $options['checkbox_example'] ); // Remove from options if not checked
				}
*/
				// Input
				if ( ! empty( $options['direccion'] ) ) {
					$options['direccion'] = sanitize_text_field( $options['direccion'] );
				} else {
					unset( $options['direccion'] ); // Remove from options if empty
				}

				if ( ! empty( $options['telefono'] ) ) {
					$options['telefono'] = sanitize_text_field( $options['telefono'] );
				} else {
					unset( $options['telefono'] ); // Remove from options if empty
				}


				if ( ! empty( $options['fax'] ) ) {
					$options['fax'] = sanitize_text_field( $options['fax'] );
				} else {
					unset( $options['fax'] ); // Remove from options if empty
				}

				if ( ! empty( $options['email'] ) ) {
					$options['email'] = sanitize_text_field( $options['email'] );
				} else {
					unset( $options['email'] ); // Remove from options if empty
				}


				// Select
				/*if ( ! empty( $options['plataforma_envio_sms'] ) ) {
					$options['plataforma_envio_sms'] = sanitize_text_field( $options['plataforma_envio_sms'] );
				}*/

			}

			// Return sanitized options
			return $options;

		}

		/**
		 * Settings page output
		 *
		 * @since 1.0.0
		 */
		public static function create_admin_page() { ?>

			<div class="wrap">

				<h1><?php esc_html_e( 'Configuración del Tema', SIDURI_TEXTDOMAIN ); ?></h1>

        <?php /*
          PARA AÑADIR MÁS CAMPOS, CONSULTA LA URL DE DONDE SALIO EL CODIGO
           https://www.wpexplorer.com/wordpress-theme-options/
        */ ?>
				<form method="post" action="options.php">

					<?php settings_fields( 'SIDURI_theme_options' ); ?>

					<h2><u><?php _e('Contacto', SIDURI_TEXTDOMAIN);?></u></h2>
					<table class="form-table">
						<tr valgn="top" class="">
							<th scope="row"><?php esc_html_e( 'Dirección', SIDURI_TEXTDOMAIN ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'direccion' ); ?>
								<input id="siduriu-direccion" name="SIDURI_theme_options[direccion]" type="text" value="<?php echo $value;?> "
								style="width:30em" >
							</td>
            </tr>
            <tr>
							<th scope="row"><?php esc_html_e( 'Teléfonos', SIDURI_TEXTDOMAIN ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'telefono' ); ?>
								<input id="siduriu-telefono" name="SIDURI_theme_options[telefono]" type="text" value="<?php echo $value;	 ?> ">
								<?php $value = self::get_theme_option( 'fax' ); ?>
								<input id="siduriu-fax" name="SIDURI_theme_options[fax]" type="text" value="<?php echo $value;	 ?> ">
							</td>

						</tr>

						<tr>
							<th scope="row"><?php esc_html_e( 'Email', SIDURI_TEXTDOMAIN ); ?></th>
							<td>
								<?php $value = self::get_theme_option( 'email' ); ?>
								<input id="siduriu-email" name="SIDURI_theme_options[email]" type="email" value="<?php echo $value;	 ?> ">

							</td>

						</tr>



            <tr>
              <td>
              <hr>
            </td></tr>

					</table>

					<?php submit_button(); ?>

				</form>

			</div><!-- .wrap -->
		<?php }

	}
}
new SIDURI_Theme_Options();

// Helper function to use in your theme to return a theme option value
function SIDURI_get_theme_option( $id = '' ) {
	return SIDURI_Theme_Options::get_theme_option( $id );
}
