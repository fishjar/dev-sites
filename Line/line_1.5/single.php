<?php get_header(); ?>

<?php
	if(in_category('12')){
		include(TEMPLATEPATH.'/single1.php'); 
	}
	elseif (in_category(array( 6,7,8,9,10 ))){
		include(TEMPLATEPATH.'/single2.php'); 
	}
	elseif (in_category('13')){
		include(TEMPLATEPATH.'/single3.php'); 
	}
?>

<?php get_footer(); ?>
