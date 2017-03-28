<?php
/**
 * PA-mini functions and definitions
 * @author Andris Shvarcs
 */

/**
 * @staticvar string TEMPPATH creating url for reuse in code
 * @staticvar string IMAGES path to image folder
 */

define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH . "/scss/img/");

/* ----------------------------------------------------- */
/* Required pages - admin menu for PA-Augustine */
/* ----------------------------------------------------- */
require_once('inc/theme-admin.php');
require_once('inc/theme-options.php');
require_once('inc/theme-colors.php');

/* ----------------------------------------------------- */
/* Register Styles */
/* ----------------------------------------------------- */

//Create custom var, get custom CSS with vars through Admin panel
add_filter('query_vars', 'add_new_var_to_wp');
function add_new_var_to_wp($public_query_vars)
{
    $public_query_vars[] = 'pa_theme_custom_css';
    //pa_theme_custom_css is the name of the custom query variable that is created and how you reference it in the call to the file
    return $public_query_vars;
}

add_action('template_redirect', 'dynamic_CSS');

function dynamic_CSS()
{
    $css = get_query_var('pa_theme_custom_css');

    if ($css == 'css') {
        include_once('user-style.php');
        exit; //This stops WP from loading any further
    }
}

 /*TODO: remove uniqid() with some date number */

function pa_mini_styles()
{

    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), uniqid(), 'all');
    wp_register_style('userStyle', get_site_url() . '/?pa_theme_custom_css=css', uniqid(), 'all');
    wp_enqueue_style(array('style', 'userStyle'));

}

add_action('wp_enqueue_scripts', 'pa_mini_styles');

//improving original wp excerpt method by adding Read More permalink
function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


/* ----------------------------------------------------- */
/* Register Scripts */
/* ----------------------------------------------------- */
function pa_mini_scripts()
{
    wp_register_script('bundle', get_template_directory_uri() . '/dev/js/bundle.js', uniqid());
    wp_enqueue_script(array('bundle'), false);
}

add_action('wp_enqueue_scripts', 'pa_mini_scripts');


/* ----------------------------------------------------- */
/* Custom Menu */
/* ----------------------------------------------------- */
function pa_register_menus()
{

    register_nav_menus(
        array(
            'pa_primary_menu' => 'Primary Menu'
        )
    );

}

add_action('init', 'pa_register_menus');


/* ----------------------------------------------------- */
/* SIDEBARS */
/* ----------------------------------------------------- */
function pa_reg_sidebars()
{

    if (function_exists('register_sidebar')) {

        register_sidebar(array(
            'name' => __('Top Advert Sidebar', 'top'),
            'id' => 'top-widget-area',
            'description' => __('The top full size widget area', 'dir'),
            'before_widget' => '<div class="widget pa-widget-top">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));


        register_sidebar(array(
            'name' => __('Left Sidebar', 'primary-sidebar'),
            'id' => 'left-widget-area',
            'description' => __('The left widget area', 'dir'),
            'before_widget' => '<div class="widget pa-widget-left">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));


        register_sidebar(array(
            'name' => __('Right Sidebar', 'right'),
            'id' => 'right-widget-area',
            'description' => __('The right widget area', 'dir'),
            'before_widget' => '<div class="widget pa-widget-right">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

        register_sidebar(array(
            'name' => __('Footer Sidebar', 'footer'),
            'id' => 'footer-widget-area',
            'description' => __('The footer widget area', 'dir'),
            'before_widget' => '<div class="widget pa-widget-footer">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ));

    }

}

add_action('widgets_init', 'pa_reg_sidebars');


/* ----------------------------------------------------- */
/* IMAGE SUPPORT */
/* ----------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    add_image_size('promotional', 600, 9999); //unlimited height
}

/* ----------------------------------------------------- */
/* SHORTCODES */
/* ----------------------------------------------------- */

function col1_2($atts, $content = null)
{
    return '<div class="col_1_2">' . $content . '</div>';
}

add_shortcode('col1_2', 'col1_2');

function col1_2_last($atts, $content = null)
{
    return '<div class="col_1_2_last">' . $content . '</div>';
}

add_shortcode('col1_2_last', 'col1_2_last');


/* ----------------------------------------------------- */
/* GA FOR WEBSITE ON HEAD THROUGH OPTION PAGE */
/* ----------------------------------------------------- */

add_action('wp_head', 'ga');
function ga()
{
    //if there is something in option we posting GA, if not - nothing will be added to page
    //currently not checking if GA code is correct, whatever is added trigger to show code with opt[val]
    if (get_option('pa_analytics')) {
        $gaCode = get_option('pa_analytics');
        $script = "<script type='text/javascript'>
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '" . $gaCode . "']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
            </script>";
        echo $script;
    }
}

/* ----------------------------------------------------- */
/* MEDIA ICONS ON FOOTER FOR WEBSITE THROUGH OPTION PAGE */
/* ----------------------------------------------------- */
function pa_media_hook()
{
    do_action('pa_media_hook');
}

add_action('pa_media_hook', 'mediaIcons');
function mediaIcons()
{
    $facebook = get_option('pa_facebook');
    $twitter = get_option('pa_twitter');
    $rss = get_option('pa_rss');
    $rssUrl = get_bloginfo('rss_url', 'raw');

    if ($facebook || $twitter || $rss) {
        echo('<ul id="mediaIcons">');

        //facebook
        if ($facebook) {
            echo '<li><a href="' . $facebook . '" aria-hidden="true" data-icon="&#xe002;"></a></li>';
        }
        //twitter
        if ($twitter) {
            echo '<li><a href="' . $twitter . '" aria-hidden="true" data-icon="&#xe003;"></a></li>';
        }
        //RSS
        if ($rss) {
            echo '<li><a href="' . $rssUrl . '" aria-hidden="true" data-icon="&#xe004;"></a></li>';
        }

        echo('</ul>');
    }
}


current_theme_supports( 'html5' );














