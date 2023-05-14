<?php

if ( ! class_exists( 'Slider_Settings' ) ) {
    class Slider_Settings {

        public static $options;

        public function __construct() {
            self::$options = get_option( 'slider_options' );
            add_action( 'admin_init', array( $this, 'admin_init') );
        }

        public function admin_init() {

            register_setting( 'slider_group', 'slider_options' );

            add_settings_section(
                'slider_main_section',
                'How does it work?',
                null,
                'slider_page-1'
            );

            add_settings_section(
                'slider_second_section',
                'Other Plugin Options',
                null,
                'slider_page-2'
            );

            add_settings_field(
                'slider_main_shortcode',
                'Shortcode',
                array( $this, 'slider_shortcode_callback' ),
                'slider_page-1',
                'slider_main_section'
            );

            add_settings_field(
                'slider_title',
                'Slider Title',
                array( $this, 'slider_title_callback' ),
                'slider_page-2',
                'slider_second_section'
            );

            add_settings_field(
                'slider_bullets',
                'Display Bullets',
                array( $this, 'slider_bullets_callback' ),
                'slider_page-2',
                'slider_second_section'
            );

            add_settings_field(
                'slider_style',
                'Slider Style',
                array( $this, 'slider_style_callback' ),
                'slider_page-2',
                'slider_second_section'
            );
        }

        public function slider_shortcode_callback() {
            ?>
            <span>Use the shortcode [slider] to display the slider in any page/post/widget</span>
            <?php
        }

        public function slider_title_callback() {
            ?>
            <input
                type="text"
                name="slider_options[slider_title]"
                id="slider_title"
                value="<?php echo isset( self::$options['slider_title']) ? esc_attr( self::$options['slider_title']) : ''; ?>"
            >
            <?php
        }

        public function slider_bullets_callback() {
            ?>
            <input
                type="checkbox"
                name="slider_options[slider_bullets]"
                id="slider_bullets"
                value="1"
                <?php
                    if( isset( self::$options['slider_bullets'] ) ) {
                        checked( "1", self::$options['slider_bullets'], true);
                    }
                ?>
            >
            <label for="slider_bullets">Whether to display bullets or not</label>
            <?php
        }

        public function slider_style_callback() {
            ?>
            <select
                id="slider_style"
                name="slider_options[slider_style]"
            >
                <option
                    value="style-1"
                    <?php isset( self::$options['slider_style'] ) ? selected( 'style-1', self::$options['slider_style'], true) : ''; ?>
                >Style-1</option>
                <option
                    value="style-2"
                    <?php isset( self::$options['slider_style'] ) ? selected( 'style-2', self::$options['slider_style'], true) : ''; ?>
                >Style-2</option>
            </select>
            <?php
        }
    }
}