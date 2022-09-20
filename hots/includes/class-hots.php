<?php


/*
 *
 * The core plugin class.
 *
 */
class Hots {


  /*
   *
   * Loader
   *
   */
  protected $loader;


  /*
   *
   * Plugin name
   *
   */
  protected $plugin_name;


  /*
   *
   * Plugin version
   *
   */
  protected $version;


  /*
   *
   * Construct
   *
   */
  public function __construct () {

    $this->version = HOTS_VERSION;
    $this->plugin_name = 'hots';

    $this->load_dependencies ();
    $this->set_locale ();
    $this->define_admin_hooks ();
    $this->define_public_hooks ();
  }


  /*
   *
   * Load the required dependencies for this plugin.
   * Include the following files that make up the plugin:
   *
   * - Hots_Loader. Orchestrates the hooks of the plugin.
   * - Hots_i18n. Defines internationalization functionality.
   * - Hots_Admin. Defines all hooks for the admin area.
   * - Hots_Public. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   */
  private function load_dependencies () {

    require_once plugin_dir_path (dirname (__FILE__)) . 'includes/class-hots-loader.php';
    require_once plugin_dir_path (dirname (__FILE__)) . 'includes/class-hots-i18n.php';
    require_once plugin_dir_path (dirname (__FILE__)) . 'admin/class-hots-admin.php';
    require_once plugin_dir_path (dirname (__FILE__)) . 'public/class-hots-public.php';

    $this->loader = new Hots_Loader ();
  }


  /*
   *
   * Define the locale for this plugin for internationalization.
   *
   * Uses the Hots_i18n class in order to set the domain and to register the hook
   * with WordPress.
   *
   */
  private function set_locale () {
    $plugin_i18n = new Hots_i18n ();
    $this->loader->add_action ('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
  }


  /*
   *
   * Register all of the hooks related to the admin area functionality of the plugin.
   *
   */
  private function define_admin_hooks () {
    $plugin_admin = new Hots_Admin ($this->get_plugin_name (), $this->get_version ());
    $plugin_admin->define_hooks ($this->loader);
  }


  /*
   *
   * Register all of the hooks related to the public-facing functionality of the plugin.
   *
   */
  private function define_public_hooks () {
    $plugin_public = new Hots_Public ($this->get_plugin_name (), $this->get_version ());
    $plugin_public->define_hooks ($this->loader);
  }


  /*
   *
   * Run the loader to execute all of the hooks with WordPress.
   *
   */
  public function run () {
    $this->loader->run ();
  }


  /*
   *
   * Get plugin name
   *
   */
  public function get_plugin_name () {
    return $this->plugin_name;
  }


  /*
   *
   * Get plugin loader
   *
   */
  public function get_loader () {
    return $this->loader;
  }


  /*
   *
   * Get plugin version
   *
   */
  public function get_version () {
    return $this->version;
  }
}
