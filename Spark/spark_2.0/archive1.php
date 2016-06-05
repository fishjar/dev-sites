	<div id="container">
		<div class="maincap top"></div>
		<div class="grid1col">
			<div class="postctent <?php globalnav_class(); ?>">
				<div class="postleft"> </div>
				<div class="postright">
					<ul>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> <small>(<?php the_time(__('Y-m-d')) ?>)</small></li>
						<?php endwhile; endif; ?>
					</ul>
				</div>
			</div>
			<?php wp_pagenavi(); ?>
			<script type="text/javascript" src="http://china-addthis.googlecode.com/svn/trunk/addthis.js" charset="UTF-8"></script><span class="addthis_org_cn"><a href="http://addthis.org.cn/share/" i="0|1|31|2|3|4|5|28|21|22|23|11|30|27|6|7|29|71|73|74|76" title="收藏&amp;分享"><img src="http://addthis.org.cn/images/a1.gif" alt="分享家:Addthis中文版" align="absmiddle" /></a></span>
			<div class="clear"> </div>			
		</div>
		<div class="maincap bottom"></div>
	</div>
