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

            add_action( 'admin_menu', array($this, 'add_menu') );

            require_once( SLIDER_PATH . 'post-types/class.slider-cpt.php' );
            $Slider_Post_Type = new Slider_Post_Type();

            require_once( SLIDER_PATH . 'class.slider-settings.php');
            $Slider_Settings = new Slider_Settings();
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
            unregister_post_type( 'slider' );
        }

        public static function uninstall() {

        }

        public function add_menu() {
            add_menu_page(
                'Slider Options',
                'Slider',
                'manage_options',
                'slider_admin',
                array( $this, 'slider_settings_page' ),
                'dashicons-images-alt2'
            );

            add_submenu_page(
                'slider_admin',
                'Manage Slides',
                'Manage Slides',
                'manage_options',
                'edit.php?post_type=slider',
                null,
                null
            );

            add_submenu_page(
                'slider_admin',
                'Add New Slide',
                'Add New Slide',
                'manage_options',
                'post-new.php?post_type=slider',
                null,
                null
            );
        }

        public function slider_settings_page() {
            echo 'This is a test page';
        }
    }
}

if ( class_exists( 'Slider' ) ) {
    register_activation_hook( __FILE__, array( 'Slider', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'Slider', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'Slider', 'uninstall' ) );

    $slider = new Slider();
}