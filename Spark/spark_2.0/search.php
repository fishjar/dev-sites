<?php get_header(); ?>

	<div id="container">
		<div class="maincap top"></div>
		<div class="grid1col">
			<div class="postctent <?php globalnav_class(); ?>">
				<div class="postleft"> </div>
				<div class="postright">
					<ul>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<li><a href="<?php the_permalink() ?>" title=""><?php the_title(); ?></a></li>
						<?php endwhile; endif; ?>
					</ul>
				</div>
				<?php wp_pagenavi(); ?>
			</div>
			<div class="clear"> </div>
		</div>
		<div class="maincap bottom"></div>
	</div>

<?php get_footer(); ?>
