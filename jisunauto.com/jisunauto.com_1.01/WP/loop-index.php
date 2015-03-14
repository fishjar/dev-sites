<?php
/**
 * The loop that displays posts.
 */
?>
					<?php query_posts($query_string . '&posts_per_page=5&cat=4,5,6,7,8,10,11,17'); ?>
					<?php if (have_posts()) :  ?>
					<?php while (have_posts()) : the_post(); ?>
					<li><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<?php else: ?>
					<li>暂无内容！</li>
					<?php endif; ?>
