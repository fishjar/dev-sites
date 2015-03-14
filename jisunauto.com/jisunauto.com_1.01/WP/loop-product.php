<?php
/**
 * The loop that displays posts.
 */
?>
						<div class="titleimage"><img src="http://www.jisunauto.com/cn/wp-content/uploads/2010/10/topimages_02.jpg" alt="" /></div>
						<div class="postsider">
							<?php sider_box_contents("box_common_product"); ?>
							<?php sider_box_contents("box_common"); ?>
						</div>
						<div class="entry">
							<ul class="productlist">
								<?php while (have_posts()) : the_post(); ?>
								<li>
									<?php $thimage = wp_get_attachment_image_src(get_post_meta($post->ID,thumbnai_image,true)); ?>
									<div class="thumbnai"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $thimage[0] ?>" alt="<?php the_title(); ?>" /></a></div>
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
						