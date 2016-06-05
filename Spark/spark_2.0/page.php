<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="container">
		<div class="maincap top"></div>
		<div class="grid1col">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postctent">
				<div class="entry" id="post-<?php the_ID(); ?>">
					<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
				</div>
			</div>
			<div class="postcomm">
				<?php if(comments_open()){ comments_template(); } ?>
			</div>
			<?php endwhile; endif; ?>
			<script type="text/javascript" src="http://china-addthis.googlecode.com/svn/trunk/addthis.js" charset="UTF-8"></script><span class="addthis_org_cn"><a href="http://addthis.org.cn/share/" i="0|1|31|2|3|4|5|28|21|22|23|11|30|27|6|7|29|71|73|74|76" title="收藏&amp;分享"><img src="http://addthis.org.cn/images/a1.gif" alt="分享家:Addthis中文版" align="absmiddle" /></a></span>
			<div class="clear"> </div>
		</div>
		<div class="maincap bottom"></div>
	</div>

<?php get_footer(); ?>
