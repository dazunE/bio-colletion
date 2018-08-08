<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://dasun.blog
 * @since             1.0.0
 * @package           Bio_Collection
 *
 * @wordpress-plugin
 * Plugin Name:       BioCollections
 * Plugin URI:        https://ceylon.solutions/bio-collections
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dasun Edirisinghe
 * Author URI:        http://dasun.blog
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bio-collection
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

define( 'TEXT_DOMAIN', 'bio-collection');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bio-collection-activator.php
 */
function activate_bio_collection() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bio-collection-activator.php';
	Bio_Collection_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bio-collection-deactivator.php
 */
function deactivate_bio_collection() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bio-collection-deactivator.php';
	Bio_Collection_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bio_collection' );
register_deactivation_hook( __FILE__, 'deactivate_bio_collection' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bio-collection.php';

/*
 * Meta Box Library
 */

require_once plugin_dir_path( __FILE__ ) . 'vendor/inc/loader.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bio_collection() {

	$plugin = new Bio_Collection();
	$plugin->run();
	$meta_box = new RWMB_Loader();
	$meta_box->init();

}
run_bio_collection();

