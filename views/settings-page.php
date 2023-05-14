<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
        <?php
            settings_fields( 'slider_group' );
            do_settings_sections( 'slider_page-1' );
            do_settings_sections( 'slider_page-2' );
            submit_button( 'Save Settings' );
        ?>
    </form>
</div>