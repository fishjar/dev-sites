	<div id="container">
		<div class="maincap top"></div>
		<div class="grid1col">
			<div class="postlist">
				<ul class="postlist_pic">
					<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(thumbnail); ?><?php the_title(); ?></a></li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
			<?php wp_pagenavi(); ?>
			<script type="text/javascript" src="http://china-addthis.googlecode.com/svn/trunk/addthis.js" charset="UTF-8"></script><span class="addthis_org_cn"><a href="http://addthis.org.cn/share/" i="0|1|31|2|3|4|5|28|21|22|23|11|30|27|6|7|29|71|73|74|76" title="ÊÕ²Ø&amp;·ÖÏí"><img src="http://addthis.org.cn/images/a1.gif" alt="test" align="absmiddle" /></a></span>
			<div class="clear"> </div>
		</div>
		<div class="maincap bottom"></div>
	</div>
