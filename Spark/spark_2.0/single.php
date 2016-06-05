<?php get_header(); ?>

<?php
	if(in_category( array( 4,5,14,16 ))){
		include(TEMPLATEPATH.'/single1.php'); 
	}
	elseif (in_category( array( 7,8,9,10,11,12 ))){
		include(TEMPLATEPATH.'/single2.php'); 
	}
?>

<?php get_footer(); ?>
