<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>
<?php get_sidebar(); ?>
			<div class="container">
				<div class="content">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" class="post">
						<?php if(!get_post_meta($post->ID,hide_title,true)): ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<?php endif; ?>
						<?php if(get_post_meta($post->ID,top_image,true)): ?>
						<div class="titleimage"><?php echo wp_get_attachment_image(get_post_meta($post->ID,top_image,true),$size='large'); ?> </div>
						<?php endif; ?>
						<div class="postsider">
							<?php if(get_post_meta($post->ID,sider_box_top,true)): ?>
								<?php echo get_post_meta($post->ID,sider_box_top,true); ?>
							<?php endif; ?>
							<?php sider_box_contents("box_common_page"); ?>
							<?php if(get_post_meta($post->ID,sider_box_common,true)): ?>
								<?php sider_box_contents("box_common"); ?>
							<?php endif; ?>
							<?php if(get_post_meta($post->ID,sider_box_bottom,true)): ?>
								<?php echo get_post_meta($post->ID,sider_box_bottom,true); ?>
							<?php endif; ?>
						</div>
						<div class="entry">
							<?php the_content(); ?>
						</div>
						<?php comments_template( '', true ); ?>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
<?php get_footer(); ?>
