<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://belovdigital.agency
 * @since      1.0.0
 *
 * @package    Blocks_Editor_Customizer
 * @subpackage Blocks_Editor_Customizer/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Blocks_Editor_Customizer
 * @subpackage Blocks_Editor_Customizer/includes
 * @author     Belov Digital Agency <andrievskikh.egor@gmail.com>
 */
class Gutenberg_Customizer_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-block-customization-gutenberg',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
