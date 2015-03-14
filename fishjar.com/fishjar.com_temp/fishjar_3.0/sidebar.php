		<div class="side fr">
			<ul class="boxs">
				<li class="box">
					<h3>Categories</h3>
					<ul>
						<?php wp_list_categories('show_count=1&title_li='); ?>
					</ul>
				</li>
				<li class="box">
					<h3>Archives</h3>
					<ul>
						<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
					</ul>
				</li>
			</ul>
		</div>