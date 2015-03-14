<?php get_header(); ?>
<?php if ( ! is_search() ) : ?>
<?php get_sidebar(); ?>
<?php endif; ?>
			<div id="content" class="clearfix">
<?php get_template_part( 'loop', 'index' ); ?>
			</div>
<?php get_footer(); ?>
