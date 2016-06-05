<?php get_header(); ?>

	<div id="content_right">
		<div id="content_right_top_newscenter"></div>

			<div class="content_right_text">
				<div class="content_right_text_pic" id="content_right_text_pic_company"></div>
				<div id="content_right_text_txt">
					<ul>
						<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
						<li id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a> <small>(<?php the_time(__('F jS, Y', 'kubrick')) ?>)<!-- by <?php the_author() ?> --></small></li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>

		<div id="content_right_bottom">
			<?php previous_posts_link(__(' ', 'kubrick')) ?>
			<?php next_posts_link(__(' ', 'kubrick')) ?>
			<a id="back" href="javascript:history.go(-1);" title="Go Back"></a>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>
