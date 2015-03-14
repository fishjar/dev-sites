<?php get_header(); ?>
<?php get_sidebar(); ?>
			<div id="content" class="clearfix">

<?php while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" class="post">
					<h2><?php the_title(); ?></h2>
					<div class="meta"><small><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php the_tags('Tags: ', ', ', ' | '); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> | <g:plusone size="small"></g:plusone></small></div>
					<div class="entry">
						<?php the_content(); ?>
					</div>
				</div>
				<?php comments_template( '', true ); ?>
<?php endwhile; ?>

			</div>
<?php get_footer(); ?>
