<?php get_header(); ?>
<?php
$term_slug = 'news';
$page_size = 15;
function get_news($psize=10,$poffset=0){
	$args = array(
		'post_type' => 'news',
		'numberposts' => $psize,
		'offset' => $poffset,
		'nav' => $_GET['nav']
	);
	$posts = get_posts( $args );
	return $posts;
}
function show_newslist($page_size){
	$page_offset = 0;
	$page_num = $_GET['page_num'];
	if($page_num>0){
		$page_offset = ($page_num - 1) * $page_size;
	}
	$posts = get_news($page_size,$page_offset);
	if (count($posts)>0) {
		echo '<ul>';
		foreach ($posts as $post) {
			//setup_postdata($post);
			echo '<li><a href="'. get_permalink($post->ID) .'" title="'. $post->post_title .'">'. $post->post_title .'</a> ('. substr($post->post_date, 0, 10) .')</li>';
		}
		echo '</ul>';
	} else {
		echo '<p>暂无内容</p>';
	}
}
function show_newspagin($page_size) {
	$all_posts = get_news('-1','0');
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
					echo '<a href="'. get_post_type_archive_link('news') . '&page_num='. $i .'" class="pagin-num">'. $i .'</a>';
				}
			}
		echo '</div>';
	} else {
		//echo $total_page;
	}
}
?>
		<div id="bd" class="bd pr">
			<div class="main">
				<div class="banner"><img src="<?php echo get_xydac_info('nav',$term_slug,'nav-img'); ?>" alt="<?php echo get_cat_info($term_slug,'name'); ?>" /></div>
				<div class="cont cf">
					<div class="post fl">
						<div class="entry">
							<?php show_newslist($page_size); ?>
						</div>
						<?php show_newspagin($page_size); ?>
					</div>
					<div class="pside fr">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
			<div class="side pa">
				<?php show_cat_nav($term_slug,'nav'); ?>
			</div>
		</div>

<?php get_footer(); ?>
