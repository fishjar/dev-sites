			<div id="con_box">
				<div class="post">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<div class="entry" id="post-<?php the_ID(); ?>">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
						<div class="mag_show">
							<ul>
								<?php $photo_id = get_post_meta($post->ID, photos, true); ?>
								<?php $photo_ids = get_photo_ids($photo_id); ?>
								<?php foreach( $photo_ids as $img_id ) { ?>
									<?php $image1 = wp_get_attachment_image_src($attachment_id=$img_id, $size=medium ); $imageurl1 = $image1[0]; ?>
									<?php $image2 = wp_get_attachment_image_src($attachment_id=$img_id, $size=large ); $imageurl2 = $image2[0]; ?>
									<?php echo "<li>"; ?><a href="<?php echo $imageurl2; ?>" rel="lightbox[<?php the_ID(); ?>]" title="<?php the_title(); ?>"><img src="<?php echo $imageurl1; ?>" /></a><?php echo "</li>"; ?>
								<?php  } ?>
							</ul>
						</div>
					</div>
					<div class="postcomm">
						<?php comments_template(); ?>
					</div>
					<?php endwhile; endif; ?>
				</div>
			</div>
