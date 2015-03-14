<?php
/**
 * The template for displaying Comments.
 */
?>
<?php if ( comments_open() ) : ?>

			<div class="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
			</div><!-- #comments -->
<?php
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php if ( have_comments() ) : ?>
			<ul class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use twentyten_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define twentyten_comment() and that will be used instead.
					 * See twentyten_comment() in twentyten/functions.php for more.
					 */
					wp_list_comments('type=comment&callback=mytheme_comment');
				?>
			</ul>
<?php endif; // end have_comments() ?>


<?php
$fields =  array(
	'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" size="30" /><label for="author">'. __( '姓名' ) . '</label><span class="required">*</span></p>',
	'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" size="30" /><label for="email">' . __( '邮箱' ) . '</label><span class="required">*</span></p>',
	'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" size="30" /><label for="url">' . __( '网址' ) . '</label></p>'
); ?>

<?php comment_form( array(
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
	'comment_notes_after' => '',
	'label_submit' => '发表留言',
	'comment_notes_before' => '',
	'title_reply' => '',
	'cancel_reply_link' => '',
)); ?>

</div><!-- #comments -->
<?php endif; // end ! comments_open() ?>
