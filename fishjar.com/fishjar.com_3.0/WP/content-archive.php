			<div class="post">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="meta"><?php the_time('F jS, Y') ?> | <?php the_category(', ') ?> | <?php the_tags('Tags: ', ', ', ' | '); ?><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></div>
			</div>