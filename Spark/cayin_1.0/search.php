<?php get_header(); ?>

	<div id="content_right">
		<div id="content_right_top_newscenter"></div>

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>



		<?php while (have_posts()) : the_post(); ?>

			<div class="content_right_text">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div id="content_right_bottom">
			<?php previous_posts_link(__(' ', 'kubrick')) ?>
			<?php next_posts_link(__(' ', 'kubrick')) ?>
			<a id="back" href="javascript:history.go(-1);" title="Go Back"></a>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>



<?php get_footer(); ?>