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
function get_id_by_slug($page_name){
	global $wpdb;
	$page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
	return $page_name_id;
}
function get_cat_id_by_slug($cat_slug){
	$idObj = get_category_by_slug($cat_slug); 
	$id = $idObj->term_id;
	return $id;
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
function show_top_news($num){
	$args = array(
		'numberposts'     => $num,
		/* 'orderby'         => 'menu_order',
		'order'           => 'ASC', */
		'post_type'       => 'news',
		'meta_key'        => 'post_if_top',
		'meta_value'      => '1'
	);
	$topnews = get_posts( $args );
	if($topnews){
		echo '<ul>';
			foreach( $topnews as $news ) :
			$title = $news->post_title;
			$url = get_permalink($news->ID);
			echo '<li><a href="'.$url.'" title="'.$title.'">'.$title.'</a></li>';
			endforeach;
		echo '</ul>';
	} else {
		echo '<ul><li>暂无内容。。</li></ul>';
	}
}
function show_page_nav($term_slug,$post_ID = '-1'){
	$args = array(
		'orderby'         => 'menu_order',
		'order'           => 'ASC',
		'post_type'       => $term_slug,
		'nav'             => $term_slug,
		'post_status'     => 'publish',
		'numberposts'     => 100
	);
	$posts = get_posts( $args );
	if($posts){
		if($post_ID=='-1') {
			echo '<ul class="nu2">';
				foreach( $posts as $post ){
					$title = $post->post_title;
					$url = get_permalink($post->ID);
					echo '<li class="nl2"><a href="'. $url .'" class="na2">'. $title .'</a></li>';
				}
			echo '</ul>';
		} else {
			echo '<ul class="snu1">';
				foreach( $posts as $post ){
					$title = $post->post_title;
					$url = get_permalink($post->ID);
					echo '<li class="snl1"><a href="'.$url.'" class="sna1';
						if($post->ID == $post_ID){
							echo ' sna1active';
						}
					echo '" title="'.$title.'">'.$title.'</a></li>';
				}
			echo '</ul>';
		}
	}
}
function show_foot_links(){
	$args = array(
		'orderby'         => 'menu_order',
		'order'           => 'ASC',
		'post_type'       => 'copyright',
		'nav'             => 'copyright',
		'post_status'     => 'publish',
		'numberposts'     => 100
	);
	$posts = get_posts( $args );
	if($posts){
		echo '<ul class="links fr">';
			foreach( $posts as $post ){
				$title = $post->post_title;
				$url = get_permalink($post->ID);
				echo '<li><a href="'. $url .'">'. $title .'</a></li>';
			}
		echo '</ul>';
	}
}
function show_cat_nav($term_slug, $tax, $showSub = false, $position = 'bd'){
	$parTerm = get_term_by( 'slug', $term_slug, $tax );
	//$parID = get_cat_id_by_slug($term_slug);
	$parID = $parTerm -> term_id;
	$args = array(
		'hide_empty' => '0',
		'parent' => $parID
	);
	$terms = get_terms( $tax, $args );
	if ($terms) {
		$termsNew = array();
		foreach ($terms as $term){
			$catorder =  xydac_cloud($tax,$term->slug,'nav-order');
			$term -> cat_order = $catorder;
			$termsNew[] = $term;
		}
		$termsNew = ArraySort($termsNew, 'cat_order', '', 'num');
		if($position=='hd') {
			echo '<ul class="nu2">';
				foreach ($termsNew as $term){
					$title = $term->name;
					$url = get_post_type_archive_link( $term_slug ) . '&nav=' . $term->slug;
					echo '<li class="nl2"><a href="'. $url .'" class="na2">'. $title .'</a>';
						if($showSub){
							get_nav_posts($term->slug,$term_slug,$position);
						}
					echo '</li>';
				}
			echo '</ul>';
		} else {
			echo '<ul class="snu1">';
				foreach ($termsNew as $term){
					setup_postdata($post);
					$title = $term->name;
					//$url = get_term_link($term->slug, $tax);
					$url = get_post_type_archive_link( $term_slug ) . '&nav=' . $term->slug;
					echo '<li class="snl1';
						if($showSub){
							echo ' snl1open';
						}
					echo '"><a href="'.$url.'" class="sna1';
						//if(is_tax( 'nav', $term->slug)||in_term($term->slug,'nav')){
						if(in_term($term->slug,'nav')){
							echo ' sna1active';
						}
					echo '" title="'. $title .'">'. $title .'</a>';
						if($showSub){
							get_nav_posts($term->slug,$term_slug,$position);
						}
					echo '</li>';
				}
			echo '</ul>';
		}
	}
}
function get_nav_posts($term_slug,$post_type,$position){
	$args = array(
		'post_type' => $post_type,
		'nav' => $term_slug,
		'numberposts' => 100
	);
	$posts = get_posts( $args );
	if ($posts) {
		if($position=='hd') {
			echo '<ul class="nu3">';
				foreach ($posts as $post) {
					echo '<li class="nl3"><a href="'.get_permalink($post->ID).'" class="na3">'.$post->post_title.'</a></li>';
				}
			echo '</ul>';
		} else {
			echo '<ul class="snu2">';
			foreach ($posts as $post) {
				//setup_postdata($post);
				echo '<li class="snl2">';
					echo '<a href="'.get_permalink($post->ID).'" class="sna2';
						if(is_single() && ($post->ID==get_the_ID())){
							echo ' sna2active';
						}
					echo '">'.$post->post_title.'</a>';
				echo '</li>';
			}
			echo '</ul>';
		}
	}
}
function get_xydac_info($tax,$term,$field){
	$cat_info =  xydac_cloud($tax,$term,$field);
	if(count($cat_info)>0){
		return $cat_info;
	} else {
		return xydac_cloud($tax,'about',$field);
	}
}
function get_cat_info($term_slug, $field){
	$term_info = get_term_by('slug', $term_slug, 'nav');
	return $term_info->$field;
}
function get_post_type_name_by_slug($post_type){
	$obj = get_post_type_object($post_type);
	return $obj->labels->name;
}

function get_page_meta($key){
	/* $def_title = get_bloginfo('name');
	$def_keywords = xydac_cloud('nav','about','nav-keywords');
	$def_description = get_bloginfo('description'); */
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
	} elseif(in_term('products','nav')||in_term('news','nav')) {
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
