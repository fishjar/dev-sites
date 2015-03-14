<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="icon" type="image/gif" href="<?php bloginfo('template_url'); ?>/images/animated_favicon1.gif" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<link rel="alternate" type="application/rss+xml" title="Gaby's Weblog" href="http://feeds.feedburner.com/GabyBlogger">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fishjar.js"></script>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="hd-menu">
				<ul id="hd-menu-list">
					<li><a title="Go to my Homepage" target="_blank" href="http://www.fishjar.com">Homepage</a></li>
					<li><a title="Go to my Weblog" target="_blank" href="http://www.fishjar.com/blog/">Weblog</a></li>
					<li><a title="Go to my Twitter Timeline" target="_blank" href="http://twitter.com/fishjar">Twitter</a></li>
					<li><a title="Go to my Photo Album" target="_blank" href="http://www.fishjar.com/album/">Album</a></li>
					<li><a title="Go to my Music List" target="_blank" href="http://www.last.fm/user/fishjar">Music</a></li>
					<li><a title="Go to my Reader Items" target="_blank" href="https://www.google.com/reader/shared/yugang2002">Reader</a></li>
					<li><a title="Go to my Notebooks" target="_blank" href="https://www.google.com/notebook/user/05665158462053344757">Note</a></li>
				</ul>
			</div>
			<div id="hd-search">
<?php get_search_form(); ?>
			</div>
			<div id="hd-title">
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<p class="subhead"><?php bloginfo( 'description' ); ?></p>
			</div>
			<div id="hd-navigation">
				<div class="nav-btns">
					<a href="http://feeds.feedburner.com/GabyBlogger" class="feed-link" title="Subscribe in a reader">Subscribe in a reader</a>
				</div>
				<ul>
					<li<?php if (is_home()) echo ' class="current_page_item"'; ?>><a href="<?php echo home_url( '/' ); ?>" title="Home">Home</a></li>
					<?php wp_list_pages('title_li=' ); ?>
				</ul>
			</div>
		</div>
		<div id="container">
