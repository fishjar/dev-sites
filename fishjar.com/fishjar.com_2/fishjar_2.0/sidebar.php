<?php
/**
 * @package WordPress
 * @subpackage Fishjar_Theme
 */
?>
				<div id="sidebar">
					<div class="side-col">
						<iframe src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlqonmsdclngp3kj372m2l3jvgmr276nl9u1ittvvqrs91qtd9p35lgj4v32eq5vnh06jjfn1216f959hvmkl484lc18ivc03pqadmc9e2peb5esrqnat5o0ti2ehi6lqg2vru5ijm9g9arksldominpckg3tsq7gl0dbinvrbfj42k8gujn3ond9u8tvqf569aqr61kcdbusmg0gs5a53g&amp;w=200&amp;h=60" allowtransparency="true" width="200" frameborder="0" height="60"></iframe><br />
						<a href="<?php echo get_option('home'); ?>/about" title="Gaby Yuan" class="gaby">Gaby Yuan</a>
						<embed src="http://www.fishjar.com/music/blogcastone_audio_player.swf?soundFile=http://www.fishjar.com/music/favourite/xinyuan.mp3&playerID=10&bg=0xeeeeee&leftbg=0x357dce&lefticon=0xFFFFFF&rightbg=0xf06a51&rightbghover=0xaf2910&righticon=0xFFFFFF&righticonhover=0xffffff&text=0x666666&slider=0x666666&track=0xFFFFFF&border=0x666666&loader=0x9FFFB8&loop=no&autostart=<?php if ( is_home()&&!is_paged() ){ echo 'yes'; } else { echo 'no'; } ?>" type="application/x-shockwave-flash" wmode="transparent" height="20" width="200"></embed>
					</div>
					<div class="side-box">
						<h3>Categories</h3>
						<ul>
							<?php wp_list_categories('show_count=1&title_li='); ?>
						</ul>
					</div>
					<div class="side-box">
						<h3>Archives</h3>
						<ul>
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
						</ul>
					</div>
					<div class="side-box">
						<h3>Recently Photos</h3>
						<script src="http://feeds.feedburner.com/RayJar?format=sigpro" type="text/javascript" ></script><noscript><p>Subscribe to RSS headline updates from: <a href="http://feeds.feedburner.com/RayJar"></a><br/>Powered by FeedBurner</p> </noscript>
						<div class="f"><a href="http://www.rayjar.com/" target="_blank">View more &raquo;</a></div>
					</div>
					<div class="side-box">
						<div class="last_fm_recent_tracks_bx">
							<style type="text/css">
								<!--
									.sp_list_itm_span { padding-left: 0.5em; }
								-->
							</style>
							<h3>Recently Tracks</h3>
							<ul id="recent_on_last_fm_itm_list"></ul>
							<script type="text/javascript">
								jQuery('#recent_on_last_fm_itm_list').lastfm({ params : { limit : 10, user : 'fishjar' } })
							</script>
							<div class="f"><a href="http://www.last.fm/user/fishjar#recentTracks" target="_blank">View more &raquo;</a></div>
						</div>
					</div>
					<div class="side-box">
						<script type="text/javascript" src="https://www.google.com/reader/ui/publisher-en.js"></script>
						<script type="text/javascript" src="https://www.google.com/reader/public/javascript/user/05165059545439511075/state/com.google/broadcast?n=10&callback=GRC_p(%7Bc%3A%22-%22%2Ct%3A%22Shared%20items%22%2Cs%3A%22false%22%2Cn%3A%22true%22%2Cb%3A%22false%22%7D)%3Bnew%20GRC"></script>
					</div>
					<div class="side-col">
						<a href="http://fusion.google.com/add?source=atgs&feedurl=http%3A//feeds.feedburner.com/GabyBlogger" target="_blank" title="Add to Google"><img src="http://buttons.googlesyndication.com/fusion/add.gif" border="0" alt="Add to Google" /></a>
					</div>
				</div>
