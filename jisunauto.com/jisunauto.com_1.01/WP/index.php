<?php
/**
 * The main template file.
 *
 */

get_header(); ?>
			<div class="ad">
				<ul class="adslide">
					<li><a href="<?php bloginfo('url'); ?>/category/products/product_sd"><img src="<?php bloginfo('template_directory'); ?>/images/index_show_02.jpg" alt="倒角机" title="倒角机" /></a></li>
					<li><a href="<?php bloginfo('url'); ?>/category/products/product_sg"><img src="<?php bloginfo('template_directory'); ?>/images/index_show_03.jpg" alt="管端机" title="管端机" /></a></li>
					<li><a href="<?php bloginfo('url'); ?>/category/products/product_sk"><img src="<?php bloginfo('template_directory'); ?>/images/index_show_04.jpg" alt="冲孔机" title="冲孔机" /></a></li>
				</ul>
			</div>
			<div class="indexnews">
				<h4>新闻</h4>
				<ul>
					<?php get_template_part( 'loop', 'index' );  ?>
				</ul>
				<p><a class="more" href="<?php bloginfo('url'); ?>/category/news" title="了解更多新闻">更多</a></p>
			</div>
			<div class="indexbox">
				<ul>
					<li class="box_1 active"><a href="<?php bloginfo('url'); ?>/about/profile" title="本公司座落于美丽的花城广州番禺区，环境优美，交通方便……">本公司座落于美丽的花城广州番禺区，环境优美，交通方便……</a></li>
					<li class="box_2"><a href="<?php bloginfo('url'); ?>/category/products" title="公司拥有一批高水平的研发人员，成功开发了几十种热交换产品生产设备……">公司拥有一批高水平的研发人员，成功开发了几十种热交换产品生产设备……</a></li>
					<li class="box_3"><a href="<?php bloginfo('url'); ?>/service/service-policy" title="本着顾客至上的原则，坚持互利互赢，以创新、服务为特点的管理理念……">本着顾客至上的原则，坚持互利互赢，以创新、服务为特点的管理理念……</a></li>
				</ul>
				<div class="clearb"></div>
			</div>
<?php get_footer(); ?>
