<?php
/**
 * @package WordPress
 * @subpackage Fishjar_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
		<link rel="icon" type="image/gif" href="<?php bloginfo('template_url'); ?>/images/animated_favicon1.gif" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feeds.feedburner.com/GabyBlogger" />
		<meta name="google-site-verification" content="odm-Z0PT7-Bnr8VXSfuegm1vbEOnwCIvpUtgXcqe_vI" />
		<?php wp_head(); ?>
	</head>
	
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="hd-menu">
					<a href="http://www.rayjar.com/" target="_blank" title="Go to my Photoblog">Photoblog</a> | <a href="https://twitter.com/fishjar" target="_blank" title="Go to my Twitter Timeline">Twitter</a> | <a href="http://picasaweb.google.com/yugang2002" target="_blank" title="Go to my Album Page">Album</a> | <a href="http://www.last.fm/user/fishjar" target="_blank" title="Go to my Music List">Music</a> | <a href="https://www.google.com/reader/shared/yugang2002" target="_blank" title="Go to my Shared Items">Reader</a> | <a href="https://www.google.com/notebook/user/05665158462053344757" target="_blank" title="Go to my Notebooks">Note</a>
				</div>
				<div id="hd-title">
					<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					<h5><?php bloginfo('description'); ?></h5>
				</div>
				<div id="hd-search"><?php get_search_form(); ?></div>
				<div id="hd-nav">
					<a href="http://feeds.feedburner.com/GabyBlogger" rel="alternate" type="application/rss+xml" target="_blank" title="Subscribe in a reader" class="feedicon">Subscribe in a reader</a>
					<ul class="nav-tab">
						<li<?php if (is_home()): echo ' class="current_page_item"'; endif; ?>><a href="<?php echo get_option('home'); ?>/" title="Home">Home</a></li>
						<?php wp_list_pages('title_li=' ); ?>
					</ul>
				</div>
			</div>
