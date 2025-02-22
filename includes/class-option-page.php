<?php
/**
 * Options Page class for Rich Tickets Sites
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class RTS_Option_Page {
    
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }

    public function add_options_page() {
        add_options_page(
            'Rich Tickets Settings',
            'Rich Tickets',
            'manage_options',
            'rich-tickets-settings',
            array( $this, 'render_options_page' )
        );
    }

    public function register_settings() {
        register_setting( 'rich-tickets-settings-group', 'rts_field_1' );
        register_setting( 'rich-tickets-settings-group', 'rts_field_2' );

        add_settings_section(
            'rts_main_section',
            'Main Settings',
            array( $this, 'section_callback' ),
            'rich-tickets-settings'
        );

        add_settings_field(
            'rts_field_1',
            'Field 1',
            array( $this, 'field_1_callback' ),
            'rich-tickets-settings',
            'rts_main_section'
        );

        add_settings_field(
            'rts_field_2',
            'Field 2',
            array( $this, 'field_2_callback' ),
            'rich-tickets-settings',
            'rts_main_section'
        );
    }

    public function section_callback() {
        echo '<p>Configure your Rich Tickets settings here.</p>';
    }

    public function field_1_callback() {
        $value = get_option( 'rts_field_1' );
        echo '<input type="text" name="rts_field_1" value="' . esc_attr( $value ) . '" />';
    }

    public function field_2_callback() {
        $value = get_option( 'rts_field_2' );
        echo '<input type="text" name="rts_field_2" value="' . esc_attr( $value ) . '" />';
    }

    public function render_options_page() {
        ?>
        <div class="wrap">
            <h2>Rich Tickets Settings</h2>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'rich-tickets-settings-group' );
                do_settings_sections( 'rich-tickets-settings' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
} 