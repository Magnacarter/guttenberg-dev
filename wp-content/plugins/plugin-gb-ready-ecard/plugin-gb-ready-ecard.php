<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://github.com/PETAF/plugin-gb-ready-ecard/
 * @since             1.0.0
 * @package           PETA\Plugin_GB_Ready_eCard\
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Guttenberg Block Ready eCard
 * Plugin URI:        http://www.peta.org
 * Description:       Editing ecards with Guttenberg blocks
 * Version:           1.0.0
 * Author:            PETA
 * Author URI:        http://www.peta.org
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-gb-ready-ecard
 * Domain Path:       /languages
 */
namespace PETA\Plugin_GB_Ready_eCard;
use Puc_v4_Factory;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217?' );
}

define( 'ECARD_URL', plugin_dir_url( __FILE__ ) );
define( 'ECARD_DIR', plugin_dir_path( __DIR__ ) );
define( 'ECARD_VER', '1.0.0' );
$plugin = new Init_Plugin();

require ECARD_DIR . 'plugin-gb-ready-ecard/plugin-update-checker-4.7/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/PETAF/plugin-gb-ready-ecard/',
	__FILE__, //Full path to the main plugin file or functions.php.
	'plugin-gb-ready-ecard'
);

$myUpdateChecker->setAuthentication('47b50c71cde28d805345ba053b023f25c02e419e');
$myUpdateChecker->setBranch('master');

/**
 * Class Init_Plugin
 */
class Init_Plugin {

	/**
	 * Construct function
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function __construct() {
		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		}

		// Load the plugin's files
		$this->init_autoloader();

		register_activation_hook( __FILE__, array( $this, 'activate_plugin' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate_plugin' ) );
		register_uninstall_hook( __FILE__, array( $this, 'uninstall_plugin' ) );
	}

	/**
	 * Enqueue admin scripts and styles
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function admin_scripts() {
		wp_enqueue_style( 'peta-ecard-styles', ECARD_URL . 'assets/dist/ecard-css-min.css', ECARD_VER );
		wp_enqueue_script( 'peta-ecard-script', ECARD_URL . 'assets/dist/ecard-scripts-min.js', array( 'jquery' ), ECARD_VER, true );
	}

	/**
	 * Plugin activation handler
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public static function activate_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		flush_rewrite_rules();
	}

	/**
	 * The plugin is deactivating.  Delete out the rewrite rules option.
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public static function deactivate_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		delete_option( 'rewrite_rules' );
	}

	/**
	 * Uninstall plugin handler
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public static function uninstall_plugin() {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}
		check_admin_referer( 'bulk-plugins' );

		// Important: Check if the file is the one
		// that was registered during the uninstall hook.
		if ( __FILE__ != WP_UNINSTALL_PLUGIN ) {
			return;
		}
		delete_option( 'rewrite_rules' );
	}

	/**
	 * Kick off the plugin by initializing the plugin files.
	 *
	 * @since 3.0.0
	 * @return void
	 */
	public function init_autoloader() {
		require_once 'lib/class-ecard-post-types.php';
		require_once 'lib/enqueue-scripts.php';

		// Register meta boxes
		require_once 'lib/meta-boxes.php';

		// Block Templates
		require_once 'lib/block-templates.php';

		// Dynamic Blocks
		require_once 'blocks/12-dynamic/index.php';
	}
}
