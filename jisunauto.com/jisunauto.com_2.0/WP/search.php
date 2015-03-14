<?php get_header(); ?>
		<div id="bd" class="bd pr">
			<div class="main">
				<div class="banner"><img src="<?php echo get_xydac_info('nav','about','nav-img'); ?>" alt="<?php echo get_cat_info('about','name'); ?>" /></div>
				<div class="cont cf">
					<div class="post fl">
						<div class="entry">
							<?php if ( have_posts() ) : ?>
								<h2>搜索结果：<?php echo get_search_query(); ?></h2>
								<ul>
									<?php while ( have_posts() ) : the_post(); ?>
										<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
									<?php endwhile; ?>
								</ul>
							<?php else: ?>
								<h2>暂无搜索的内容：<?php echo get_search_query(); ?></h2>
							<?php endif; ?>
						</div>
					</div>
					<div class="pside fr">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
			<div class="side pa">
				
			</div>
		</div>

<?php get_footer(); ?>
