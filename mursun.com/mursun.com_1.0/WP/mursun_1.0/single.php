<?php get_header(); 
$post_type = get_post_type();
$post_ID = get_the_ID();
?>
		<div class="bdwp">
			<div class="bd ma cf">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if($post_type=='exhibit-portfolio' || $post_type=='portable-displays'): ?>
					<div class="folio cf">
						<div class="folio-txt fr">
							<h2><?php the_title(); ?></h2>
							<div class="entry">
								<?php the_content(); ?>
							</div>
						</div>

						<div class="folio-img fl">
							<?php
								$imgRows = get_field('show-pictures');
								$imgList = $deImgUrl = '';
								if($imgRows){
									for($i=0;$i<count($imgRows);$i++){
										$imgID = $imgRows[$i]['product-pictures-url'];
										$imgUrlM = wp_get_attachment_image_src($imgID,'medium');
										$imgUrlT = wp_get_attachment_image_src($imgID,'thumbnail');
										$imgList =  $imgList . '<a href="'. $imgUrlM[0] .'" class="';
											if($i==0){
												$imgList = $imgList . 'active';
												$deImgUrl = $imgUrlM[0];
											}
										$imgList = $imgList. '"><img src="'. $imgUrlT[0] .'" alt="" /></a>';
									}
								}
							?>
							<div class="folio-imgs"><img src="<?php echo $deImgUrl; ?>" alt="" /></div>
							<div class="folio-imgm tc">
								<?php echo $imgList; ?>
							</div>
						</div>
					</div>
				<?php elseif($post_type=='news'): ?>
					<div class="sdr fr"></div>
					<div class="sdl fl">
						<div class="snav">
							<?php _cat_snav($post_type,'nav'); ?>
						</div>
					</div>
					<div class="cont">
						<h2><?php the_title(); ?></h2>
						<div class="entry">
							<?php the_content(); ?>
						</div>
					</div>
				<?php else: ?>
					<div class="sdr fr"></div>
					<div class="sdl fl">
						<div class="snav">
							<?php _page_snav($post_type,$post_ID); ?>
						</div>
					</div>
					<div class="cont">
						<div class="entry">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</div>
<?php get_footer(); ?>