<?php get_header(); ?>

<?php
	if(in_category( array( 12,13 ))){
		include(TEMPLATEPATH.'/archive1.php'); 
	}
	elseif (in_category( array( 6,7,8,9,10 ))){
		include(TEMPLATEPATH.'/archive2.php'); 
	}
?>

<?php get_footer(); ?>
