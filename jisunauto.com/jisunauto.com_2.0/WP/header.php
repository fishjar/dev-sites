<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title><?php echo get_page_meta('title'); ?></title>
	<meta name="keywords" content="<?php echo get_page_meta('keywords'); ?>" />
	<meta name="description" content="<?php echo get_page_meta('description'); ?>" />
	<meta name="author" content="Gaby@FishJar.com" />
	<!-- //styles -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/reset.css" media="all" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/default.css" media="all" />
	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6.css" media="all" />
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/minimalist.css" media="all" />
	<!-- //styles -->
</head>
<body>
	<div id="wrap" class="wrap ma">
		<div id="hd" class="hd pr">
			<h1 class="logo fl"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="db ti" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="nav pa">
				<ul class="nu1">
					<li class="nl1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="na1<?php if(is_home()){echo ' na1active';} ?>"><span class="ns1">首&nbsp;页</span></a></li>
					<li class="nl1"><a href="<?php echo get_permalink( get_first_id_by_post_type('about') ); ?>" class="na1<?php if(is_single()&&in_term('about','nav')){echo ' na1active';} ?>"><span class="ns1"><?php  echo get_post_type_name_by_slug('about'); ?></span></a>
						<?php show_page_nav('about'); ?>
					</li>
					<li class="nl1"><a href="<?php echo get_post_type_archive_link('products') ?>" class="na1<?php if(is_post_type_archive('products') || in_term('products','nav')){echo ' na1active';} ?>"><span class="ns1"><?php  echo get_post_type_name_by_slug('products'); ?></span></a>
						<?php show_cat_nav('products','nav',true,'hd'); ?>
					</li>
					<li class="nl1"><a href="<?php echo get_permalink( get_first_id_by_post_type('service') ); ?>" class="na1<?php if(is_single()&&in_term('service','nav')){echo ' na1active';} ?>"><span class="ns1"><?php  echo get_post_type_name_by_slug('service'); ?></span></a>
						<?php show_page_nav('service'); ?>
					</li>
					<li class="nl1"><a href="<?php echo get_post_type_archive_link('news') ?>" class="na1<?php if(is_post_type_archive('news') || in_term('news','nav')){echo ' na1active';} ?>"><span class="ns1"><?php  echo get_post_type_name_by_slug('news'); ?></span></a>
						<?php show_cat_nav('news','nav',false,'hd'); ?>
					</li>
					<li class="nl1"><a href="<?php echo get_permalink( get_first_id_by_post_type('contact') ); ?>" class="na1<?php if(is_single()&&in_term('contact','nav')){echo ' na1active';} ?>"><span class="ns1"><?php  echo get_post_type_name_by_slug('contact'); ?></span></a>
						<?php show_page_nav('contact'); ?>
					</li>
				</ul>
			</div>
			<div class="search fr pr">
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="hidden" name="post_type[]" value="news" />
					<input type="hidden" name="post_type[]" value="products" />
					<input class="search-field bt bn" type="text" name="s" id="" value="搜索" />
					<input class="search-btn bt bn cp pa" type="submit" name="submit" value="" />
				</form>
			</div>
		</div>