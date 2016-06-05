<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<meta name="Description" content="Zhuhai Spark Electronic Equipment Co., LTD, is a company specialized in designing and manufacturing High-end amplifiers and other audio equipments. Have self-support in/export authority. Spark own five brand, SPARK, SPARKAudio, Cayin, CATIC. The main products designed and manufactured by Spark are Transistor amplifiers, Vacuum Tube amplifiers, CD players, Tuner, Radio, Decoder Theatre System and so on."/>
<meta name="Keywords" content="SPARK, SPARKAudio, Cayin, CATIC, HI-FI, HI-END, SPEAKER, VACUUM, TRANSISTOR, SOURCE, THEATRE"/>
<meta name="Author" content="Gaby Yuan, Yugang2002(at)Gmail.com"/>
<meta name="Copyright" content="Zhuhai Spark Electronic Equipment Co., LTD, All rights reserved."/>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nav-h.css" type="text/css" />
<!--[if gte IE 5.5]>
<script language="JavaScript" src="<?php bloginfo('template_directory'); ?>/js/nav-h.js" type="text/JavaScript"></script>
<![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
	<div id="container">
		<div id="main">
			<div id="header">
				<div id="logo"><a href="<?php echo get_option('home'); ?>/../index.html" title="Spark Electronic Equipment Co., LTD."><img src="<?php bloginfo('template_directory'); ?>/images/logo.gif" alt="Spark Electronic Equipment Co., LTD." /></a></div>
				<div id="nav">
					<ul id="navmenu-h">
	  					<li><a href="<?php echo get_option('home'); ?>/../home.html" title="Home">Home</a></li>
						<li><a href="<?php echo get_option('home'); ?>/" class="active" title="News">News</a>
							<ul>
								<?php wp_list_categories('show_count=1&title_li=&show_count=0&orderby=ID'); ?>
							</ul>
						</li>
	  					<li><a href="<?php echo get_option('home'); ?>/../products.html" title="Products">Products</a>
							<ul>
								<li><a href="<?php echo get_option('home'); ?>/../products.html" title="Latest Products">Latest Products</a>	</li>
								<li><a href="<?php echo get_option('home'); ?>/../products_show.html" title="Products Show">Products Show</a>
									<ul>
										<li><a href="<?php echo get_option('home'); ?>/../products_show_vac.html" title="VACUUM TUBE AMPLIFIER">VACUUM TUBE AMPLIFIER</a></li>
										<li><a href="<?php echo get_option('home'); ?>/../products_show_tra.html" title="TRANSISTOR AMPLIFIER">TRANSISTOR AMPLIFIER</a></li>
										<li><a href="<?php echo get_option('home'); ?>/../products_show_the.html" title="HOME THEATRE">HOME THEATRE</a></li>
										<li><a href="<?php echo get_option('home'); ?>/../products_show_sou.html" title="SOUND SOURCE">SOUND SOURCE</a></li>
										<li><a href="<?php echo get_option('home'); ?>/../products_show_spe.html" title="SPEAKER AND OTHERS">SPEAKER AND OTHERS</a></li>
									</ul>
								</li>
								<li><a href="<?php echo get_option('home'); ?>/../products_quality.html" title="Quality System">Quality System</a></li>
							</ul>
						</li>
	  					<li><a href="<?php echo get_option('home'); ?>/../service.html" title="Service">Service</a>
							<ul>
								<li><a href="<?php echo get_option('home'); ?>/../service.html" title="Sales Network">Sales Network</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../service_tichnical.html" title="Technical Support">Technical Support</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../service_faq.html" title="FAQ">FAQ</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../service_feedback.html" title="Feedback">Feedback</a></li>
							</ul>
						</li>
	  					<li><a href="<?php echo get_option('home'); ?>/../company.html" title="Company">Company</a>
							<ul>
								<li><a href="<?php echo get_option('home'); ?>/../company.html" title="About Cayin">About Cayin</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../company_organization.html" title="Organization Framework">Organization</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../company_culture.html" title="Company Culture">Company Culture</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../company_tenet.html" title="Company Tenet">Company Tenet</a></li>
								<li><a href="<?php echo get_option('home'); ?>/../company_honor.html" title="Company Honor">Company Honor</a></li>
							</ul>
						</li>
						<li><a href="<?php echo get_option('home'); ?>/../contact.html" title="Contact Us">Contact</a></li>
						<li><a href="<?php echo get_option('home'); ?>/../sitemap.html" title="Site Map">Sitemap</a></li>
					</ul>
				</div>
			</div>
			<div id="banner_news"></div>
			<div id="content">
				<div id="left_bar">
					<div id="left_bar_top_news"></div>
					<div id="left_bar_nav">
						<ul>
							<li><a <?php if(in_category('company-news') && !is_home()): ?><?php echo 'class="active"'; ?><?php endif; ?> href="<?php bloginfo('url'); ?>/archives/category/company-news/" title="Company News">Company News</a></li>
							<li><a <?php if(in_category('industry-news') && !is_home()): ?><?php echo 'class="active"'; ?><?php endif; ?> href="<?php bloginfo('url'); ?>/archives/category/industry-news/" title="Industry News">Industry News</a></li>
							<li><a <?php if(in_category('media-focus') && !is_home()): ?><?php echo 'class="active"'; ?><?php endif; ?> href="<?php bloginfo('url'); ?>/archives/category/media-focus/" title="Media Focus">Media Focus</a></li>
						</ul>
					</div>
				</div>