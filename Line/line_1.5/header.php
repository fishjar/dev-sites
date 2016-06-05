<?php
/**

 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/line.js"></script>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php	wp_head(); ?>
</head>

<body>
	<div id="main" class="<?php globalnav_class(); ?>">
		<div id="header">
			<div id="search_div"><?php get_search_form(); ?></div>
			<div id="logo"><h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1></div>
		</div>
		<div id="nav">
			<ul>
				<li id="nv_index"><a href="<?php bloginfo('url'); ?>/">首页</a></li>
				<li id="nv_about"><a href="<?php bloginfo('url'); ?>/?page_id=12">公司概况</a></li>
				<li id="nv_product"><a href="<?php bloginfo('url'); ?>/?cat=5">产品</a></li>
				<li id="nv_news"><a href="<?php bloginfo('url'); ?>/?cat=11">丽磁资讯</a></li>
				<li id="nv_support"><a href="<?php bloginfo('url'); ?>/?page_id=22">客户服务</a></li>
				<li id="nv_contact"><a href="<?php bloginfo('url'); ?>/?page_id=30">联系我们</a></li>
			</ul>
		</div>
		<div id="container">
			<div id="con_menu">
				<ul>
					<?php if ((is_home() || is_page('8')) && !is_search()) : ?>
					<li><a href="<?php bloginfo('url'); ?>/" <?php if (is_home()) { echo 'class="active"'; } ?>>最新产品</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=8" <?php if (is_page('8')) { echo 'class="active"'; } ?>>关于我们</a></li>
					<?php elseif (is_page(array( 12,14,16,18 ))) : ?>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=12" <?php if (is_page('12')) { echo 'class="active"'; } ?>>丽磁历史</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=14" <?php if (is_page('14')) { echo 'class="active"'; } ?>>技术优势</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=16" <?php if (is_page('16')) { echo 'class="active"'; } ?>>丽磁荣誉</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=18" <?php if (is_page('18')) { echo 'class="active"'; } ?>>公司宗旨</a></li>
					<?php elseif ((is_category('5') || in_category( array( 6,7,8,9,10 ))) && !is_home() && !is_search()) : ?>
					<li><a href="<?php bloginfo('url'); ?>/?cat=6" <?php if (in_category('6') && !is_category('5')) { echo 'class="active"'; } ?>>电子管功放</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?cat=7" <?php if (in_category('7') && !is_category('5')) { echo 'class="active"'; } ?>>CD播放机</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?cat=8" <?php if (in_category('8') && !is_category('5')) { echo 'class="active"'; } ?>>HIFI扬声器</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?cat=9" <?php if (in_category('9') && !is_category('5')) { echo 'class="active"'; } ?>>经典产品</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?cat=10" <?php if (in_category('10') && !is_category('5')) { echo 'class="active"'; } ?>>配件</a></li>
					<?php elseif ((is_category('11') || in_category( array( 12,13 ))) && !is_home() && !is_search()) : ?>
					<li><a href="<?php bloginfo('url'); ?>/?cat=12" <?php if (in_category('12') && !is_category('11')) { echo 'class="active"'; } ?>>丽磁动态</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?cat=13" <?php if (in_category('13') && !is_category('11')) { echo 'class="active"'; } ?>>媒介推广</a></li>
					<?php elseif (is_page(array( 22,24,28,26 ))) : ?>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=22" <?php if (is_page('22')) { echo 'class="active"'; } ?>>销售网络</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=24" <?php if (is_page('24')) { echo 'class="active"'; } ?>>常见问题</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=28" <?php if (is_page('28')) { echo 'class="active"'; } ?>>资料下载</a></li>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=26" <?php if (is_page('26')) { echo 'class="active"'; } ?>>用户反馈</a></li>
					<?php elseif (is_page('30')) :  ?>
					<li><a href="<?php bloginfo('url'); ?>/?page_id=30" <?php if (is_page('30')) { echo 'class="active"'; } ?>>联系我们</a></li>
					<?php elseif (is_search()) :  ?>
					<li><a href="#" <?php if (is_search()) { echo 'class="active"'; } ?>>搜索结果</a></li>
					<?php endif; ?>
				</ul>
			</div>


