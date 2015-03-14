<?php get_header(); ?>

		<div id="bd" class="bd hbd">
			<div class="hslide pr">
<?php

if(get_field('home-slides', 'options')){
	echo '<ul class="hscont">';
	while(the_repeater_field('home-slides', 'options')){
		echo '<li><a href="' . get_sub_field('home-slides-url') . '" title="' . get_sub_field('home-slides-title') . '"><img src="' . get_sub_field('home-slides-img') . '" alt="' . get_sub_field('home-slides-title') . '" /></a></li>';
	}
	echo '</ul>';
	echo '<a href="#" class="hsnav prev" alt="向后">&lt;</a>';
	echo '<a href="#" class="hsnav next" alt="向前">&gt;</a>';
}

?>

			</div>
			<div class="hnews fr">
				<h4>新闻</h4>
				<?php show_top_news(5); ?>
				<p class="tr"><a href="<?php echo get_post_type_archive_link('news') ?>" class="more">更多</a></p>
			</div>
			<div class="hboxs cf">
				<ul>
					<li class="hbox hbox1 hboxactive"><a href="<?php echo get_permalink(get_id_by_slug('profile')); ?>">公司简介</a></li>
					<li class="hbox hbox2"><a href="<?php echo get_post_type_archive_link('products') ?>">产品介绍</a></li>
					<li class="hbox hbox3"><a href="<?php echo get_permalink(get_id_by_slug('service-policy')); ?>">服务政策</a></li>
				</ul>
			</div>
		</div>

<?php get_footer(); ?>
