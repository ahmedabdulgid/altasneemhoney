<?php

/**
 * The template file for displaying the comments and comment form  
*/
if (post_password_required()) {
	return;
}

if ($comments) {
?>

	<div class="comments" id="comments">

		<?php
		$comments_number = absint(get_comments_number());
		?>

		<div class="comments-header">

			<h3 class="comment-reply-title title-center title-head">
				<span>
					<?php
					if (!have_comments()) {
						_e('Leave a comment');
					} elseif (1 === $comments_number) {
						/* translators: %s: Post title. */
						printf(_x('One reply', 'comments title'));
					} else {
						printf(
							/* translators: 1: Number of comments, 2: Post title. */
							_nx(
								'%1$s reply',
								'%1$s replies',
								$comments_number,
								'comments title',
								'altasneem'
							),
							number_format_i18n($comments_number)
						);
					}

					?>
				</span>
			</h3><!-- .comments-title -->

		</div><!-- .comments-header -->

		<div class="comments-inner">

			<ul class="comment-list">
				<?php
				function better_commets($comment, $args, $depth)
				{
				?>
					<li class="comment" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
						<div class="comment-container">
							<div class="comment-left">
								<div class="author-thumb">
									<?php echo get_avatar($comment, '55'); ?>
								</div>
							</div>
							<div class="comment-right">
								<div class="comment-info">
									<h5 class="comment-author"><?php echo get_comment_author() ?></h5>
									<div class="comment-date"><?php echo get_comment_date() . ' ' . __('at') . ' ' . get_comment_time();  ?></div>
								</div>
								<div class="comment-text"><?php comment_text() ?></div>
								<span class="replay">
									<?php comment_reply_link(array_merge($args, array(
										'reply_text' => get_theme_icon('images/icons/reply.svg') . __('Reply'),
										'depth'      => $depth,
										'max_depth'  => $args['max_depth']
									))); ?>
								</span>
							</div>
						</div>
					</li>

				<?php
				}

				wp_list_comments(array(
					'style'      => 'ul',
					'short_ping' => true,
					'callback' => 'better_commets',
					'max_depth'   =>  3,
					'type'        => 'comment',
				));
				?>
			</ul>

		</div><!-- .comments-inner -->

	</div><!-- comments -->

<?php
}

if (comments_open() || pings_open()) {
	$comment_cookies_1 = ' By commenting you accept the';
	$comment_cookies_2 = ' Privacy Policy';
	$comments_form_arg = array(
		'fields' => array(
			'author' => '<div class="mb-2 col-md-4"><label>' . __('Name') . ' *</label><input id="author" class="form-control" name="author" type="text" value="" size="30" />' . '</div>',
			'email'  => '<div class="mb-2 col-md-4"><label>' . __('Email') . ' *</label><input id="email" class="form-control"  name="email" type="text" value="" size="30" />' . '</div>',
			'url'  => '<div class="mb-2 col-md-4"><label>' . __('Website') . '</label><input id="url" class="form-control" name="url" type="text" value="" size="30" />' . '</div>',
			//Cookies
			'cookies' => '<div class="mb-2 col-12"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><label for="wp-comment-cookies-consent" class="wp-comment-cookies-consent">' . __('Save my name, email, and website in this browser for the next time I comment.') . '</label></div>',
		),
		'comment_notes_before' => '',
		'class_container' => 'comments-form',
		'submit_button' => '<div class="form-submit mb-2 col-12 mt-2"><button name="%1$s" type="submit" id="%2$s" value="%4$s" class="%3$s btn btn-primary">' . __('Submit') . '</button></div>',
		'comment_field' => '<div class="mb-2 col-12"><label>' . __('Comment') . ' *</label><textarea id="comment" name="comment" class="form-control" ></textarea>' . '</div>',
		'logged_in_as'         => sprintf(
			'<div class="logged-in-as mb-3 col-12">%s</div>',
			sprintf(
				/* translators: 1: Edit user link, 2: Accessibility text, 3: User name, 4: Logout URL. */
				__('<a href="%1$s" aria-label="%2$s">Logged in as %3$s</a>. <a href="%4$s">Log out?</a>'),
				get_edit_user_link(),
				/* translators: %s: User name. */
				esc_attr(sprintf(__('Logged in as %s. Edit your profile.'), $user_identity)),
				$user_identity,
				/** This filter is documented in wp-includes/link-template.php */
				wp_logout_url(apply_filters('the_permalink', get_permalink($post->ID), $post->ID))
			)
		),

		'class_form' => 'row comment-respond mb-3',
		'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title  title-center title-head"><span>',
		'title_reply_after'  => '</span></h4>',

	);
	comment_form($comments_form_arg);
 
} elseif (is_single()) {
 

?>

	<div class="comment-respond" id="respond">

		<p class="comments-closed"><?php _e('Comments are closed.'); ?></p>

	</div><!-- #respond -->

<?php
}
