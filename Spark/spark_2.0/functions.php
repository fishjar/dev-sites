<?php
/**
 * @package WordPress
 * @subpackage Spark
 */
automatic_feed_links();

add_theme_support( 'post-thumbnails' );

function thumb_picture_url($url) {
	$count = strrpos($url, '.');
	print substr($url, 0, $count).'-150x150.jpg';
}

function get_photo_ids($photo_id){
	$photo_ids = explode(" ", $photo_id);
	return $photo_ids;
}

function globalnav_class(){
	if (is_home())
		print 'home';
	elseif (is_search())
		print 'search';
	elseif (is_category('3') || in_category( array( 4,5 ) ))
		print 'news';
	elseif (is_category('6') || in_category( array( 7,8,9,10,11,12 )))
		print 'product';
	elseif (in_category('14') || is_page(array( 16,18 )))
		print 'sales';
	elseif (in_category('16') || is_page('21'))
		print 'support';
	elseif (is_page(array( 24,26 )))
		print 'download';
	elseif (is_page(array( 3,5,8,10,12 )))
		print 'about';
	elseif (is_page('28'))
		print 'contact';
	elseif (is_page('29'))
		print 'sitemap';
	else
		print '';
}

function get_col($postid, $gettype){
	$value = get_post_meta($postid, $gettype, true);
	return $value;
}

function index_col($postid, $colnum){
	$title_url = get_col($postid, 'index-title-url');
	$col_url = get_col($postid, 'index-col-url');
	$col_txt = get_col($postid, 'index-col-txt');
	$post_id = get_post($postid); 
	$col_title = $post_id->post_title;
	switch ($colnum){
		case 1:
			$pic_url =  'images/route-spark.jpg'; break;
		case 2:
			$pic_url =  'images/route-product.jpg'; break;
		case 3:
			$pic_url =  'images/route-client.jpg'; break;
		case 4:
			$pic_url =  'images/route-hifi.jpg'; break;
		default:
			$pic_url =  'images/route-spark.jpg';
	}
	print '<h3><a href="'.$title_url.'">'.$col_title.'</a></h3>';
	print '<p>'.$col_txt.'</p>';
	print '<a title="" class="more" href="'.$col_url.'">了解更多</a>';
	print  '<a href="'.$col_url.'"><img alt="" src="http://www.sparkaudio.com/cn2/wp-content/themes/spark2/'.$pic_url.'" /></a>';
}



?>