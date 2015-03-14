<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
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
			//echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

		?></title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="shortcut icon" type="image/ico" href="../images/favicon.ico" />
	<link rel="icon" type="image/gif" href="../images/animated_favicon.gif" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/reset.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/blog.css" media="all" />
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6.css" media="all" />
	<![endif]-->
</head>
<body>
	<div class="wrap ma">
		<div class="head pr">
			<div class="titles">
				<h1 class="title di"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h3 class="subtitle di"><?php bloginfo( 'description' ); ?></h3>
			</div>
			<ul class="links pa">
				<li><a title="Go to my Homepage" target="_blank" href="http://www.fishjar.com">Homepage</a></li>
				<li><a title="Go to my Weblog" target="_blank" href="http://www.fishjar.com/blog/">Weblog</a></li>
				<li><a title="Go to my Twitter Timeline" target="_blank" href="http://twitter.com/fishjar">Twitter</a></li>
				<li><a title="Go to my Photo Album" target="_blank" href="http://www.fishjar.com/album/">Album</a></li>
				<li><a title="Go to my Music List" target="_blank" href="http://www.last.fm/user/fishjar">Music</a></li>
			</ul>
			<div class="search pa">
				<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" accept-charset="utf-8">
					<input class="search-field bt bn fr" type="text" name="s" id="" value="Search" />
					<input class="search-btn bt bn cp" type="submit" value="" />
				</form>
			</div>
		</div>
		<?php $args = array(
			'depth'        => 0,
			'show_date'    => '',
			'date_format'  => get_option('date_format'),
			'child_of'     => 0,
			'exclude'      => '',
			'include'      => '',
			'title_li'     => '',
			'echo'         => 1,
			'authors'      => '',
			'sort_column'  => 'menu_order, post_title',
			'link_before'  => '',
			'link_after'   => '',
			'walker'       => '' ); ?>
		<div class="nav">
			<a href="http://feeds.feedburner.com/GabyBlogger" class="feed fr ti">Subscribe in a reader</a>
			<ul>
				<li<?php if (is_home()) echo ' class="current_page_item"'; ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Home">Home</a></li>
				<?php wp_list_pages( $args ); ?>
			</ul>
		</div>
