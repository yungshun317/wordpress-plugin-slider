<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <?php
        $active_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'main_options';
    ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=slider_admin&tab=main_options" class="nav-tab <?php echo $active_tab == 'main_options' ? 'nav-tab-active' : ''; ?>">Main Options</a>
        <a href="?page=slider_admin&tab=additional_options" class="nav-tab <?php echo $active_tab == 'additional_options' ? 'nav-tab-active' : ''; ?>">Additional Options</a>
    </h2>

    <form action="options.php" method="post">
        <?php
        if ( $active_tab == 'main_options' ) {
            settings_fields( 'slider_group' );
            do_settings_sections( 'slider_page-1' );
        } else {
            settings_fields( 'slider_group' );
            do_settings_sections( 'slider_page-2' );
        }
        submit_button( 'Save Settings' );
        ?>
    </form>
</div>