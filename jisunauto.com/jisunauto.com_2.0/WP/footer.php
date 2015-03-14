		<div id="ft" class="ft">
			<?php show_foot_links(); ?>
			<div class="copyr">
				<p>&copy;
					<?php
						$my_t=getdate(date("U"));
						print("$my_t[year]");
						echo '&nbsp;';
						bloginfo( 'name' );
					?>
				</p>
				<p><?php echo get_field('foot_info', 'options'); ?></p>
			</div>
		</div>
	</div>
	<!-- scripts -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slides.min.jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/flowplayer.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
	<!--[if lte IE 6]>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ie6.js"></script>
	<![endif]-->
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
	<!-- baidu Analytics -->
	<script type="text/javascript">
		var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
		document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Faa096a9bc0a1407a0503a7418231d7df' type='text/javascript'%3E%3C/script%3E"))
	</script>
	
</body>
</html>