<?php


/*
 *
 * Admin
 *
 */
class Hots_Admin {


  /*
   *
   * Plugin name
   *
   */
  private $plugin_name;


  /*
   *
   * Plugin version
   *
   */
  private $version;


  /*
   *
   * Construct
   *
   */
  public function __construct ($plugin_name, $version) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
  }


  /*
   *
   * Define hooks
   *
   */
  public function define_hooks ($loader) {

    $loader->add_action ('admin_enqueue_scripts', $this, 'enqueue_styles');
    $loader->add_action ('admin_enqueue_scripts', $this, 'enqueue_scripts');
  }


  /*
   *
   * Register the stylesheets for the admin area.
   *
   */
  public function enqueue_styles () {
    wp_enqueue_style ($this->plugin_name, plugin_dir_url (__FILE__) . 'css/hots-admin.css', array (), $this->version, 'all');
  }


  /*
   *
   * Register the JavaScript for the admin area.
   *
   */
  public function enqueue_scripts () {
    wp_enqueue_script ($this->plugin_name, plugin_dir_url (__FILE__) . 'js/hots-admin.js', array ('jquery'), $this->version, false);
  }
}
