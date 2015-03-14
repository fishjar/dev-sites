<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div class="main">
			<h2 class="archtitle"><?php printf( __( 'Search Results for: %s', '' ), get_search_query() ); ?></h2>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'archive' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<div class="post">
				<h2>Page not found!</h2>
			</div>
		<?php endif; ?>
		<?php wp_pagenavi(); ?>
		</div>
<?php get_footer(); ?>