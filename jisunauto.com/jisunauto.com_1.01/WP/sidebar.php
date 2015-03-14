<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 */
?>
			<div id="sider">
				<?php if(is_page(array(5,7,9,11))&&!is_search()): ?>
				<h3>关于捷晟</h3>
				<ul>
					<li<?php if(is_page('5')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/about/profile" title="公司简介">公司简介</a></li>
					<li<?php if(is_page('7')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/about/group-structure" title="组织架构">组织架构</a></li>
					<li<?php if(is_page('9')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/about/history" title="成长历程">成长历程</a></li>
					<li<?php if(is_page('11')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/about/social-commitment" title="社会责任">社会责任</a></li>
				</ul>
				<?php elseif((is_category(array(3,4,5,6,7,8,17))||in_category(array(3,4,5,6,7,8,17)))&&!is_search()): ?>
				<h3>产品介绍</h3>
				<ul>
					<li<?php if(is_category('4')||(in_category('4')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/products/product_sd" title="倒角机">倒角机</a></li>
					<li<?php if(is_category('5')||(in_category('5')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/products/product_sg" title="管端机">管端机</a></li>
					<li<?php if(is_category('6')||(in_category('6')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/products/product_sk" title="冲孔机">冲孔机</a></li>
					<li<?php if(is_category('7')||(in_category('7')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/products/product_sq" title="切断机">切断机</a></li>
					<li<?php if(is_category('8')||(in_category('8')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/products/product_sw" title="弯管机">弯管机</a></li>
					<li<?php if(is_category('17')||(in_category('17')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/products/product_ST" title="打字机">打字机</a></li>
				</ul>
				<?php elseif(is_page(array(15,17))&&!is_search()): ?>
				<h3>客户服务</h3>
				<ul>
					<li<?php if(is_page('15')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/service/service-policy" title="服务政策">服务政策</a></li>
					<li<?php if(is_page('17')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/service/faq" title="常见问题">常见问题</a></li>
				</ul>
				<?php elseif((is_page(array(21,23)))&&!is_search()): ?>
				<h3>资料下载</h3>
				<ul>
					<li<?php if(is_page('23')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/downloads/technical-documents" title="技术文档">技术文档</a></li>
					<li<?php if(is_page('21')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/downloads/products-picture" title="产品图片">产品图片</a></li>
				</ul>
				<?php elseif((is_category(array(9,10,11))||in_category(array(9,10,11)))&&!is_search()): ?>
				<h3>新闻中心</h3>
				<ul>
					<li<?php if(is_category('10')||(in_category('10')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/news/company-news" title="公司新闻">公司新闻</a></li>
					<li<?php if(is_category('11')||(in_category('11')&&is_singular())) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/category/news/industry-news" title="业内新闻">业内新闻</a></li>
				</ul>
				<?php elseif((is_page(array(27,29)))&&!is_search()): ?>
				<h3>联系我们</h3>
				<ul>
					<li<?php if(is_page('27')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/contact/contacts" title="联系方式">联系方式</a></li>
					<li<?php if(is_page('29')) echo ' class="active"'; ?>><a href="<?php bloginfo('url'); ?>/contact/contact-online" title="在线联系">在线联系</a></li>
				</ul>
				<?php elseif(is_page('32')&&!is_search()): ?>
				<h3>法律信息</h3>
				<?php elseif(is_page('34')&&!is_search()): ?>
				<h3>隐私声明</h3>
				<?php elseif(is_page('36')&&!is_search()): ?>
				<h3>网站地图</h3>
				<?php elseif(is_search()): ?>
				<h3>站内搜索</h3>
				<?php endif; ?>
			</div>
