<?php
/**
 * Jisun Automation functions and definitions
 *
 */
automatic_feed_links();

function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><small><?php printf(get_comment_date()) ?></small></a></div>
		<div class="comment-author"><?php printf(get_comment_author_link()) ?></div>
		<div class="comment-text"><?php comment_text() ?></div>
	</li>
<?php
}

function sider_box_contents($content){
	$showcode =  get_post_meta(224, $content, true);
	print $showcode;
}

?>
