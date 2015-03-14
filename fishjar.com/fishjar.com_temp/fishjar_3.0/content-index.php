			<div class="post">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta"><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php the_tags('Tags: ', ', ', ' | '); ?><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>