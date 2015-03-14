<?php get_header(); ?>
<?php
$cur_term = $_GET['nav'];
$term_slug = 'products';
function show_prolist($term_slug,$cur_term){
	$args = array(
		'post_type' => $term_slug,
		'numberposts' => '-1',
		'orderby' => 'modified',
		'order' => 'DESC',
		'nav' => $cur_term
	);
	$posts = get_posts( $args );
	if (count($posts)>0) {
		echo '<ul class="prolist">';
		foreach ($posts as $post) {
			//setup_postdata($post);
			echo '<li class="cf">';
				echo '<div class="plimg"><a href="'. get_permalink($post->ID) .'"><img src="'. get_attachment_image_url($post->ID,'thumbnail') .'" alt="" /></a></div>';
				echo '<div class="pltxt">';
						echo '<h3><a href="'. get_permalink($post->ID) .'">'. $post->post_title .'</a></h3>';
						echo '<p>'. $post->post_excerpt .'</p>';
						echo '<p class="tr"><a href="'. get_permalink($post->ID) .'" class="more">详情</a></p>';
				echo '</div>';
			echo '</li>';
		}
		echo '</ul>';
	} else {
		echo '<p>暂无内容</p>';
	}
}
?>
		<div id="bd" class="bd pr">
			<div class="main">
				<div class="banner"><img src="<?php echo get_xydac_info('nav',$term_slug,'nav-img'); ?>" alt="<?php echo get_cat_info($term_slug,'name'); ?>" /></div>
				<div class="cont cf">
					<div class="post fl">
						<?php show_prolist($term_slug,$cur_term); ?>
					</div>
					<div class="pside fr">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
			<div class="side pa">
				<?php show_cat_nav($term_slug,'nav',true); ?>
			</div>
		</div>

<?php get_footer(); ?>
