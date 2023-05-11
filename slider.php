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
    }
}

if ( class_exists( 'Slider' ) ) {
    $slider = new Slider();
}