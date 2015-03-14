<?php
/**
 * The template for displaying Search Results pages.
 */

get_header(); ?>
<?php get_sidebar(); ?>
			<div class="container">
				<div class="content">
					<div class="post">
						<?php if (have_posts()): ?>
							<?php get_template_part( 'loop', 'news' ); ?>
							<?php wp_pagenavi(); ?>
						<?php else: ?>
						<h2>没有相关内容，请重新搜索！</h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
