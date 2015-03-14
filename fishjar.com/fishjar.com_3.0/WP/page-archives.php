<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div class="main">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="post">
				<h2><?php the_title(); ?></h2>
				<div class="entry">
					<ul class="years">
						<?php
						$all_posts = get_posts(array(
							'posts_per_page' => -1 // to show all posts
						));

						// this variable will contain all the posts in a associative array
						// with three levels, for every year, month and posts.

						$ordered_posts = array();

						foreach ($all_posts as $single) {
							$year  = mysql2date('Y', $single->post_date);
							$month = mysql2date('F', $single->post_date);
							// specifies the position of the current post
							$ordered_posts[$year][$month][] = $single;
						}

						// iterates the years
						foreach ($ordered_posts as $year => $months) { ?>
							<li>
								<h3><?php echo $year ?></h3>
								<ul class="months">
									<?php foreach ($months as $month => $posts ) { // iterates the moths ?>
									<li>
										<h4><?php printf("%s (%d)", $month, count($months[$month])) ?></h4>

										<ul class="posts">
											<?php foreach ($posts as $single ) { // iterates the posts ?>
											<li><?php 
												echo mysql2date('d', $single->post_date);
												$categories = get_the_category($single->ID);
												$separator = '.';
												$output = '';
												if($categories){
													foreach($categories as $category) {
														$output .= $category->cat_name.$separator;
													}
													echo ' ['.trim($output, $separator).'] ';
												}
											?><a href="<?php echo get_permalink($single->ID); ?>"><?php echo get_the_title($single->ID); ?></a>  (<?php echo $single->comment_count ?>)</li>
											<?php } // ends foreach $posts ?>
										</ul> <!-- ul.posts -->
									</li>
									<?php } // ends foreach for $months ?>
								</ul> <!-- ul.months -->
							</li>
						<?php } // ends foreach for $ordered_posts ?>
					</ul><!-- ul.years -->
				</div>
			</div>
			<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
<?php get_footer(); ?>