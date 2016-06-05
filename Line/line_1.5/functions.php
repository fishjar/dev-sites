<?php
add_theme_support( 'post-thumbnails' );

function get_photo_ids($photo_id){
	$photo_ids = explode(" ", $photo_id);
	return $photo_ids;
}

function globalnav_class(){
	if (is_home() || is_page('8'))
		print 'index';
	elseif (is_search())
		print 'search';
	elseif (is_page(array( 12,14,16,18 )))
		print 'about';
	elseif (is_category('5') || in_category(array( 6,7,8,9,10 )))
		print 'product';
	elseif (is_category('11') || in_category(array( 12,13 )))
		print 'news';
	elseif (is_page(array( 22,24,28,26 )))
		print 'support';
	elseif (is_page('30'))
		print 'contact';
	else
		print '';
}

?>
