<?php
/**
 * Plugin Name: WooCommerce Smooth Generator
 * Plugin URI: https://woocommerce.com/
 * Description: A smooth customer, order and product generator for WooCommerce.
 * Version: 1.0.3
 * Author: Automattic
 * Author URI: https://woocommerce.com
 *
 * Tested up to: 5.7
 * WC requires at least: 5.0.0
 * WC tested up to: 5.7.0
 * Woo: 000000:0a0a0a0a0a0a0a0a0a0a0a0a0a0a0a0
 *
 * @package WooCommerce
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/includes/GenerateBackgroundProcess.php';

// autoloader.
if ( ! class_exists( \WC\SmoothGenerator\Plugin::class ) ) {
	require __DIR__ . '/vendor/autoload.php';
}

/**
 * Fetch instance of plugin.
 *
 * @return \WC\SmoothGenerator\Plugin
 */
function wc_smooth_generator() {
	static $instance;

	if ( is_null( $instance ) ) {
		$instance = new \WC\SmoothGenerator\Plugin( __FILE__ );
	}

	return $instance;
}

/**
 * Init plugin when WordPress loads.
 */
function load_wc_smooth_generator() {
	wc_smooth_generator();
}

if ( version_compare( PHP_VERSION, '5.3', '>' ) ) {
	add_action( 'plugins_loaded', 'load_wc_smooth_generator', 20 );
}
