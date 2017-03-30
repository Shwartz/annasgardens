<?php
    add_action( 'admin_menu', 'register_pa_admin_top_menu' );

    function register_pa_admin_top_menu () {
        add_menu_page(
            'PA Admin Options',
            'PA Admin',
            'manage_options',
            'theme-admin',
            'pa_theme_admin',
            content_url( 'themes/pa-mini-2/images/pa-logo-16x16.png' ),
            62
        );
    }
    function pa_theme_admin () {
?>

<div class="wrap">
    <h2>Pixel Augustine feature description</h2>
    <p>If you are new to PA (Pixel Augustine) Theme then this is a page which gives you quick overview of available features<br>
    More info you can find on our WEBSITE-URL and FORUM-URL</p>

    <h3>Pa Mini Options</h3>
    <p>Page for uploading your Logo, Twitter and Facebook URL, add Google Analytics code. <br>
    All is optional apart of Logo. You should upload something to get rid of placeholder image.<br>
    Once you add your changes, press "Save Changes" and ... that's it</p>

    <h3>PA Mini Colors</h3>
    <p>This is where you change how your blog looks. You can change colors for most of main parts of website.</p>

    <h3>Shortcodes</h3>
    <p>From <a href="http://en.support.wordpress.com/shortcodes/" title="About shortcodes">Wordpress</a> site: <i>"A shortcode is a WordPress-specific code that lets you do nifty things with very little effort. Shortcodes can embed files or create objects that would normally require lots of complicated, ugly code in just one line. Shortcode = shortcut."</i></p>
    <p>In Pixel Augustine we added few more shortcodes for you:</p>
    <ul>
        <li><b>[col1_2]</b> Your content <b>[/col1_2]</b> -> which creates left side column (50%)  </li>
        <li><b>[col1_2_last]</b> Your content <b>[/col1_2_last]</b> -> which creates right side column (50%) </li>
    </ul>
    <p>Since Pixel Augustine is fully fluid/responsive theme, then shortcodes automagically will calculate size. <br>
    Also worth to mention on Mobile phones (0 - 480px), shortcodes going to be full size</p>

</div>

<?php } ?>