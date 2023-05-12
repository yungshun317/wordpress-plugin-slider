<?php

if ( ! class_exists( 'Slider_Post_Type' ) ) {
    class Slider_Post_Type {
        function __construct() {
            add_action( 'init', array( $this, 'create_post_type' ) );
        }

        public function create_post_type() {

        }
    }
}