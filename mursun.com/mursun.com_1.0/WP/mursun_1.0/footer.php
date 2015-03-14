		<div class="ftwp">
			<div class="ft ma">
				<div class="fnav">
					<ul class="fnav-ul-1 cf">
						<li class="fnav-li-1"><a href="<?php echo get_permalink( get_first_id_by_post_type('about') ); ?>" class="fnav-a-1"><span class="fnav-span-1"><?php  echo get_post_type_name_by_slug('about'); ?></span></a>
							<?php _page_snav('about','','ft'); ?>
						</li>
						<li class="fnav-li-1"><a href="<?php echo get_post_type_archive_link('exhibit-portfolio') ?>" class="fnav-a-1"><span class="fnav-span-1"><?php  echo get_post_type_name_by_slug('exhibit-portfolio'); ?></span></a>
							<?php _cat_snav('exhibit-portfolio','nav','ft'); ?>
						</li>
						<li class="fnav-li-1"><a href="<?php echo get_post_type_archive_link('portable-displays') ?>" class="fnav-a-1"><span class="fnav-span-1"><?php  echo get_post_type_name_by_slug('portable-displays'); ?></span></a>
							<?php _cat_snav('portable-displays','nav','ft'); ?>
						</li>
						<li class="fnav-li-1"><a href="<?php echo get_permalink( get_first_id_by_post_type('exhibit-services') ); ?>" class="fnav-a-1"><span class="fnav-span-1"><?php  echo get_post_type_name_by_slug('exhibit-services'); ?></span></a>
							<?php _page_snav('exhibit-services','','ft'); ?>
						</li>
						<li class="fnav-li-1"><a href="<?php echo get_post_type_archive_link('news') ?>" class="fnav-a-1"><span class="fnav-span-1"><?php  echo get_post_type_name_by_slug('news'); ?></span></a>
							<?php _cat_snav('news','nav','ft'); ?>
						</li>
						<li class="fnav-li-1"><a href="<?php echo get_permalink( get_first_id_by_post_type('contact-us') ); ?>" class="fnav-a-1"><span class="fnav-span-1"><?php  echo get_post_type_name_by_slug('contact-us'); ?></span></a>
							<?php _page_snav('contact-us','','ft'); ?>
						</li>
					</ul>
				</div>
				<div class="ftinfo">
					<ul class="social fr">
						<li class="fl"><a href="" class="ti fl twitter">twitter</a></li>
						<li class="fl"><a href="" class="ti fl twitter">twitter</a></li>
						<li class="fl"><a href="" class="ti fl twitter">twitter</a></li>
					</ul>
					<?php _page_snav('copyright','','fl'); ?>
					<div class="copyr">
						<p>Copyright &reg;
						<?php
							$my_t=getdate(date("U"));
							print("$my_t[year]");
							bloginfo( 'name' );
						?>
						</p>
						<p><?php echo get_field('foot_info', 'options'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="" class="catdownbtn pf ti">cat down</a>
	<div class="popbg pf"></div>
	<div class="pop pf popcatdown">
		<div class="popcont"></div>
		<a href="" class="popclose">close</a>
	</div>
	<!-- scripts -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.min.jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
	<!--[if lte IE 6]>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ie6.js"></script>
	<![endif]--> 
	<!-- //scripts -->
	<!-- Google Analytics -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo get_field('google_analytics', 'options'); ?>']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</body>
</html>