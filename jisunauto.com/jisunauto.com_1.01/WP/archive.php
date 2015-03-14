<?php
/**
 * The template for displaying Archive pages.
 */

get_header(); ?>
<?php get_sidebar(); ?>
			<div class="container">
				<div class="content">
					<div class="post">
						<?php if (have_posts()): ?>
							<?php
								if(in_category( array( 4,5,6,7,8 ))){
									get_template_part( 'loop', 'product' ); 
								}
								else{
									get_template_part( 'loop', 'news' ); 
								}
							?>
							<?php wp_pagenavi(); ?>
						<?php else: ?>
						<h2>暂无内容！</h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
