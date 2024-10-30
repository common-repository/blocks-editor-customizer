<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://belovdigital.agency
 * @since             1.0
 * @package           Blocks_Editor_Customizer
 *
 * @wordpress-plugin
 * Plugin Name:       Blocks Editor Interface Customizer
 * Plugin URI:        https://wordpress.org/plugins/blocks-editor-customizer
 * Description:       Plugin for changing the default style values ​​of the gutenberg block editor.
 * Version:           1.2
 * Author:            Belov Digital Agency
 * Author URI:        https://belovdigital.agency
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       blocks-editor-customizer
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GUTENBERG_CUSTOMIZER_VERSION', '1.3' );
define( 'GUTENBERG_CUSTOMIZER_PLUGIN_FILE', plugin_basename( __FILE__ ) );



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gutenberg-customizer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gutenberg_customizer() {

	$plugin = new Gutenberg_Customizer();
	$plugin->run();

}
run_gutenberg_customizer();
