<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

			<div id="con_box">
				<div class="post">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="entry" id="post-<?php the_ID(); ?>">
						<?php the_content('<p class="serif">' . __('Read the rest of this page &raquo;', 'kubrick') . '</p>'); ?>
					</div>
					<div class="postcomm">
						<?php if(comments_open()){ comments_template(); } ?>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
			
<?php get_footer(); ?>
