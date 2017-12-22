<?php
/**
 * Plugin Name:       Base Plugin
 * Description:       Base de código para iniciar o desenvolvimento de plugins para WordPress.
 * Plugin URI:        https://github.com/everaldomatias/base-plugin
 * Version:           0.0.1
 * Author:            Everaldo Matias
 * Author URI:        https://everaldomatias.github.io
 * Requires at least: 4.0.0
 * Tested up to:      4.9.0
 *
 * @package Base_Plugin
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Base_Plugin Class
 *
 * @class Base_Plugin
 * @version	0.0.1
 * @since 0.0.1
 * @package	Base_Plugin
 */

if ( ! class_exists( 'Base_Plugin' ) ) {
	final class Base_Plugin {

		/**
		 * Configura o plugin
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'base_plugin_setup' ), -1 );

		}

		/**
		 * Configura tudo que for necessário para o plugin
		 */
		public function base_plugin_setup() {
			add_action( 'wp_enqueue_scripts', array( $this, 'base_plugin_css' ), 999 );
			add_action( 'plugins_loaded' array( $this, 'base_plugin_textdomain' ) );
		}

		/**
		 * Adiciona o style.css na fila
		 *
		 * @return void
		 */
		public function base_plugin_css() {
			wp_enqueue_style( 'base_plugin', plugins_url( '/assets/css/style.css', __FILE__ ) );
		}

		/**
		 * Adiciona suporte para tradução.
		 */
		function base_plugin_textdomain() {
		    load_plugin_textdomain( 'base-plugin', false, basename( dirname( __FILE__ ) ) . '/languages/' );
		}

	} // Base_Plugin
} // Endif

/**
 * Instancia a classe do plugin
 *
 * @return void
 */
function base_plugin_main() {
	new Base_Plugin();
}

/**
 * Inicializa o plugin
 */
add_action( 'plugins_loaded', 'base_plugin_main' );