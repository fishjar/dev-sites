<?php get_header(); 
$post_type = get_post_type();
$page_size = 12;
function get_list($post_type,$psize=10,$poffset=0){
	$args = array(
		'post_type' => $post_type,
		'numberposts' => $psize,
		'offset' => $poffset,
		'nav' => $_GET['nav']
	);
	$posts = get_posts( $args );
	return $posts;
}
function show_list($post_type,$page_size){
	$page_offset = 0;
	$page_num = $_GET['page_num'];
	if($page_num>0){
		$page_offset = ($page_num - 1) * $page_size;
	}
	$posts = get_list($post_type,$page_size,$page_offset);
	if (count($posts)>0) {
		if($post_type=='news'){
			echo '<div class="entry"><ul>';
			foreach ($posts as $post) {
				//setup_postdata($post);
				echo '<li><a href="'. get_permalink($post->ID) .'" title="'. $post->post_title .'">'. $post->post_title .'</a> ('. get_the_date() .')</li>';
			}
			echo '</ul></div>';
		} elseif ( $post_type=='exhibit-portfolio' || $post_type=='portable-displays' ) {
			echo '<div class="archives cf"><ul>';
			foreach ($posts as $post) {
				//setup_postdata($post);
				echo '<li><a href="'. get_permalink($post->ID) .'" title="'. $post->post_title .'"><img src="'. get_attachment_image_url($post->ID,'thumbnail') .'" alt="'. $post->post_title .'" /></a></li>';
			}
			echo '</ul></div>';

		} else {
			//
		}
	} else {
		echo '<p>暂无内容</p>';
	}
}
function show_pagin($post_type,$page_size) {
	$all_posts = get_list($post_type,'-1','0');
	$all_num = count($all_posts);
	$cur_num = 1;
	if($_GET['page_num']>1) {
		$cur_num = $_GET['page_num'];
	}
	if( $all_num % $page_size ) {                                  
		$total_page = (int)($all_num / $page_size) + 1;           
	} else {
		$total_page = $all_num / $page_size;                    
	}
	if($total_page>1){
		echo '<div class="pagin">';
			echo '<span class="pagin-all">第 '. $cur_num .' 页 / 共 '. $total_page .' 页</span>';
			for($i=1;$i<=$total_page;$i++){
				if($i==$cur_num) {
					echo '<span class="pagin-num">'. $i .'</span>';
				} else {
					echo '<a href="'. get_post_type_archive_link($post_type) . '&page_num='. $i .'" class="pagin-num">'. $i .'</a>';
				}
			}
		echo '</div>';
	} else {
		//echo $total_page;
	}
}
?>
		<div class="bdwp">
			<div class="bd ma cf">
				<?php if ( have_posts() ) : ?>
					<div class="sdr fr"></div>
					<div class="sdl fl">
						<div class="snav">
							<?php _cat_snav($post_type,'nav'); ?>
						</div>
					</div>
					<div class="cont">
						<?php show_list($post_type,$page_size); ?>
						<?php show_pagin($post_type,$page_size); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
<?php get_footer(); ?>