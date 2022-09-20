<?php

/**
 * @wordpress-plugin
 * Plugin Name:       📦 Heart of Trons 荊棘之心
 * Plugin URI:        http://facebook.com/protype.tw
 * Description:       Heart of Trons 荊棘之心
 * Version:           0.0.0
 * Author:            🅿𝑃𝑅𝑂𝑇𝑌𝑃𝐸
 * Author URI:        http://facebook.com/protype.tw
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       hots
 * Domain Path:       /languages
 */


if (! defined ('WPINC'))
  die;


/**
 *
 * Currently plugin version.
 *
 */
define( 'HOTS_VERSION', '0.0.1');


/**
 *
 * Activate plugin
 *
 */
function activate_hots () {
  require_once plugin_dir_path (__FILE__) . 'includes/class-hots-activator.php';
  Hots_Activator::activate ();
}


/**
 *
 * Deactivate plugin
 *
 */
function deactivate_hots () {
  require_once plugin_dir_path (__FILE__) . 'includes/class-hots-deactivator.php';
  Hots_Deactivator::deactivate ();
}


/**
 *
 * Register hooks
 *
 */
register_activation_hook (__FILE__, 'activate_hots');
register_deactivation_hook (__FILE__, 'deactivate_hots');


/**
 *
 * Require cores
 *
 */
require plugin_dir_path (__FILE__) . 'vendor/autoload.php';
require plugin_dir_path (__FILE__) . 'includes/class-hots.php';


/**
 *
 * Execute
 *
 */
function run_hots () {
  $plugin = new Hots ();
  $plugin->run ();
}

run_hots ();
