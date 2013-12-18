<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> : Blog Archive <?php } ?> <?php if (is_tag()) { echo ' : '; UTW_ShowCurrentTagSet('tagsettextonly'); } ?><?php wp_title(':'); ?></title>

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="shortcut icon" href="/favicon.ico" >

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php wp_head(); ?>
</head>
<body>

<div id="page">
	<div id="header">
		<a href="<?php echo get_settings('home'); ?>" id="blogname"><?php bloginfo('name'); ?></a>:<span id="blogdescription"><?php bloginfo('description'); ?></span>
	</div>
	<div id="topnav">
	<ul id="catNav">
			<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
			<li><a href="/search">Search</a></li>
	</ul>
	</div>

	<div id="main">
