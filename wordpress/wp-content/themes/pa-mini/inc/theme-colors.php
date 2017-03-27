<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Andris
 * Date: 4/27/13
 * Time: 9:49 PM
 * To change this template use File | Settings | File Templates.
 */
//adding colorpicker library for Admin panel

function load_custom_wp_admin_style()
{

    wp_register_script('colorPickerLib_admin_js', get_template_directory_uri() . '/js/admin/colorpicker/js/colorpicker.js', false, '1.0.0');
    wp_register_script('colorPickerMain_admin_js', get_template_directory_uri() . '/js/admin/colorPicker.js', false, '1.0.0');

    wp_register_style('colorPickerStyle_admin_css', get_template_directory_uri() . '/js/admin/colorpicker/css/colorpicker.css', false, '1.0.0');

    wp_enqueue_script(array('colorPickerLib_admin_js', 'colorPickerMain_admin_js'));
    wp_enqueue_style(array('colorPickerStyle_admin_css'));

}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

//adding options for Admin panel
add_action('admin_menu', 'pa_mini_color_menu');

// create custom plugin settings menu
function pa_mini_color_menu()
{

    //create new submenu
    add_submenu_page(
        'theme-admin',
        'PA Mini Color Options',
        'PA Mini Colors',
        'manage_options',
        'pa-mini-colors',
        'pa_color_page'
    );
    //call register settings function
    add_action('admin_init', 'pa_color_settings');
}


function pa_color_settings()
{
//register our settings
    register_setting('pa-colors-group', 'pa_backgroundImage');
    register_setting('pa-colors-group', 'pa_backgroundPosition');
    register_setting('pa-colors-group', 'pa_backgroundRepeat');
    register_setting('pa-colors-group', 'pa_backgroundSize');

    register_setting('pa-colors-group', 'pa_pageBackground');

    register_setting('pa-colors-group', 'pa_panelBackground');
    register_setting('pa-colors-group', 'pa_textColor');

    register_setting('pa-colors-group', 'pa_postTitle');
    register_setting('pa-colors-group', 'pa_postTitleHover');
    register_setting('pa-colors-group', 'pa_linkColor');
    register_setting('pa-colors-group', 'pa_linkColorHover');

    register_setting('pa-colors-group', 'pa_menuLightColor');
    register_setting('pa-colors-group', 'pa_menuDarkColor');

    register_setting('pa-colors-group', 'pa_footerBackground');
    register_setting('pa-colors-group', 'pa_mediaColor');
    register_setting('pa-colors-group', 'pa_mediaColorHover');
    register_setting('pa-colors-group', 'pa_footerText');
    register_setting('pa-colors-group', 'pa_footerLink');
    register_setting('pa-colors-group', 'pa_footerLinkHover');
}

function pa_color_page()
{
    // #page background image
    $backgroundImage = get_option('pa_backgroundImage') ? get_option('pa_backgroundImage') : get_template_directory_uri() . "/scss/img/page-gradient.png";
    $backgroundPosition = get_option('pa_backgroundPosition') ? get_option('pa_backgroundPosition') : 'center top';
    $backgroundRepeat = get_option('pa_backgroundRepeat') ? get_option('pa_backgroundRepeat') : 'repeat-x';
    $backgroundSize = get_option('pa_backgroundSize') ? get_option('pa_backgroundSize') : 'auto';

    $pageBackground = get_option('pa_pageBackground') ? get_option('pa_pageBackground') : '#dedede';

    $panelBackground = get_option('pa_panelBackground') ? get_option('pa_panelBackground') : '#ffffff';
    $textColor = get_option('pa_textColor') ? get_option('pa_textColor') : '#1F3145';

    $titleColor = get_option('pa_postTitle') ? get_option('pa_postTitle') : '#577691';
    $titleColorHover = get_option('pa_postTitleHover') ? get_option('pa_postTitleHover') : '#374857';
    $linkColor = get_option('pa_linkColor') ? get_option('pa_linkColor') : '#577691';
    $linkColorHover = get_option('pa_linkColorHover') ? get_option('pa_linkColorHover') : '#374857';

    //Main menu color scheme
    $menuLightColor = get_option('pa_menuLightColor') ? get_option('pa_menuLightColor') : '#455867';
    $menuDarkColor = get_option('pa_menuDarkColor') ? get_option('pa_menuDarkColor') : '#304050';

    //Footer color settings
    $footerBackground = get_option('pa_footerBackground') ? get_option('pa_footerBackground') : '#383838';
    $mediaColor = get_option('pa_mediaColor') ? get_option('pa_mediaColor') : '#fcfcfc';
    $mediaColorHover = get_option('pa_mediaColorHover') ? get_option('pa_mediaColorHover') : '#949494';
    $footerText = get_option('pa_footerText') ? get_option('pa_footerText') : '#b8b8b8';
    $footerLink = get_option('pa_footerLink') ? get_option('pa_footerLink') : '#93b5cc';
    $footerLinkHover = get_option('pa_footerLinkHover') ? get_option('pa_footerLinkHover') : '#6d808c';


    ?>
    <div class="wrap">
        <h2>Pixel Augustine Theme Color Scheme</h2>
        <form id="landingOptions" method="post" action="options.php">
            <?php settings_fields('pa-colors-group'); ?>
            <table class="form-table">
                <tr>
                    <td colspan="3"><h3>Overall website color settings</h3></td>
                </tr>

                <?php // #page background image ?>
                <tr>
                    <td colspan="2">
                        <p> Feel free to change colors for your website or scroll down to choose pre-defined color schemes.</p>

                        <p><b>How to add Custom Background Image?</b><br>
                            Here you can add Background Image. Default is neutral gradient png which in most cases should
                            work nice. However there is no limit for you.
                            <br>Upload your image through Admin->Media, copy
                            url and paste it into input box below (first one). Also you need to add few CSS for position and repeat.
                            <?php //TODO add link to css explanation ?>
                            <br> <a target="_blank" href="#">Here is</a> usefull reminder about available properties for CSS background-position
                            and background-repeat.
                            <br> If you don't want image at all, add string - <span style="color: red;">no-image</span>
                            That way there won't be any CSS added to stylesheet at all<br>
                            If you leave empty then default background image appear.</p>

                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="backgroundImage">Custom background image:</label></th>
                    <td class="inputColorField" style="background: <?php print '#fff' ?>">
                        <div style="width: 48%; float: left;">
                            <input style="min-width: 162px; width: 100%;"
                                   id="backgroundImage"
                                   type="text"
                                   name="pa_backgroundImage"
                                   value="<?php print $backgroundImage; ?>"/><br>
                            <input style="min-width: 162px; width: 100%;"
                                   type="text"
                                   name="pa_backgroundPosition"
                                   value="<?php print $backgroundPosition; ?>"/><br>
                            <input style="min-width: 162px; width: 100%;"
                                   type="text"
                                   name="pa_backgroundRepeat"
                                   value="<?php print $backgroundRepeat; ?>"/><br>
                            <input style="min-width: 162px; width: 100%;"
                                   type="text"
                                   name="pa_backgroundSize"
                                   value="<?php print $backgroundSize; ?>"/>
                        </div>
                        <div style="width: 50%; float: right">
                            Add url to image: http://domain.com/path/to/your/image.png<br>
                            background-position: center top;<br>
                            background-repeat: no-repeat;<br>
                            background-size: auto;
                        </div>

                    </td>
                </tr>

                <?php // Website background color ?>
                <tr>
                    <th scope="row"><label for="pageBackground">Website background color:</label></th>
                    <td class="inputColorField" style="background: <?php print $pageBackground; ?>">
                        <input id="pageBackground" type="text" name="pa_pageBackground"
                               value="<?php print $pageBackground; ?>"/>
                    </td>
                </tr>

                <?php // Panel background color ?>
                <tr>
                    <th scope="row"><label for="panelBackground">Panel background color:</label></th>
                    <td class="inputColorField" style="background: <?php print $panelBackground; ?>">
                        <input id="panelBackground" type="text" name="pa_panelBackground"
                               value="<?php print $panelBackground; ?>"/>
                    </td>
                </tr>

                <?php // Text color ?>
                <tr>
                    <th scope="row"><label for="textColor">Text color:</label></th>
                    <td class="inputColorField" style="background: <?php print $textColor; ?>">
                        <input id="textColor" type="text" name="pa_textColor"
                               value="<?php print $textColor; ?>"/>
                    </td>
                </tr>

                <?php // Post/Article Main title colour and hover ?>
                <tr>
                    <th scope="row"><label for="postTitle">Post title color:</label></th>
                    <td class="inputColorField" style="background: <?php print $titleColor; ?>">
                        <input id="postTitle" type="text" name="pa_postTitle" value="<?php print $titleColor; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="postTitleHover"> Post title color hover:</label></th>
                    <td class="inputColorField" style="background: <?php print $titleColorHover; ?>">
                        <input id="postTitleHover" type="text" name="pa_postTitleHover"
                               value="<?php print $titleColorHover; ?>"/>
                    </td>
                </tr>

                <?php // Link color and hover ?>
                <tr>
                    <th scope="row"><label for="postLink">Post link color:</label></th>
                    <td class="inputColorField" style="background: <?php print $linkColor; ?>">
                        <input id="postLink" type="text" name="pa_linkColor" value="<?php print $linkColor; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="postLinkHover"> Post link color hover:</label></th>
                    <td class="inputColorField" style="background: <?php print $linkColorHover; ?>">
                        <input id="postLinkHover" type="text" name="pa_linkColorHover"
                               value="<?php print $linkColorHover; ?>"/>
                    </td>
                </tr>


                <?php //Main Menu color scheme ?>
                <tr>
                    <td colspan="3"><h3>Main menu colour scheme</h3></td>
                </tr>
                <tr>
                    <th scope="row"><label for="menuLightColor">Menu light color:</label></th>
                    <td class="inputColorField" style="background: <?php print $menuLightColor;; ?>">
                        <input id="menuLightColor" type="text" name="pa_menuLightColor"
                               value="<?php print $menuLightColor; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="menuDarkColor">Menu dark color:</label></th>
                    <td class="inputColorField" style="background: <?php print $menuDarkColor;; ?>">
                        <input id="menuDarkColor" type="text" name="pa_menuDarkColor"
                               value="<?php print $menuDarkColor; ?>"/>
                    </td>
                </tr>



                <?php //Footer color and hover ?>
                <tr>
                    <td colspan="3"><h3>Footer color settings</h3></td>
                </tr>
                <tr>
                    <th scope="row"><label for="footerBackground">Footer backround:</label></th>
                    <td class="inputColorField" style="background: <?php print $footerBackground;; ?>">
                        <input id="footerBackground" type="text" name="pa_footerBackground"
                               value="<?php print $footerBackground; ?>"/>
                    </td>
                </tr>
                <?php //Media color and hover ?>
                <tr>
                    <th scope="row"><label for="mediaColor">Media icon color:</label></th>
                    <td class="inputColorField" style="background: <?php print $mediaColor; ?>">
                        <input id="mediaColor" type="text" name="pa_mediaColor" value="<?php print $mediaColor; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="mediaColorHover"> Media icon color hover:</label></th>
                    <td class="inputColorField" style="background: <?php print $mediaColorHover; ?>">
                        <input id="mediaColorHover" type="text" name="pa_mediaColorHover"
                               value="<?php print $mediaColorHover; ?>"/>
                    </td>
                </tr>

                <?php //fonts and link tags for footer ?>
                <tr>
                    <th scope="row"><label for="footerTextColor">Footer text color:</label></th>
                    <td class="inputColorField" style="background: <?php print $footerText; ?>">
                        <input id="footerTextColor" type="text" name="pa_footerText"
                               value="<?php print $footerText; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="footerLinkColor">Footer link color:</label></th>
                    <td class="inputColorField" style="background: <?php print $footerLink; ?>">
                        <input id="footerLinkColor" type="text" name="pa_footerLink"
                               value="<?php print $footerLink; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="footerLinkColorHover"> Footer link color hover:</label></th>
                    <td class="inputColorField" style="background: <?php print $footerLinkHover; ?>">
                        <input id="footerLinkColorHover" type="text" name="pa_footerLinkHover"
                               value="<?php print $footerLinkHover; ?>"/>
                    </td>
                </tr>


            </table>
            <p class="submit">
                <input id="submitColors" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
            </p>
        </form>
    </div>
    <div class="documentation">
        <h3>Pre-defined Themes</h3>

        <p class="important">IMPORTANT: Once you choose any pre-defined Theme - all previous color settings will be
            overwritten.
            After theme is saved you can ajdust colors at any moment as you pleased.</p>
        <?php //connected to /js/admin/colorpicker.js ?>
        <div class="themeScreenshot">
            <a id="lightColorTheme" href="#">
                Light Color Theme Sample<br>
                <img src="<?php echo get_template_directory_uri(); ?>/images/lightThemeScreen.png" width="300"/>
            </a>
            <a id="darkColorTheme" href="#">
                Dark Color Theme Sample<br>
                <img src="<?php echo get_template_directory_uri(); ?>/images/darkThemeScreen.png" width="300"/>
            </a>
            <a id="coloredTheme" href="#">
                Colored Theme Sample<br>
                <img src="<?php echo get_template_directory_uri(); ?>/images/coloredThemeScreen.png" width="300"/>
            </a>
        </div>


    </div>
<?php } ?>