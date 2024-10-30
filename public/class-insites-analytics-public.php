<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://teege.me/
 * @since      1.0.0
 *
 * @package    Insites_Analytics
 * @subpackage Insites_Analytics/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Insites_Analytics
 * @subpackage Insites_Analytics/public
 * @author     Teege.me GmbH <tech@teege.me>
 */
class Insites_Analytics_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		//wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/insites-analytics-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// do not track logged in users
		if(get_option('logged_in') == '1' && is_user_logged_in()) return '';
		// do not track admin users
		if(get_option('admin_logged_in') == '1' && current_user_can( 'administrator' )) return '';

		if(!is_admin()) {
			wp_enqueue_script( 'insites-analytics', 'https://insites.app/tracker.js', '' );
			add_filter( 'script_loader_tag', 'add_attributes', 10, 3 );
		}

		function add_attributes( $tag, $handle, $src ) {
			if ( !in_array( $handle, array('insites-analytics') ) ) return $tag;

			return '<script src="' . $src . '" async defer data-insites="' . get_option( 'uuid' ) . '"></script>' . "\n";
		}

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/insites-analytics-public.js', array( 'jquery' ), $this->version, false );

	}

}
