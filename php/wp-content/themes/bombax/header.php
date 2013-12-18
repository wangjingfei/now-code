<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (function_exists('ghpseo_output')) ghpseo_output('main_title'); else {wp_title('&laquo;', true, 'right'); bloginfo('name'); } ?></title>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> latest post RSS" href="<?php echo itx_get_option('links','rss') ?>" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> latest comment RSS" href="<?php echo itx_get_option('links','crss') ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/ie6.css">
<![endif]-->
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri()?>/css/ie7.css">
<![endif]-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<?php
    if (is_singular() && get_option( 'thread_comments' )) wp_enqueue_script( 'comment-reply' );
    if (is_active_widget(false,false,'itx_tabbed_sidebar')||!is_active_sidebar(1)) wp_enqueue_script('jquery-ui-tabs');
    if ( itx_get_option('misc','nohover') == 0 ) wp_enqueue_script('jquery-color');
	wp_enqueue_script('itx',get_bloginfo('url').'/?itx=js');
	wp_enqueue_style('itx',get_bloginfo('url').itx_preview_vars('css'));
	wp_head();
?>
</head>
<body <?php body_class(); ?>>
    <div class="wrap">
        <div id="top-menu">
            <?php itx_menu('menu_class=sf-menu%20top-menu&theme_location=top');?>
        </div>
    </div>
    <?php itx_header();?>
    <div id="menucont" class="ui-widget-header">
        <div class="wrap">
            <div id="menu">
                <?php itx_menu('menu_class=sf-menu&theme_location=primary');itx_links();?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
<div id="on" class="sidebaron"></div><div id="off" class="sidebaroff"></div>
<div class="clear"></div>