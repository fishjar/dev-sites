<?php
if(get_field('side_box', 'options')){
	while(the_repeater_field('side_box', 'options')){
		echo '<div class="ssec sbox">';
		echo get_sub_field('side_box_cont');
		echo '</div>';
	}
}
?>