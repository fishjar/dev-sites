<?php
/**
 * The loop that displays posts.
 */
?>
						<div class="titleimage"><img src="http://www.jisunauto.com/cn/wp-content/uploads/2010/10/topimages_05.jpg" alt="" /></div>
						<div class="postsider">
							<?php sider_box_contents("box_common_news"); ?>
							<?php sider_box_contents("box_common"); ?>
						</div>
						<div class="entry">
							<ul class="productlist newslist">
								<?php while (have_posts()) : the_post(); ?>
								<li>
									<div class="summary">
										<h4><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
										<?php if(get_post_meta($post->ID,summary_text,true)): ?>
										<p><?php echo get_post_meta($post->ID,summary_text,true); ?></p>
										<?php endif; ?>
										<p><a href="<?php the_permalink() ?>" class="more" title="查看详细信息">详情</a></p>
									</div>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
