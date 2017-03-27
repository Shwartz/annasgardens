<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <?php if( is_front_page() ) { ?>
        <title>Garden services in London | Anna's Gardens</title>
    <?php } else { ?>
        <title> <?php wp_title(false); ?> | <?php bloginfo('name'); ?></title>
    <?php } ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Rouge+Script' rel='stylesheet' type='text/css'>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>

<body>
<div id="mobSelectorWrap">
    <a href="#" id="mobileMenuSelector" aria-hidden="true" data-icon="&#xe000;">&nbsp;</a>
</div>
<?php // <div id="mediaDebug"></div> ?>
<div id="page">
    <div id="container" class="group">
        <header class="group">
            <span id="logoContainer">
                <a class="fontRoughScript" href="<?php bloginfo('url') ?>">Anna's Gardens</a>
                <?php /*
                    $logo = get_option( 'pa_logo' ) ? get_option( 'pa_logo' ) : IMAGES.'default-logo.png'; ?>
                <a href="<?php bloginfo('url') ?>">
                    <img src="<?php print $logo; ?>" alt="<?php bloginfo('name'); ?>" />
                </a>
                    */ ?>
            </span>
            <nav id="headerMenu">
                <?php
                    $defaults = array(
                        'theme_location' => 'pa_primary_menu'
                    );
                    wp_nav_menu( $defaults );
                ?>
            </nav>
        </header>
        <div id="content" class="group">