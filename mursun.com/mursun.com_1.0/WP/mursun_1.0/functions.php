<?php
add_theme_support( 'post-thumbnails' );
function ArraySort(array $List, $by, $order='', $type='') {
	if (empty($List))
		return $List;
	foreach ($List as $key => $row) {
		$sortby[$key] = $row->$by;
	}
	if ($order == "DESC") {
		if ($type == "num") {
			array_multisort($sortby, SORT_DESC, SORT_NUMERIC, $List);
		} else {
			array_multisort($sortby, SORT_DESC, SORT_STRING, $List);
		}
	} else {
		if ($type == "num") {
			array_multisort($sortby, SORT_ASC, SORT_NUMERIC, $List);
		} else {
			array_multisort($sortby, SORT_ASC, SORT_STRING, $List);
		}
	}
	return $List;
}
function in_term($term_slug,$tax){
	$foo = false;
	if(is_single()){
		$terms = get_the_terms( $post->ID, $tax );
		foreach ( $terms as $term ) {
			if( $term->slug == $term_slug) {
				$foo = true;
			}
		}
	} elseif($_GET['nav']==$term_slug||$_GET['post_type']==$term_slug) {
		$foo = true;
	}
	return $foo;
}
function get_attachment_image_url($post_ID,$size){
	if ( has_post_thumbnail($post_ID)) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), $size);
		return  $image_url[0];
	}
}
function get_first_id_by_post_type($post_type){
	$args = array(
		'numberposts'     => 1,
		'orderby'         => 'menu_order',
		'order'           => 'ASC',
		'post_type'       => $post_type,
		'post_status'     => 'publish'
	);
	$posts = get_posts( $args );
	if ($posts) {
		return $posts[0] -> ID;
	} else {
		return 0;
	}
}
function get_post_type_name_by_slug($post_type){
	$obj = get_post_type_object($post_type);
	return $obj->labels->name;
}
function get_cat_info($term_slug, $field){
	$term_info = get_term_by('slug', $term_slug, 'nav');
	return $term_info->$field;
}
function _page_snav($post_type,$post_ID,$position='bd'){
	$args = array(
		'orderby'         => 'menu_order',
		'order'           => 'ASC',
		'post_type'       => $post_type,
		'nav'             => $post_type,
		'post_status'     => 'publish'
	);
	$posts = get_posts( $args );
	if($posts){
		if($position=='hd') {
			echo '<ul class="nav-ul-2">';
				foreach( $posts as $post ){
					$title = $post->post_title;
					$url = get_permalink($post->ID);
					echo '<li class="nav-li-2"><a href="'. $url .'" class="nav-a-2">'. $title .'</a></li>';
				}
			echo '</ul>';
		} elseif($position=='ft') {
			echo '<ul class="fnav-ul-2">';
				foreach( $posts as $post ){
					$title = $post->post_title;
					$url = get_permalink($post->ID);
					echo '<li class="fnav-li-2"><a href="'. $url .'" class="fnav-a-2">'. $title .'</a></li>';
				}
			echo '</ul>';
		} elseif($position=='fl') {
			echo '<ul class="links fr">';
				foreach( $posts as $post ){
					$title = $post->post_title;
					$url = get_permalink($post->ID);
					echo '<li><a href="'. $url .'">'. $title .'</a></li>';
				}
			echo '</ul>';
		} else {
			echo '<ul>';
				foreach( $posts as $post ){
					$title = $post->post_title;
					$url = get_permalink($post->ID);
					echo '<li><a href="'. $url .'" class="';
					if($post_ID==$post->ID){
						echo 'active';
					}
					echo '">'. $title .'</a></li>';
				}
			echo '</ul>';
		}
	}
}
function _cat_snav($term_slug,$tax,$position='bd'){
	$parTerm = get_term_by( 'slug', $term_slug, $tax );
	$parID = $parTerm -> term_id;
	$args = array(
		'hide_empty' => '0',
		'parent' => $parID
	);
	$terms = get_terms( $tax, $args );
	if($terms) {
		$termsNew = array();
		foreach ($terms as $term){
			$catorder =  xydac_cloud($tax,$term->slug,'nav-order');
			$term -> cat_order = $catorder;
			$termsNew[] = $term;
		}
		$termsNew = ArraySort($termsNew, 'cat_order', '', 'num');
		if($position=='hd') {
			echo '<ul class="nav-ul-2">';
				foreach ($termsNew as $term){
					$title = $term->name;
					$url = get_post_type_archive_link( $term_slug ) . '&nav=' . $term->slug;
					echo '<li class="nav-li-2"><a href="'. $url .'" class="nav-a-2">'. $title .'</a></li>';
				}
			echo '</ul>';
		} elseif($position=='ft') {
			echo '<ul class="fnav-ul-2">';
				foreach ($termsNew as $term){
					$title = $term->name;
					$url = get_post_type_archive_link( $term_slug ) . '&nav=' . $term->slug;
					echo '<li class="fnav-li-2"><a href="'. $url .'" class="fnav-a-2">'. $title .'</a></li>';
				}
			echo '</ul>';
		} else {
			echo '<ul>';
				foreach ($termsNew as $term){
					$title = $term->name;
					$url = get_post_type_archive_link( $term_slug ) . '&nav=' . $term->slug;
					echo '<li><a href="'. $url. '" class="';
						if(in_term($term->slug,'nav')){
							echo ' active';
						}
					echo '">'. $title .'</a></li>';
				}
			echo '</ul>';
		}
	}
}
function get_page_meta($key){
	$def_title = get_field('meta_title', 'options');
	$def_keywords = get_field('meta_keywords', 'options');
	$def_description = get_field('meta_description', 'options');
	if (is_single()) {
		$meta_title = get_field('meta_title');
		if($meta_title==''){
			$meta_title = get_the_title();
		}
		$meta_title = $meta_title . ' - ' . $def_title;
		$meta_keywords = get_field('meta_keywords');
		if($meta_keywords==''){
			$meta_keywords = $def_keywords;
		}
		$meta_description = get_field('meta_description');
		if($meta_description==''){
			$meta_description = $def_description;
		}
	} elseif( in_term('exhibit-portfolio','nav') || in_term('portable-displays','nav') || in_term('news','nav') ) {
		$post_type = $_GET['post_type'];
		$meta_title = get_cat_info($post_type,'name') . ' - ' . $def_title;
		$meta_keywords = xydac_cloud('nav',$post_type,'nav-keywords');
		$meta_description = get_cat_info($post_type,'description');
		if($_GET['nav']){
			$meta_title =  get_cat_info($_GET['nav'],'name') . ' - ' . $meta_title;
			$meta_keywords = xydac_cloud('nav',$_GET['nav'],'nav-keywords');
			$meta_description = get_cat_info($_GET['nav'],'description');
		}
		if($meta_keywords==''){
			$meta_keywords = $def_keywords;
		}
		if($meta_description==''){
			$meta_description = $def_description;
		}
	} else {
		$meta_title = $def_title;
		$meta_keywords = $def_keywords;
		$meta_description = $def_description;
	}
	$meta = array(
		'title'=>$meta_title,
		'keywords'=>$meta_keywords,
		'description'=>$meta_description
	);
	return $meta[$key];
}
