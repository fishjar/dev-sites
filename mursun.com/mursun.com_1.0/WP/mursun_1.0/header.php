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
	<!-- //styles -->
</head>
<body>
	<div id="wrap" class="wrap">
		<div class="hdwp">
			<div class="hdwpb">
				<div class="hd ma pr">
					<div class="logo pa">
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ti db" title="<?php bloginfo( 'name' ); ?>" <?php
							if(get_field('logo_img', 'options')){
								echo 'style="background-image:url(' . get_field('logo_img', 'options') . ');"';
							}
						?>><?php bloginfo( 'name' ); ?></a></h1>
					</div>
					<div class="panel">
						<div class="search fr pr">
							<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input type="hidden" name="post_type[]" value="news" />
								<input type="hidden" name="post_type[]" value="exhibit-portfolio" />
								<input type="hidden" name="post_type[]" value="portable-displays" />
								<input class="search-field bt bn" type="text" name="s" id="" value="Search" />
								<input class="search-btn bt bn cp pa" type="submit" name="submit" value="" />
							</form>
						</div>
					</div>
					<div class="nav pa">
						<ul class="nav-ul-1">
							<li class="nav-li-1"><a href="<?php echo get_permalink( get_first_id_by_post_type('about') ); ?>" class="nav-a-1"><span class="nav-span-1"><?php  echo get_post_type_name_by_slug('about'); ?></span></a>
								<?php _page_snav('about','','hd'); ?>
							</li>
							<li class="nav-li-1"><a href="<?php echo get_post_type_archive_link('exhibit-portfolio') ?>" class="nav-a-1"><span class="nav-span-1"><?php  echo get_post_type_name_by_slug('exhibit-portfolio'); ?></span></a>
								<?php _cat_snav('exhibit-portfolio','nav','hd'); ?>
							</li>
							<li class="nav-li-1"><a href="<?php echo get_post_type_archive_link('portable-displays') ?>" class="nav-a-1"><span class="nav-span-1"><?php  echo get_post_type_name_by_slug('portable-displays'); ?></span></a>
								<?php _cat_snav('portable-displays','nav','hd'); ?>
							</li>
							<li class="nav-li-1"><a href="<?php echo get_permalink( get_first_id_by_post_type('exhibit-services') ); ?>" class="nav-a-1"><span class="nav-span-1"><?php  echo get_post_type_name_by_slug('exhibit-services'); ?></span></a>
								<?php _page_snav('exhibit-services','','hd'); ?>
							</li>
							<li class="nav-li-1"><a href="<?php echo get_post_type_archive_link('news') ?>" class="nav-a-1"><span class="nav-span-1"><?php  echo get_post_type_name_by_slug('news'); ?></span></a>
								<?php _cat_snav('news','nav','hd'); ?>
							</li>
							<li class="nav-li-1"><a href="<?php echo get_permalink( get_first_id_by_post_type('contact-us') ); ?>" class="nav-a-1"><span class="nav-span-1"><?php  echo get_post_type_name_by_slug('contact-us'); ?></span></a>
								<?php _page_snav('contact-us','','hd'); ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>