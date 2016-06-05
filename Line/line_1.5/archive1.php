			<div id="con_box">
				<div class="post">
					<div class="entry">
						<ul class="pro_list_txt">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a> <small>(<?php the_time(__('Y-m-d')) ?>)</small></li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
					<?php wp_pagenavi(); ?>
				</div>
			</div>