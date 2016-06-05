<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta content="Gaby Yuan | Yugang2002(at)Gmail(dot)com" name="Author">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/nav.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/pagenavi-css.css" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
	<?php wp_head(); ?>
</head>
<body>
	<div class="<?php globalnav_class(); ?>" id="globalheader">
		<ul id="globalnav">
			<li id="gn-index"><a href="<?php bloginfo('url'); ?>/../">Spark</a></li>
			<li id="gn-home"><a href="<?php bloginfo('url'); ?>/">首页</a></li>
			<li id="gn-news"><a href="<?php bloginfo('url'); ?>/?cat=3">新闻中心</a></li>
			<li id="gn-product"><a href="<?php bloginfo('url'); ?>/?cat=6">产品展示</a></li>
			<li id="gn-sales"><a href="<?php bloginfo('url'); ?>/?page_id=16">产品销售</a></li>
			<li id="gn-support"><a href="<?php bloginfo('url'); ?>/?page_id=21">技术支持</a></li>
			<li id="gn-download"><a href="<?php bloginfo('url'); ?>/?page_id=24">文件下载</a></li>
			<li id="gn-about"><a href="<?php bloginfo('url'); ?>/?page_id=3">关于我们</a></li>
		</ul>
		<div align="center" id="globalsearch" class="">
			<?php get_search_form(); ?>
		</div>
	</div>
	<div id="productheader">
		<h1><a class="<?php globalnav_class(); ?>">SparkAudio</a></h1>
		<ul id="productnav">
			<?php if ((is_category('3') || in_category( array( 4,5 ) )) && !is_home() && !is_search()) : ?>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=4" <?php if (in_category('4') && !is_category('3')) { echo 'class="active"'; } ?>>企业动态</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=5" <?php if (in_category('5') && !is_category('3')) { echo 'class="active"'; } ?>>媒体聚焦</a></li>
			<?php elseif ((is_category('6') || in_category( array( 7,8,9,10,11,12 ))) && !is_home() && !is_search()) : ?>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=7" <?php if (in_category('7') && !is_category('6')) { echo 'class="active"'; } ?>>电子管系列</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=8" <?php if (in_category('8') && !is_category('6')) { echo 'class="active"'; } ?>>晶体管系列</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=9" <?php if (in_category('9') && !is_category('6')) { echo 'class="active"'; } ?>>家庭影院系列</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=10" <?php if (in_category('10') && !is_category('6')) { echo 'class="active"'; } ?>>音源系列</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=11" <?php if (in_category('11') && !is_category('6')) { echo 'class="active"'; } ?>>桌面音频系统</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=12" <?php if (in_category('12') && !is_category('6')) { echo 'class="active"'; } ?>>音箱与其它</a></li>
			<?php elseif ((in_category('14') || is_page(array( 16,18 ))) && !is_home() && !is_search()) : ?>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=16" <?php if (is_page('16')) { echo 'class="active"'; } ?>>营销网络</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=14" <?php if (in_category('14')) { echo 'class="active"'; } ?>>客户案例</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=18" <?php if (is_page('18')) { echo 'class="active"'; } ?>>用户反馈</a></li>
			<?php elseif ((in_category('16') || is_page('21')) && !is_home() && !is_search()) : ?>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=21" <?php if (is_page('21')) { echo 'class="active"'; } ?>>常见问题</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?cat=16" <?php if (in_category('16')) { echo 'class="active"'; } ?>>音响知识</a></li>
			<?php elseif (is_page(array( 24,26 ))) : ?>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=24" <?php if (is_page('24')) { echo 'class="active"'; } ?>>产品图片</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=26" <?php if (is_page('26')) { echo 'class="active"'; } ?>>产品说明书</a></li>
			<?php elseif (is_page(array( 3,5,8,10,12 ))) : ?>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=3" <?php if (is_page('3')) { echo 'class="active"'; } ?>>公司简介</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=5" <?php if (is_page('5')) { echo 'class="active"'; } ?>>组织机构</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=8" <?php if (is_page('8')) { echo 'class="active"'; } ?>>资质认证</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=10" <?php if (is_page('10')) { echo 'class="active"'; } ?>>企业文化</a></li>
			<li id=""><a href="<?php bloginfo('url'); ?>/?page_id=12" <?php if (is_page('12')) { echo 'class="active"'; } ?>>公司荣誉</a></li>
			<?php endif; ?>
			<li id=""><a class="buy" href="<?php bloginfo('url'); ?>/?page_id=16">购买产品</a></li>
		</ul>
	</div>
