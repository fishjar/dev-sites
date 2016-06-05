			<div id="con_box">
				<div class="post">
					<div class="entry">
						<ul class="pro_list_pic">
							<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
							<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(medium); ?><br /><?php the_title(); ?></a></li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
					<?php wp_pagenavi(); ?>
				</div>
			</div>