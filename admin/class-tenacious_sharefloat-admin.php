<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://amydalrymple.org/
 * @since      1.0.0
 *
 * @package    Tenacious_sharefloat
 * @subpackage Tenacious_sharefloat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tenacious_sharefloat
 * @subpackage Tenacious_sharefloat/admin
 * @author     Amy Dalrymple <amy@tenaciousedge.com>
 */
class Tenacious_sharefloat_Admin {

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
		 * defined in Tenacious_sharefloat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tenacious_sharefloat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tenacious_sharefloat-admin.css', array(), $this->version, 'all' );

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
		 * defined in Tenacious_sharefloat_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tenacious_sharefloat_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tenacious_sharefloat-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'Floating Share Bar', 'Share Float', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
	    );
	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */
	 
	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */
	 
	public function display_plugin_setup_page() {
	    include_once( 'partials/tenacious_sharefloat-admin-display.php' );
	}

	public function options_update() {
	    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	 }

	public function validate($input) {
	    // All checkboxes inputs        
	    $valid = array();

	    // Services to Display
	    $valid['fblike'] = (isset($input['fblike']) && !empty($input['fblike'])) ? 1 : 0;
	    $valid['fbshare'] = (isset($input['fbshare']) && !empty($input['fbshare'])) ? 1: 0;
	    $valid['twitter'] = (isset($input['twitter']) && !empty($input['twitter'])) ? 1 : 0;
	    $valid['linkedin'] = (isset($input['linkedin']) && !empty($input['linkedin'])) ? 1 : 0;
	    $valid['pinterest'] = (isset($input['pinterest']) && !empty($input['pinterest'])) ? 1 : 0;
	    $valid['googleplus'] = (isset($input['googleplus']) && !empty($input['googleplus'])) ? 1 : 0;
	    $valid['email'] = (isset($input['email']) && !empty($input['email'])) ? 1 : 0;

	    // Styling
	    $valid['bgcolor'] = esc_textarea($input['bgcolor']);
	    $valid['bghover'] = esc_textarea($input['bghover']);
	    $valid['iconcolor'] = esc_textarea($input['iconcolor']);
	    $valid['iconhover'] = esc_textarea($input['iconhover']);
	    // $valid['sideposition'] = (isset($input['sideposition']) && !empty($input['sideposition'])) ? 1 : 0;

	    // Where to display on site - whole site, posts only, all pages & posts except home page
	    $valid['display_posts'] = (isset($input['display_posts']) && !empty($input['display_posts'])) ? 1 : 0;
	    $valid['display_nothome'] = (isset($input['display_nothome']) && !empty($input['display_nothome'])) ? 1 : 0;

        // Counts
        $valid['showshares'] = (isset($input['showshares']) && !empty($input['showshares'])) ? 1 : 0;
        $valid['minshares'] = esc_textarea($input['minshares']);

        $valid['facebookurl'] = esc_textarea($input['facebookurl']);
        $valid['twittername'] = esc_textarea($input['twittername']);

        $valid['tracking'] = (isset($input['tracking']) && !empty($input['tracking'])) ? 1 : 0;
        $valid['utmsource'] = esc_textarea($input['utmsource']);
        $valid['utmmedium'] = esc_textarea($input['utmmedium']);
        $valid['utmname'] = esc_textarea($input['utmname']);

	    // $valid['cdn_provider'] = esc_url($input['cdn_provider']);
	    
	    return $valid;
	}

}
