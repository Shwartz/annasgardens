<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <?php if (is_front_page()) { ?>
        <title>Garden services in London | Anna's Gardens</title>
    <?php } else { ?>
        <title> <?php wp_title(false); ?> | <?php bloginfo('name'); ?></title>
    <?php } ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Rouge+Script' rel='stylesheet' type='text/css'>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>

<body class="no-js">
<?php // <div id="mediaDebug"></div> ?>
<div id="page">
    <div id="container" class="group">
        <header class="top group">

            <div class="top-contacts">
                <p class="_phone">+44 (0) 7 95 824 7517</p>
                <p class="_address">32 Rosebank Epsom, London KT1 87RS</p>
            </div>

            <div class="top-logo">
                <a href="<?php bloginfo('url') ?>">Anna's Gardens - Organic Garden Maintenance</a>
            </div>

            <div class="top-search">
                <?php get_search_form(true); ?>
            </div>



        </header>
        <nav class="main-menu">
            <?php
            $defaults = array(
                'theme_location' => 'pa_primary_menu'
            );
            wp_nav_menu($defaults);
            ?>
        </nav>
        <div id="content" class="group">


            <!--
            <div class="searchbar">
                <form name="search" method="get" action="http://annasgardens.local">
                    <input class="searchInput" type="text" name="s">
                    <button class="searchSubmit" title="Search" type="submit"> <span data-icon="" aria-hidden="true"></span></button>
                </form>
            </div>
            -->