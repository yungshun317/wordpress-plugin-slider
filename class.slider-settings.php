<?php

if ( ! class_exists( 'Slider_Settings' ) ) {
    class Slider_Settings {

        public static $options;

        public function __construct() {
            self::$options = get_option( 'slider_options' );
            add_action( 'admin_init', array( $this, 'admin_init') );
        }

        public function admin_init() {

            register_setting( 'slider_group', 'slider_options', array( $this, 'slider_validate' ) );

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
                'slider_second_section',
                array(
                    'label_for' => 'slider_title'
                )
            );

            add_settings_field(
                'slider_bullets',
                'Display Bullets',
                array( $this, 'slider_bullets_callback' ),
                'slider_page-2',
                'slider_second_section',
                array(
                    'label_for' => 'slider_bullets'
                )
            );

            add_settings_field(
                'slider_style',
                'Slider Style',
                array( $this, 'slider_style_callback' ),
                'slider_page-2',
                'slider_second_section',
                array(
                    'items' => array(
                        'style-1',
                        'style-2'
                    ),
                    'label_for' => 'slider_style'
                )
            );
        }

        public function slider_shortcode_callback() {
            ?>
            <span>Use the shortcode [slider] to display the slider in any page/post/widget</span>
            <?php
        }

        public function slider_title_callback( $args ) {
            ?>
            <input
                type="text"
                name="slider_options[slider_title]"
                id="slider_title"
                value="<?php echo isset( self::$options['slider_title']) ? esc_attr( self::$options['slider_title']) : ''; ?>"
            >
            <?php
        }

        public function slider_bullets_callback( $args ) {
            ?>
            <input
                type="checkbox"
                name="slider_options[slider_bullets]"
                id="slider_bullets"
                value="1"
                <?php
                    if( isset( self::$options['slider_bullets'] ) ) {
                        checked( "1", self::$options['slider_bullets'], true );
                    }
                ?>
            >
            <label for="slider_bullets">Whether to display bullets or not</label>
            <?php
        }

        public function slider_style_callback( $args ) {
            ?>
            <select
                id="slider_style"
                name="slider_options[slider_style]"
            >
                <?php
                foreach( $args['items'] as $item ):
                ?>
                    <option
                        value="<?php echo esc_attr( $item ); ?>"
                        <?php isset( self::$options['slider_style'] ) ? selected( $item, self::$options['slider_style'], true) : ''; ?>
                    >
                        <?php echo esc_html( ucfirst( $item ) ); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php
        }

        public function slider_validate( $input ) {
            $new_input = array();
            foreach( $input as $key => $value ) {
                switch ( $key ) {
                    case 'slider_title':
                        if ( empty( $value ) ) {
                            $value = 'Please, type some text';
                        }
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                    break;
                }
            }
            return $new_input;
        }
    }
}