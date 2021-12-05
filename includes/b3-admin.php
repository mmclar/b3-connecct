<?php
add_action('admin_menu', 'b3_add_admin_link');

function b3_add_admin_link() {
    add_menu_page('B3 Connection', 'B3 Connect', 'manage_options', 'includes/b3-admin-page.php', 'b3_admin_page');
    add_action('admin_init', 'b3_register_settings');
}

function b3_register_settings() {
	register_setting('b3-settings-group', 'b3_api_url');
	register_setting('b3-settings-group', 'b3_api_key');
}

function b3_admin_page() {
?>
<div>
    <h1>B3 Connection Settings</h1>
    B3 API connection options.
    <form action="options.php" method="post">
        <?php settings_fields('b3-settings-group'); ?>
        <?php do_settings_sections('b3-settings-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">URL</th>
                <td><input type="text" name="b3_api_url" value="<?php echo esc_attr( get_option('b3_api_url') ); ?>" /></td>
            </tr>
            <tr valign="top">
                <th scope="row">Key</th>
                <td><input type="text" name="b3_api_key" value="<?php echo esc_attr( get_option('b3_api_key') ); ?>" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php
}
?>
