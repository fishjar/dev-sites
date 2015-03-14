<?php get_header(); ?>
<?php
	$term_slug = 'contact';
?>
		<div id="bd" class="bd pr">
			<div class="main">
				<div class="banner"><img src="<?php echo get_xydac_info('nav',$term_slug,'nav-img'); ?>" alt="<?php echo get_cat_info($term_slug,'name'); ?>" /></div>
				<div class="cont cf">
					<div class="post fl">
						<?php while ( have_posts() ) : the_post(); ?>
						<div class="entry">
							<?php the_content(); ?>
						</div>
						<?php endwhile; ?>
					</div>
					<div class="pside fr">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
			<div class="side pa">
				<?php show_page_nav($term_slug,get_the_ID()); ?>
			</div>
		</div>

<?php get_footer(); ?>
