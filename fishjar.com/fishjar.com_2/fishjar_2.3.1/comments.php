					<div id="comments">
						<h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
<?php if ( post_password_required() ) : ?>
						<p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
					</div>
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php
					wp_list_comments( array( 'callback' => 'mytheme_comment' ) );
				?>
			</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="comments-navigation">
				<div class="nav-previous"><?php previous_comments_link(); ?></div>
				<div class="nav-next"><?php next_comments_link(); ?></div>
			</div>
		<?php endif;  ?>

<?php endif; // end have_comments() ?>

<?php
$fields =  array(
	'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" size="30" /><label for="author">'. __( 'Name' ) . '</label><span class="required">*</span></p>',
	'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" size="30" /><label for="email">' . __( 'Mail' ) . '</label><span class="required">*</span></p>',
	'url'    => '<p class="comment-form-url"><input id="url" name="url" type="text" size="30" /><label for="url">' . __( 'Website' ) . '</label></p>'
); ?>

<?php comment_form( array(
	'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
	'comment_notes_after' => '',
	'comment_notes_before' => '',
	'title_reply' => '',
	'cancel_reply_link' => '',
)); ?>

					</div>
