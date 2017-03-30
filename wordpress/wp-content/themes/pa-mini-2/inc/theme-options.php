<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Andris
 * Date: 4/27/13
 * Time: 9:49 PM
 * To change this template use File | Settings | File Templates.
 */

add_action('admin_menu', 'pa_mini_create_menu');

// create custom plugin settings menu
function pa_mini_create_menu () {

    //create new submenu
    add_submenu_page(
        'theme-admin',
        'PA Mini Theme Options',
        'PA Mini Options',
        'manage_options',
        'pa-mini-options',
        'pa_settings_page'
    );
    //call register settings function
    add_action( 'admin_init', 'pa_register_settings' );
}



function pa_register_settings() {
//register our settings
    register_setting( 'pa-settings-group', 'pa_facebook' );
    register_setting( 'pa-settings-group', 'pa_twitter' );
    register_setting( 'pa-settings-group', 'pa_rss' );
    register_setting( 'pa-settings-group', 'pa_logo' );
    register_setting( 'pa-settings-group', 'pa_analytics' );

}

function pa_settings_page() {
    ?>
    <div class="wrap">
        <h2>Pixel Augustine Theme Settings</h2>

        <form id="landingOptions" method="post" action="options.php">
            <?php settings_fields( 'pa-settings-group' ); ?>
            <table class="form-table">
            <tr valign="top">
                <th scope="row">Logo:</th>
                <td>
                    <input type="text" name="pa_logo" value="<?php print trim(get_option('pa_logo')); ?>" /> <br>
                    *Upload using the Media Uploader and paste the URL here.
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Facebook Link:</th>
                <td>
                    <input type="text" name="pa_facebook"
                           value="<?php print get_option('pa_facebook'); ?>" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Twitter Link:</th>
                <td>
                    <input type="text" name="pa_twitter" value="<?php print get_option('pa_twitter'); ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row">Display RSS Icon:</th>
                <td>
                    <input type="checkbox" name="pa_rss" <?php
                        if(get_option('pa_rss') == true){ print
                            "checked"; }
                        ?> />
                </td>
            </tr>
            <tr>
                <th scope="row">Google Analytics Code:</th>
                <td>
                    <input type="text" name="pa_analytics" value="<?php print get_option('pa_analytics'); ?>" /><br>
                    *Add GA code such as UA-XXXXXXX-X<br>
                    **If left empty no script is added to page
                </td>
            </tr>

        </table>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
        </form>
    </div>
    <div class="documentation">
        <h3>Shortcode Description</h3>
        <p>Create left side column with tags [col1_2] and closing [/col1_2] </p>
        <p>Create right side column with tags [col1_2_last] and closing [/col1_2_last]</p>
    </div>
<?php } ?>