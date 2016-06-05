	<div id="container">
		<div class="maincap top"></div>
		<div class="grid2col">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="postheard"><h2><?php the_title(); ?></h2></div>
			<div class="column">
				<div class="pro_img first"><?php the_post_thumbnail('medium'); ?></div>
				<div class="pro_img more">
					<ul>
						<?php $photo_id = get_post_meta($post->ID, photos, true); ?>
						<?php $photo_ids = get_photo_ids($photo_id); ?>
						<?php foreach( $photo_ids as $img_id ) { ?>
							<?php $image1 = wp_get_attachment_image_src($attachment_id=$img_id, $size=thumbnail ); $imageurl1 = $image1[0]; ?>
							<?php $image2 = wp_get_attachment_image_src($attachment_id=$img_id, $size=large ); $imageurl2 = $image2[0]; ?>
							<?php echo "<li>"; ?><a href="<?php echo $imageurl2; ?>" rel="lightbox[<?php the_ID(); ?>]" title="<?php the_title(); ?>"><img src="<?php echo $imageurl1; ?>" /></a><?php echo "</li>"; ?>
						<?php  } ?>
					</ul>
				</div>
				<script type="text/javascript" src="http://china-addthis.googlecode.com/svn/trunk/addthis.js" charset="UTF-8"></script><span class="addthis_org_cn"><a href="http://addthis.org.cn/share/" i="0|1|31|2|3|4|5|28|21|22|23|11|30|27|6|7|29|71|73|74|76" title="收藏&amp;分享"><img src="http://addthis.org.cn/images/a1.gif" alt="分享家:Addthis中文版" align="absmiddle" /></a></span>
			</div>
			<div class="column">
				<div class="box">
					<h3>特征描述</h3>
					<ul>
						<?php echo get_post_meta($post->ID, character, true); ?>
					</ul>
				</div>
				<div class="box">
					<h3>技术参数</h3>
					<ul>
						<?php echo get_post_meta($post->ID, specifications, true); ?>
					</ul>
				</div>
				<div class="box">
					<?php comments_template(); ?>
				</div>
			</div>
			<?php endwhile; endif; ?>
			<div class="clear"> </div>  
		</div>
		<div class="maincap bottom"></div>
	</div>