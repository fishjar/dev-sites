<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div class="main">
			<h2 class="archtitle"><?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s', '' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', '' ), get_the_date( _x( 'F Y', '', '' ) ) );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', '' ), get_the_date( _x( 'Y', '', '' ) ) );
				else :
					_e( 'Archives', '' );
				endif;
			?></h2>
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