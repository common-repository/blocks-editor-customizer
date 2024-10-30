<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://belovdigital.agency
 * @since      1.0.0
 *
 * @package    Blocks_Editor_Customizer
 * @subpackage Blocks_Editor_Customizer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Blocks_Editor_Customizer
 * @subpackage Blocks_Editor_Customizer/admin
 * @author     Belov Digital Agency <andrievskikh.egor@gmail.com>
 */
class Gutenberg_Customizer_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gutenberg_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gutenberg_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/gutenberg-customizer-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Gutenberg_Customizer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Gutenberg_Customizer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/gutenberg-customizer-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Plugin settings link.
	 *
	 * @since    1.0.0
	 */
	public function plugin_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=iris_color_pick">'. __( 'Settings', 'gutenberg-customizer' ) .'</a>';
		array_push( $links, $settings_link );
		return $links;
	}

}



class customizationGutenberg {
	function __construct(){
		add_action( 'admin_init', array( $this, 'init') );
		add_action( 'admin_menu', array( $this, 'add_options_page') );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts') );
	}

	function init(){
		register_setting( 'iris_options', 'iris_options' );
	}

	function add_options_page(){
		add_options_page( 'Gutenberg Customizer', 'Gutenberg Customizer', 'manage_options', 'iris_color_pick', array( $this, 'options') );
	}


	function options(){
		?>
	<div class="wrap-option-plugin">
		<div class="wrapper-description-plugin">
			<h1><?php echo get_admin_page_title() ?></h1>
			<div class="description">
				<p>
					With Gutenberg Customizer, you can adjust the WordPress block editor to fit your needs: from screen size to colors. This plugin allows setting the desired field width for the main editor and the sidebar. And not only that: Gutenberg Customizer provides the Dark Mode for the editor. Configure your work area and let it aid your productivity, not hamper it.
				</p>

			</div>
		</div>
		<form method="post" action="options.php">
			<?php
				settings_fields( 'iris_options' );
				$options = get_option( 'iris_options' );
				if (empty($options['clear_witdh'])) {
					$options['clear_witdh'] = 0;
				}
				if (empty($options['clear_witdh_sidebar'])) {
					$options['clear_witdh_sidebar'] = 0;
				}

			?>
			<?php
				if (!empty($options['dark_mode'])) {
					$options['dark_mode'] = 'checked';
				}
				else {
					$options['dark_mode'] = '';
				}

			 ?>
			<h2>Change background Gutenberg block</h2>
			<p><input class="iris_color" name="iris_options[link_color]" id="link-color" type="text" value="<?php echo (!empty($options['link_color'])) ? $options['link_color'] : ''; ?>"></p>
			<h2>Change width "%" Gutenberg block</h2>
			<div class="wrapper-input">
				<input type="number" name="iris_options[width]" id="gutenberg-width" min='1' max='100' value="<?php echo (!empty($options['width'])) ? $options['width'] : ''; ?>"><span class="span-value"> %</span>
				<div class="slidecontainer">
  				<input type="range" min="1" max="100" class="slider"  id="my-range-1">
				</div>
				<button id="button-gutenberg-width-clear" type="button" name="button" class="wp-picker-clear">Reset</button>
				<input id="input-gutenberg-width-clear" type="number" name="iris_options[clear_witdh]" value="<?php echo $options['clear_witdh']; ?>">
			</div>

			<h2>Change width "px" Gutenberg sidebar block</h2>
			<div class="wrapper-input">
				<input type="number" name="iris_options[width_sidebar]" id="gutenberg-width-sidebar" min='280' max='1200' value="<?php echo (!empty($options['width_sidebar'])) ? $options['width_sidebar'] : ''; ?>"><span class="span-value"> px</span>
				<div class="slidecontainer">
					<input type="range" min="280" max="1200"  class="slider" id="my-range-2">
				</div>
				<button id="button-gutenberg-width-sidebar-clear" type="button" name="button" class="wp-picker-clear">Reset</button>
				<input  id="input-gutenberg-width-sidebar-clear" type="number" name="iris_options[clear_witdh_sidebar]" value="<?php echo $options['clear_witdh_sidebar']; ?>">
			</div>

			<h2 class="dark-mode-title">Dark mode</h2>
			<p class="wrapper-checkbox-dark-mode">
				<label class="checkbox-ios">
					<input type="checkbox" name="iris_options[dark_mode]" id="gutenberg-dark-mode" value="dark_mode" <?php echo $options['dark_mode']; ?>>
					<span class="checkbox-ios-switch"></span>
				</label>
				<span class="state-dark-mode"></span>
			</p>
			<?php submit_button();?>
		</form>
	 </div>
		<?php
	}


	function enqueue_scripts() {

		if( !is_admin() )
			return;
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );

		add_action( 'admin_footer', array( $this, 'admin_footer_script'), 99 );
		add_action( 'admin_footer', array( $this, 'admin_header_style'), 99 );
	}


	function admin_footer_script(){
		?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.iris_color').wpColorPicker({
				defaultColor: false,

				change: function(event, ui){
				},
				clear: function(){ },
				palettes: true
			});
			$('.button.wp-picker-clear').attr('value','Reset');

		});
		</script>
		<?php
	}

	function admin_header_style() {
		?>
			<style>
			<?php
				$options = get_option( 'iris_options' );

				if (empty($options['clear_witdh'])) {
					$options['clear_witdh'] = 0;
				}
				if (empty($options['clear_witdh_sidebar'])) {
					$options['clear_witdh_sidebar'] = 0;
				}

				$clear_width   			 = $options['clear_witdh'];
				$clear_witdh_sidebar = $options['clear_witdh_sidebar'];
			?>
			<?php if (!empty($options['width']) && ( $clear_width != 1)): ?>
				.block-editor-writing-flow{
					max-width: <?php echo "{$options['width']}%" ?> !important;
					width: <?php echo "{$options['width']}%" ?> !important;
					margin: 0 auto !important;
				}
				.wp-block {
					max-width: 100% !important;
					width: 100% !important;
					margin: 0 !important;
				}
			<?php endif; ?>
			<?php if (!empty($options['link_color'])): ?>
				.editor-styles-wrapper {
				 	background-color: <?php echo $options['link_color'] ?>  !important;
				}
			<?php endif; ?>
			<?php if (!empty($options['width_sidebar']) && ($clear_witdh_sidebar != 1)): ?>
				.interface-complementary-area.edit-post-sidebar {
					width: <?php echo $options['width_sidebar'] . 'px'?> !important;
				}
			<?php endif; ?>
			<?php if (!empty($options['dark_mode'])): ?>
			/* dark mode */
				#editor .interface-interface-skeleton__header,
				#editor .edit-post-header,
				#editor .components-panel__header,
				#editor .components-panel__body,
				#editor .interface-interface-skeleton__footer,
				#editor .block-editor-block-breadcrumb,
				#editor .interface-interface-skeleton__sidebar,
				#editor .interface-complementary-area.edit-post-sidebar,
				#editor .components-panel,
				#editor .acf-block-fields.acf-fields,
				#editor .block-editor-block-contextual-toolbar,
				#editor .block-editor-inserter__tabs .components-tab-panel__tabs {
					background-color: #181818 !important;
					border-color: #444 !important;
					color: #fff !important;
				}
				#editor .acf-field .acf-input,
				#editor .acf-table>thead>tr>th,
				#editor .acf-repeater .acf-row-handle.order,
				#editor .acf-table>tbody>tr>td {
					background-color: #202020  !important;
					border-color: #444 !important;
					color: #fff !important;
				}
				#editor .components-panel__body-toggle.components-button .components-panel__arrow,
				#editor .block-editor-block-card__title,
				#editor .acf-input-wrap input,
				#editor .acf-url i {
					color: #fff !important;
				}
				#editor .components-panel__body-title:hover {
					background-color: #202020 !important;
				}
				#editor .components-text-control__input,
				#editor .components-placeholder__input,
				.components-combobox-control__input {
					border-color: #fff !important;
					color: #fff !important;
					background-color: #202020  !important;
				}
				#editor .editor-post-featured-image__toggle,
				#editor .block-editor-block-inspector__no-blocks {
					background-color: #949494 !important;
				}
				#editor .components-button,
				#editor .block-editor-block-breadcrumb__button.components-button,
				#editor .block-editor-block-breadcrumb__current,
				#editor .table-of-contents__wrapper li,
				#editor .table-of-contents__wrapper span,
				#editor .block-editor-block-navigation__label,
				#editor .block-editor-block-types-list__item-icon,
				#editor .block-editor-inserter__panel-title {
					color: #fff !important;
				}
				#editor .acf-table {
					border-color: #444 !important;
				}
				#editor .components-popover__content,
				#editor .block-editor-inserter__search {
					background-color: #181818 !important;
				}
				#editor .block-editor-inserter__content {
					background-color: #181818 !important;
					border-color: #444 !important;
					color: #fff !important;
				}
				#editor .edit-post-header-toolbar .edit-post-header-toolbar__left>.components-button.has-icon.is-pressed,
				#editor .edit-post-header-toolbar .edit-post-header-toolbar__left>.components-dropdown>.components-button.has-icon.is-pressed,
				#editor .components-button.is-secondary:active:not(:disabled), .components-button.is-tertiary:active:not(:disabled) {
					background-color: #fff !important;
					color: #181818 !important;
				}
				#editor .components-button.editor-post-switch-to-draft.is-tertiary:active,
				#editor .components-button.block-editor-post-preview__button-toggle.components-dropdown-menu__toggle.is-tertiary:active {
					color: #181818 !important;
				}
				#editor .components-button.editor-post-last-revision__title.has-text.has-icon:hover {
					background-color: #202020  !important;
				}
				#editor .block-editor-block-navigation-block-contents:hover {
					color: #181818 !important;
				}
				#editor .components-button.components-circular-option-picker__option {
					color: transparent !important;
				}
				.editor-post-taxonomies__hierarchical-terms-input,
				.components-form-token-field__input,
				.components-font-size-picker__number {
					color: #fff !important;
				}
				.components-custom-select-control__menu li,
				#editor .block-editor-link-control__search-item,
				#editor .components-notice__action {
					color: #181818 !important;
				}
				.components-placeholder,
				.components-toolbar-button {
					background-color: #202020  !important;
					color: #fff !important;
				}
				.components-placeholder input,
				.block-editor-url-input__input,
				.block-editor-media-placeholder__url-input-field {
					color: #fff !important;
				}
				.components-menu-group {
					background-color: #202020  !important;
				}
				.components-external-link,
				.components-menu-group .components-menu-group__label,
				.table-of-contents__title,
				.document-outline li a {
					color: #fff !important;
				}
				.components-notice.is-warning {
    			border-left-color: #ffa900;
    			background-color: #fff;
				}
				.block-editor-block-variation-picker__variation svg {
					color: #181818 !important;
				}
				.editor-post-publish-panel__header,
				.editor-post-publish-panel,
				.editor-post-publish-panel__footer {
					background: #181818 !important;
				}
				.editor-post-publish-panel__content,
				.post-publish-panel__postpublish-header a,
				.post-publish-panel__postpublish-header strong,
				.editor-post-publish-panel__footer,
				.components-datetime__time input {
					color: #fff !important;
				}
				.editor-post-visibility__dialog-radio {
					border:1px solid #fff !important;
				}
				#editor .components-notice button {
					color: #000 !important;
				}
				/* dark mode */
			<?php endif; ?>

			</style>

		<?php
	}

}
new customizationGutenberg();
