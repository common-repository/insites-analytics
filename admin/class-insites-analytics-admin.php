<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://teege.me/
 * @since      1.0.0
 *
 * @package    Insites_Analytics
 * @subpackage Insites_Analytics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Insites_Analytics
 * @subpackage Insites_Analytics/admin
 * @author     Teege.me GmbH <tech@teege.me>
 */
class Insites_Analytics_Admin {

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
		 * defined in Insites_Analytics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Insites_Analytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/insites-analytics-admin.css', array(), $this->version, 'all' );

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
		 * defined in Insites_Analytics_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Insites_Analytics_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/insites-analytics-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function render_settings_page() { ?>
    <div class="wrap">
				<div class="insites-header-wrapper">
					<img src="<?php echo plugin_dir_url( dirname(__FILE__) ) . '/public/img/insites-logo.svg'; ?>" />
					<h1>inSites Analytics</h1>
				</div>
        <form method="post" action="options.php">
            <?php
                settings_fields( 'insites_fields' );
                do_settings_sections( 'insites_fields' );
                submit_button();
            ?>
        </form>
    </div> <?php
	}

	public function add_admin_page() {
		$icon_base64 = 'PHN2ZyB3aWR0aD0iMzAiIGhlaWdodD0iMzAiIHZpZXdCb3g9IjAgMCAzMCAzMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPG1hc2sgaWQ9Im1hc2swXzI5MzJfODk4MiIgc3R5bGU9Im1hc2stdHlwZTphbHBoYSIgbWFza1VuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeD0iNSIgeT0iMCIgd2lkdGg9IjI1IiBoZWlnaHQ9IjMwIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik01LjM0NzY2IDAuMzc1SDI5Ljg2NzJWMjkuODc2OUg1LjM0NzY2VjAuMzc1WiIgZmlsbD0id2hpdGUiLz4KPC9tYXNrPgo8ZyBtYXNrPSJ1cmwoI21hc2swXzI5MzJfODk4MikiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTUuMzQ3NjYgMjYuNDQyNkMxMS4yMTcgMzEuMjk4OCAxOS45NzQ0IDMxLjAwNiAyNS40OTEzIDI1LjU1NzZDMzEuMzI1OCAxOS43OTY1IDMxLjMyNTggMTAuNDU1NiAyNS40OTE3IDQuNjk0MDlDMTkuOTc0NCAtMC43NTQyODMgMTEuMjE3IC0xLjA0Njc4IDUuMzQ3NjYgMy44MDk0N0wxNi44MDc3IDE1LjEyNjJMNS4zNDc2NiAyNi40NDI2WiIgZmlsbD0iYmxhY2siLz4KPC9nPgo8bWFzayBpZD0ibWFzazFfMjkzMl84OTgyIiBzdHlsZT0ibWFzay10eXBlOmFscGhhIiBtYXNrVW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4PSIwIiB5PSI1IiB3aWR0aD0iMTQiIGhlaWdodD0iMjAiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTAgNS42Njg4OEgxMy4wNDcyVjI0LjU4MzlIMFY1LjY2ODg4WiIgZmlsbD0id2hpdGUiLz4KPC9tYXNrPgo8ZyBtYXNrPSJ1cmwoI21hc2sxXzI5MzJfODk4MikiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTMuNDcwMzkgNS42Njg4OEMyLjA0MTAyIDcuMzU4MjYgMS4wNTQ0NCA5LjI4NzI2IDAuNTA3NjA2IDExLjMxMDhDLTAuNzE0Nzk5IDE1LjgzMjUgMC4yNjk4ODUgMjAuODEwMyAzLjQ2OTYzIDI0LjU4MzlMMTMuMDQ3MiAxNS4xMjZMMy40NzAzOSA1LjY2ODg4WiIgZmlsbD0iYmxhY2siLz4KPC9nPgo8L3N2Zz4K';
		$icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;

		$that = $this;

		add_menu_page( 
			'inSites Analytics', 
			'inSites Analytics', 
			'manage_options', 
			'insites-analytics', 
			array($this,'render_settings_page'),
			$icon_data_uri 
		);

		add_action( 'admin_init', array( $this, 'setup_init'));
	}

	public function setup_init() {
		$this->setup_sections();
		$this->setup_fields();
	}

	public function setup_sections() {
    add_settings_section( 'insites-uuid', __('UUID', 'insites-analytics') , array( $this, 'section_callback' ), 'insites_fields' );
		add_settings_section( 'insites-settings', __('Settings', 'insites-analytics'), array( $this, 'section_callback' ), 'insites_fields' );
	}

	public function section_callback( $arguments ) {
    switch( $arguments['id'] ){
        case 'insites-uuid':
            echo sprintf( __( 'Visit <a target="_blank" href="%s">inSites.app</a> to get your UUID. You can find it under the small pencil icon.', 'insites-analytics' ), 
            'https://insites.app/analytics'
        		);
            break;
        case 'insites-settings':
            break;
    }
	}

	public function setup_fields() {
		register_setting( 'insites_fields', 'uuid' );
    add_settings_field( 'uuid', 'UUID', array( $this, 'field_uuid_callback' ), 'insites_fields', 'insites-uuid' );

		register_setting( 'insites_fields', 'logged_in' );
    add_settings_field( 'logged_in', __('Do not track logged in Users', 'insites-analytics'), array( $this, 'field_logged_in_callback' ), 'insites_fields', 'insites-settings' );
		
		register_setting( 'insites_fields', 'admin_logged_in' );
    add_settings_field( 'admin_logged_in', __('Do not track logged in Admin Users', 'insites-analytics'), array( $this, 'field_admin_logged_in_callback' ), 'insites_fields', 'insites-settings' );
	}

	public function field_uuid_callback( $arguments ) {
    echo '<input name="uuid" id="uuid" type="text" value="' . get_option( 'uuid' ) . '" />';
	}

	public function field_logged_in_callback( $arguments ) {
    echo '<input name="logged_in" id="logged_in" type="checkbox" value="1" ' . checked(1, get_option('logged_in'), false) . ' />';
	}

	public function field_admin_logged_in_callback( $arguments ) {
    echo '<input name="admin_logged_in" id="admin_logged_in" type="checkbox" value="1" ' . checked(1, get_option('admin_logged_in'), false) . ' />';
	}

}
