<?php get_header(); ?>

			<div id="con_box">
				<div class="post">
					<div class="entry">
						<div id="rundiv">
							<div id="run1">
								<ul class="pro_list_pic">
									<?php query_posts($query_string . '&posts_per_page=6&cat=6,7,8,9,10'); ?>
									<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
									<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?><br /><?php the_title(); ?></a></li>
									<?php endwhile; endif; ?>
								</ul>
							</div>
							<div id="run2"></div>
						</div>
						<script language="JavaScript" type="text/javascript" src="<?php bloginfo('template_directory'); ?>/scrollpic.js"></script>
					</div>
				</div>
			</div>

<?php get_footer(); ?>
