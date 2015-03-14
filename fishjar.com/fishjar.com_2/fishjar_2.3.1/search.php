<?php get_header(); ?>
<?php get_sidebar(); ?>
			<div id="content" class="clearfix">

<?php if ( have_posts() ) : ?>
				<h3 class="page-title"><?php printf( __( 'Search Results for: &#8216; %s &#8216;', 'twentyten' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
				<?php
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2>Nothing Found</h2>
					<div class="entry">
						<p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
					</div>
				</div>
<?php endif; ?>
<?php get_footer(); ?>
