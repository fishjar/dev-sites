<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div class="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="post">
				<h2><?php the_title(); ?></h2>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
<?php get_footer(); ?>