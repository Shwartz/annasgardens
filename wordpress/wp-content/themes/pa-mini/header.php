<!DOCTYPE html>
<html lang="en">
<head>
    <?php if (is_front_page()) { ?>
        <title>Garden services in London | Anna's Gardens</title>
    <?php } else { ?>
        <title> <?php wp_title(false); ?> | <?php bloginfo('name'); ?></title>
    <?php } ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Open+Sans" rel="stylesheet">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>

<body class="no-js">
<?php // <div id="mediaDebug"></div> ?>
<div id="page">
    <div id="container" class="group">
        <header class="top group">

            <div class="top-logo">
                <a href="<?php bloginfo('url') ?>">Anna's Gardens - Organic Garden Maintenance</a>
            </div>

            <div class="top-contacts">
                <p class="_phone">+44 (0) 7 95 824 7517</p>
                <p class="_address">32 Rosebank Epsom, London KT1 87RS</p>
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