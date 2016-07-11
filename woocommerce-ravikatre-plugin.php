<?php
/*
  Plugin Name: WooCommerce Ravikatre Plugin
  Plugin URI: http://wp.ravikatre.in/
  Version: 1.0.0
  Description: Plugin for WooCommerce customization.
  Author: Ravi
  Author URI: http://www.ravikatre.in/
  Text Domain: RK
  Domain Path: /languages/

  License: GNU General Public License v3.0
  License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH'))    exit; // Exit if accessed directly

if ( ! class_exists( 'RK_ravi' ) ) {

class RK_ravi {
/**
	 * @var Singleton The reference the *Singleton* instance of this class
	 */
	private static $instance;
	public $plugin_name =  'RK_IMPORT_EXPORT_WP_WC_PLUGIN';
	/**
	 * @var Reference to logging class.
	 */
	private static $log;

	/**
	 * Returns the *Singleton* instance of this class.
	 *
	 * @return Singleton The *Singleton* instance.
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Private clone method to prevent cloning of the instance of the
	 * *Singleton* instance.
	 *
	 * @return void
	 */
	private function __clone() {}

	/**
	 * Private unserialize method to prevent unserializing of the *Singleton*
	 * instance.
	 *
	 * @return void
	 */
	private function __wakeup() {}

	

	/**
	 * Notices (array)
	 * @var array
	 */
	public $notices = array();

	/**
	 * Protected constructor to prevent creating a new instance of the
	 * *Singleton* via the `new` operator from outside of this class.
	 */
	public function __construct() {
		
		//$this->scripts();
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
		
		
	}
	
	public function __destruct() {
		
	}

	/**
	 * Init the plugin after plugins_loaded so environment variables are set.
	 */
	public function init() {

		
	}
	
	
	public function scripts() {
	
	
		wp_register_script('scripts', plugins_url('/'.$this->plugin_name.'/scripts/bootstrap/dist/js/bootstrap.mim.js'), false, '1.0.0', false);
		wp_enqueue_script('scripts');
		
		
		
		//print_r($this->define);
	}
	
	public function scripts_init() {
		wp_register_style('bootstrap', plugins_url('/'.$this->plugin_name.'scripts/bootstrap/dist/css/bootstrap.min.css'), false, '1.0.0', 'all');
		wp_enqueue_style('bootstrap');
	
	
		
			wp_register_style('fontawesome', plugins_url('/'.$this->plugin_name.'/scripts/bootstrap/dist/font-awesome/css/font-awesome.min.css'));
		wp_enqueue_style('fontawesome');
		//print_r($this->define);
	}	
	 
	/**
	 * Hook into actions and filters.
	 * @since  2.3
	 */
	private function init_hooks() {

	}

	/**
	 * Define WC Constants.
	 */
	private function define_constants() {
	
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param  string $name
	 * @param  string|bool $value
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}



	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {

		if ( $this->is_request( 'admin' ) ) {
			
			include_once( 'admin/admin_init.php' );
			add_action( 'admin_init',array($this,'scripts_init'));
			add_action( 'admin_head',array($this,'scripts'));
		}

		if ( $this->is_request( 'frontend' ) ) {			
			include_once( 'frontend/frontend_init.php' );
		}

	}

	/**
	 * What type of request is this?
	 *
	 * @param  string $type admin, ajax, cron or frontend.
	 * @return bool
	 */
	private function is_request( $type ) {
		switch ( $type ) {
			case 'admin' :
				return is_admin();
			case 'ajax' :
				return defined( 'DOING_AJAX' );
			case 'cron' :
				return defined( 'DOING_CRON' );
			case 'frontend' :
				return ( ! is_admin() || defined( 'DOING_AJAX' ) ) && ! defined( 'DOING_CRON' );
		}
	}
	
	
}
RK_ravi::get_instance();
}

