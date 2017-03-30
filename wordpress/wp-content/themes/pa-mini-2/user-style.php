<?php header("Content-type: text/css"); ?>
<?php
/*
  * Added through Function file and values comes from Admin panel using theme-options.php
  * */
?>

<?php
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

$footerBackground = get_option('pa_footerBackground') ? get_option('pa_footerBackground') : '#383838';
$mediaColor = get_option('pa_mediaColor') ? get_option('pa_mediaColor') : '#fcfcfc';
$mediaColorHover = get_option('pa_mediaColorHover') ? get_option('pa_mediaColorHover') : '#949494';
$footerText = get_option('pa_footerText') ? get_option('pa_footerText') : '#b8b8b8';
$footerLink = get_option('pa_footerLink') ? get_option('pa_footerLink') : '#93b5cc';
$footerLinkHover = get_option('pa_footerLinkHover') ? get_option('pa_footerLinkHover') : '#6d808c';


?>

a {
color: <?php echo $linkColor; ?>;
}
a:hover {
color: <?php echo $linkColorHover; ?>;
}
#mediaIcons a {
color: <?php echo $mediaColor; ?>;
}
#mediaIcons a:hover {
color: <?php echo $mediaColorHover; ?>;
}
h1, h2,
h1 a,
h2 a {
color: <?php echo $titleColor; ?>;
}
h1 a:hover,
h2 a:hover {
color: <?php echo $titleColorHover; ?>;
}
#page {
background-color: <?php echo $pageBackground; ?>;
}

<?php //if no-image we are not showing this rule
//$backgroundImage = ( $backgroundImage');
if( $backgroundImage != 'no-image' ) {
    ?>
    .hello {}
    #page {
    background-image: url('<?php echo $backgroundImage; ?>');
    background-position: <?php echo $backgroundPosition; ?>;
    background-repeat: <?php echo $backgroundRepeat; ?>;
    background-size: <?php echo $backgroundSize; ?>;
    }

<?php
}
?>

<?php //Main Menu color ?>
nav#headerMenu ul {
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $menuLightColor; ?>),
color-stop(100%, <?php echo $menuDarkColor; ?>));
    background: -webkit-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -moz-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -o-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    border-top: 1px solid <?php echo $menuLightColor; ?>;
    border-bottom: 1px solid <?php echo $menuDarkColor; ?>;
}

nav#headerMenu li a:hover {
    background: <?php echo $menuDarkColor; ?>;
}
nav#headerMenu li ul a {
    background: <?php echo $menuDarkColor; ?>;
}
nav#headerMenu li ul a:hover {
    background: <?php echo $menuLightColor; ?>;
}

<?php //Main Menu mobile ?>
#mobSelectorWrap a {
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $menuLightColor; ?>), color-stop(100%, <?php echo $menuDarkColor; ?>));
    background: -webkit-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -moz-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -o-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    border-bottom: 1px solid <?php echo $menuLightColor; ?>;
    color: #fff;
}
#jPanelMenu-menu a {
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $menuLightColor; ?>), color-stop(100%, <?php echo $menuDarkColor; ?>));
    background: -webkit-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -moz-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -o-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
}
#jPanelMenu-menu a:hover {
    color: #999999;
    background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, <?php echo $menuLightColor; ?>), color-stop(100%, <?php echo $menuDarkColor; ?>));
    background: -webkit-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -moz-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: -o-linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
    background: linear-gradient(<?php echo $menuLightColor; ?>, <?php echo $menuDarkColor; ?>);
}




.post, .widget {
background-color: <?php echo $panelBackground; ?>;
}
div, p, span {
color: <?php echo $textColor; ?>;
}

footer, footer .widget {
background-color: <?php echo $footerBackground; ?>;
}
footer div,
footer p,
footer span {
color: <?php echo $footerText; ?>;
}
footer a {
color: <?php echo $footerLink; ?>;
}
footer a:hover {
color: <?php echo $footerLinkHover; ?>;
}

