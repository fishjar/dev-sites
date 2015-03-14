<?php
/**
 * The Header for our theme.
 */
header("Location: http://www.jisunauto.com/zh_CN/");
exit;
?><!DOCTYPE html>
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
<meta name="description" content="广州捷晟自动化控制设备有限公司是专业的热交换产品生产设备供应商，生产各种半自动切断机、盘管较直切断机、自动倒角机、管端加工机、弯管机、消音器加工设备等，这些设备针对工厂实际情况，帮助生产企业完成高效率的批量生产，并且设备具有人性化操作，维护简单等特点，在业内拥有良好的声誉。" />
<meta name="keywords" content="自动化控制设备,热交换产品生产设备,自动切断机,较直切断机,自动倒角机,管端加工机,弯管机,冲孔机,消音器加工设备" />
<meta name="author" content="Yugang2002[at]gmail.com, Gaby Yuan" />
<meta name="copyright" content="Guangzhou Jisun Automation Co., Ltd. all rights reserved." />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- scripts -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fadingnav.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.fadingbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.min.jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jisun.js"></script>
<?php wp_head(); ?>
</head>

<body>
	<div id="wrapper">
		<div id="header">
			<div class="logo">
				<ul class="language">
					<li class="active"><a href="<?php echo home_url( '/' ); ?>" title="中文网站">中文</a>&nbsp;|&nbsp;</li>
					<li><a href="<?php get_site_url(); ?>/en/" title="English Site">English</a></li>
				</ul>
				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			</div>
			<div class="nav">
				<div class="search">
					<form method="get" class="searchform" action="<?php echo home_url( '/' ); ?>" accept-charset="utf-8">
						<label>Search for:</label>
						<input type="text" class="searchfield" name="s" value="请输入搜索内容按回车" maxlength="25" >
						<input type="submit" value="Search" class="searchsubmit">
					</form>
				</div>
				<ul>
					<li class="home<?php if(is_home()) echo' active'; ?>"><a href="<?php echo home_url( '/' ); ?>" title="首页">首页</a></li>
					<li class="company<?php if(is_page(array(5,7,9,11))) echo' active'; ?>"><a href="<?php bloginfo('url'); ?>/about/profile" title="关于捷晟">关于捷晟</a>
						<ul class="subnav">
							<li><a href="<?php bloginfo('url'); ?>/about/profile" title="公司简介">公司简介</a></li>
							<li><a href="<?php bloginfo('url'); ?>/about/group-structure" title="组织架构">组织架构</a></li>
							<li><a href="<?php bloginfo('url'); ?>/about/history" title="成长历程">成长历程</a></li>
							<li><a href="<?php bloginfo('url'); ?>/about/social-commitment" title="社会责任">社会责任</a></li>
						</ul>
					</li>
					<li class="products<?php if((is_category(array(3,4,5,6,7,8,17))||in_category(array(3,4,5,6,7,8,17)))&&!is_home()) echo' active'; ?>"><a href="<?php bloginfo('url'); ?>/category/products" title="产品介绍">产品介绍</a>
						<ul class="subnav">
							<li><a href="<?php bloginfo('url'); ?>/category/products/product_sd" title="倒角机">倒角机</a></li>
							<li><a href="<?php bloginfo('url'); ?>/category/products/product_sg" title="管端机">管端机</a></li>
							<li><a href="<?php bloginfo('url'); ?>/category/products/product_sk" title="冲孔机">冲孔机</a></li>
							<li><a href="<?php bloginfo('url'); ?>/category/products/product_sq" title="切断机">切断机</a></li>
							<li><a href="<?php bloginfo('url'); ?>/category/products/product_sw" title="弯管机">弯管机</a></li>
							<li><a href="<?php bloginfo('url'); ?>/category/products/product_ST" title="打字机">打字机</a></li>
						</ul>
					</li>
					<li class="service<?php if(is_page(array(15,17))) echo' active'; ?>"><a href="<?php bloginfo('url'); ?>/service/service-policy" title="客户服务">客户服务</a>
						<ul class="subnav">
							<li><a href="<?php bloginfo('url'); ?>/service/service-policy" title="服务政策">服务政策</a></li>
							<li><a href="<?php bloginfo('url'); ?>/service/faq" title="常见问题">常见问题</a></li>
						</ul>
					</li>
					<li class="downloads<?php if(is_page(array(21,23))) echo' active'; ?>"><a href="<?php bloginfo('url'); ?>/downloads/technical-documents" title="资料下载">资料下载</a>
						<ul class="subnav">
							<li><a href="<?php bloginfo('url'); ?>/downloads/technical-documents" title="技术文档">技术文档</a></li>
							<li><a href="<?php bloginfo('url'); ?>/downloads/products-picture" title="产品图片">产品图片</a></li>
						</ul>
					</li>
					<li class="news<?php if((is_category(array(9,10,11))||in_category(array(9,10,11)))&&!is_home()) echo' active'; ?>"><a href="<?php bloginfo('url'); ?>/category/news" title="新闻中心">新闻中心</a>
						<ul class="subnav">
							<li><a href="<?php bloginfo('url'); ?>/category/news/company-news" title="公司新闻">公司新闻</a></li>
							<li><a href="<?php bloginfo('url'); ?>/category/news/industry-news" title="业内新闻">业内新闻</a></li>
						</ul>
					</li>
					<li class="contact<?php if(is_page(array(27,29))) echo' active'; ?>"><a href="<?php bloginfo('url'); ?>/contact/contacts" title="联系我们">联系我们</a>
						<ul class="subnav">
							<li><a href="<?php bloginfo('url'); ?>/contact/contacts" title="联系方式">联系方式</a></li>
							<li><a href="<?php bloginfo('url'); ?>/contact/contact-online" title="在线联系">在线联系</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div id="main">
		