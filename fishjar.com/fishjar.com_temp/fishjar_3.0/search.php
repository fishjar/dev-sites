<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div class="main">
			<h2 class="archtitle">Search Resault:</h2>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'archive' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="post">
				<h2>Page not found!</h2>
			</div>
		<?php endif; ?>
		</div>
<?php get_footer(); ?>