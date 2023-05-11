<?php

/**
 * Plugin Name: Slider
 * Plugin URI: https://www.wordpress.org/slider
 * Description: My plugin's description
 * Version: 1.0
 * Requires at least: 5.6
 * Author: Yung-Shun Chang
 * Author URI: https://www.chouqin.com.tw
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: slider
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'Slider' ) ) {
    class Slider {
        function __construct() {
            $this->define_constants();
        }

        public function define_constants() {
            define( 'SLIDER_PATH', plugin_dir_path( __FILE__ ) );
            define( 'SLIDER_URL', plugin_dir_url( __FILE__ ) );
            define( 'SLIDER_VERSION', '1.0.0' );
        }

        public static function activate() {
            update_option( 'rewrite_rules', '' );
        }

        public static function deactivate() {
            flush_rewrite_rules();
        }

        public static function uninstall() {

        }
    }
}

if ( class_exists( 'Slider' ) ) {
    register_activation_hook( __FILE__, array( 'Slider', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'Slider', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'Slider', 'uninstall' ) );

    $slider = new Slider();
}