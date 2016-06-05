			<div id="con_box">
				<div class="post">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<div class="entry" id="post-<?php the_ID(); ?>">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
					</div>
					<div class="postcomm">
						<?php comments_template(); ?>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
