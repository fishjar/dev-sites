<?php get_header(); ?>
		<div class="bdwp">
			<div class="bd ma cf">
				<div class="hslide">
<?php

if(get_field('home-slides', 'options')){
	echo '<ul class="hslide-ul">';
	while(the_repeater_field('home-slides', 'options')){
		echo '<li class="hslide-li"><a href="' . get_sub_field('home-slides-url') . '" title="' . get_sub_field('home-slides-title') . '"><img src="' . get_sub_field('home-slides-img') . '" alt="' . get_sub_field('home-slides-title') . '" /></a></li>';
	}
	echo '</ul>';
}
 
?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>