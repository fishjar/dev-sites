<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
			<div id="container">
				<?php get_sidebar(); ?>
				<div id="content">
					<?php if (have_posts()) : ?>
					<h2 class="pagetitle">Search Results</h2>
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					</div>
					<?php while (have_posts()) : the_post(); ?>
					<div class="post" id="post-<?php the_ID(); ?>">
						<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="meta"><small>Posted <?php the_time('F jS, Y') ?> | Posted in <?php the_category(', ') ?> | <?php the_tags('Tags: ', ', ', ' | '); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></small></div>
					</div>
					<?php endwhile; ?>
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					</div>
					<?php else : ?>
					<div class="post">
						<h2 class="center">Not Found</h2>
						<p class="center">No posts found. Try a different search?</p>
						<?php get_search_form(); ?>
					</div>
					<?php endif; ?>
				</div>
				<div class="clearer"></div>
			</div>
<?php get_footer(); ?>
