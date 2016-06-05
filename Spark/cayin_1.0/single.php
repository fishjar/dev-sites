<?php get_header(); ?>

	<div id="content_right">
		<div id="content_right_top_newscenter"></div>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="content_right_text" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<div class="post_time"><small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small></div>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
		<div id="content_right_bottom">
			<?php next_post_link('%link') ?>
			<?php previous_post_link('%link') ?>
			<a id="back" href="javascript:history.go(-1);" title="Go Back"></a>
		</div>

	</div>

<?php get_footer(); ?>
