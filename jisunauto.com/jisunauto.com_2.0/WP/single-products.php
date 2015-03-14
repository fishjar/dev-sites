<?php get_header(); ?>
<?php
	$term_slug = 'products';
?>
		<div id="bd" class="bd pr">
			<div class="main">
				<div class="banner"><img src="<?php echo get_xydac_info('nav',$term_slug,'nav-img'); ?>" alt="<?php echo get_cat_info($term_slug,'name'); ?>" /></div>
				<div class="cont cf">
					<div class="post fl">
						<?php while ( have_posts() ) : the_post(); ?>
						<h2><?php the_title(); ?><br /><?php echo get_field('product-number'); ?></h2>
						<div class="entry">
							<div class="section intro">
								<?php the_content(); ?>
							</div>
							<?php
								$parRows = get_field('product-parameter');
								if($parRows)
								{
									echo '<div class="section">';
										echo '<h3>主要参数</h3>';
										echo '<table>';
											foreach($parRows as $parRow)
											{
												echo '<tr><td>'. $parRow['product-parameter-name'] .'</td><td>'. $parRow['product-parameter-value'] .'</td></tr>';
											}
										echo '</table>';
									echo '</div>';
								}
							?>
							<?php
								$videoRows = get_field('product-videos');
								if($videoRows)
								{
									echo '<div class="section">';
										echo '<h3>相关视频</h3>';
										foreach($videoRows as $videoRow){
											$videoTitle = $videoRow['product-videos-title'];
											$videoUrl = $videoRow['product-videos-link'];
											echo '<div class="player">';
												echo '<video autoplay preload>';
													echo '<source type="video/mp4" src="' . $videoUrl . '" />';
												echo '</video>';
											echo '</div>';
											echo '<p class="tc">'.$videoTitle .'</p>';
										}
									echo '</div>';
								}
							?>
							<?php
								$imgRows = get_field('product-pictures');
								if($imgRows)
								{
									echo '<div class="section">';
										echo '<h3>相关图片</h3>';
										foreach($imgRows as $imgRow){
											$imgID = $imgRow['product-pictures-url'];
											$imgUrl = wp_get_attachment_image_src($imgID,'large');
											$imgUrlM = wp_get_attachment_image_src($imgID,'medium');
											echo '<p class="tc"><a href="'. $imgUrl[0] .'" class="lightimg" title="'. $imgRow['product-pictures-title'] .'"><img src="'. $imgUrlM[0] .'" alt="'. $imgRow['product-pictures-title'] .'" /><br /><span>'. $imgRow['product-pictures-title'] .'</span></a></p>';
										}
									echo '</div>';
								}
							?>
						</div>
						<?php endwhile; ?>
					</div>
					<div class="pside fr">
						<?php
							get_sidebar();
							//wp_tag_cloud( 'taxonomy'=> 'about-cat' );
							//echo $parID;
							//echo get_cat_info('pipe-end-machine','term_id');
							//echo get_category_link(get_cat_info('pipe-end-machine','term_id'));
						?>
					</div>
				</div>
			</div>
			<div class="side pa">
				<?php show_cat_nav($term_slug,'nav',true); ?>
			</div>
		</div>

<?php get_footer(); ?>
