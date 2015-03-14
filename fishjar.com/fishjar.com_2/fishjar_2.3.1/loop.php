<?php if ( ! have_posts() ) : ?>
				<div class="post">
					<h2>Not Found</h2>
					<div class="entry">
						Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.
					</div>
				</div>
<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>
				<div class="post">
					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="meta"><small><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php the_tags('Tags: ', ', ', ' | '); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <g:plusone size="small"></g:plusone></small></div>
					<?php if ( ! is_search() ) : ?>
					<div class="entry">
						<?php the_content() ?>
					</div>
					<?php endif; ?>
				</div>
<?php endwhile; ?>
<?php wp_pagenavi(); ?>
