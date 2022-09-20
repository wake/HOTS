<?php


/*
 *
 * Public-facing
 *
 */
class Hots_Public {


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

    $loader->add_action ('wp_enqueue_scripts', $this, 'enqueue_styles');
    $loader->add_action ('wp_enqueue_scripts', $this, 'enqueue_scripts');
  }


  /*
   *
   * CSS for the public-facing side
   *
   */
  public function enqueue_styles () {
    wp_enqueue_style ($this->plugin_name, plugin_dir_url (__FILE__) . 'css/hots-public.css', array (), $this->version, 'all');
  }


  /*
   *
   * JavaScript for the public-facing side
   *
   * @since    1.0.0
   */
  public function enqueue_scripts () {
    wp_enqueue_script ($this->plugin_name, plugin_dir_url (__FILE__) . 'js/hots-public.js', array ('jquery'), $this->version, false);
  }
}
