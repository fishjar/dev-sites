<?php
/**
 * @package WordPress
 * @subpackage Fishjar_Theme
 */

get_header(); ?>
			<div id="container">
				<?php get_sidebar(); ?>
				<div id="content">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h2><?php the_title(); ?></h2>
						<div class="entry">
							<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
						</div>
					</div>
					<?php endwhile; else: ?>
					<div class="post">
						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
						<?php get_search_form(); ?>
					</div>
					<?php endif; ?>
					<?php comments_template(); ?>
				</div>
				<div class="clearer"></div>
			</div>
<?php get_footer(); ?>
