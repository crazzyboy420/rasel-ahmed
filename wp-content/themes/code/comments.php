<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
	
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'twentyseventeen' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'twentyseventeen'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>
		

		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 60,
					'callback' => 'consult_comment',
					'short_ping'  => true,
					//'reply_text'  => twentyseventeen_get_svg( array( 'icon' => 'mail-reply' ) ) . __( 'Reply', 'twentyseventeen' ),
				) );
			?>
		</ul>

		<?php 
		
		the_comments_pagination( array(
			'prev_text' => '<span class="screen-reader-text">' . __( 'Before', 'twentyseventeen' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'After', 'twentyseventeen' ) . '</span>',
		) );
		
	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyseventeen' ); ?></p>
	<?php
	endif;
	
	 $commenter = wp_get_current_commenter();
        if ( ! isset( $args['format'] ) )
    $args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $html_req = ( $req ? " required='required'" : '' );
    $html5    = 'html5' === $args['format'];

    $comments_args = array(
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment">
		<textarea class="form-control" id="comment" name="comment" aria-required="true" placeholder="' . esc_attr__( "YOUR COMMENT", "text-domain" ) . '" rows="8" cols="37" wrap="hard"></textarea></p>',
		'label_submit'         => esc_html__( 'POST A COMMENT', 'themex-theme' ),
		'class_submit'         => 'submit submit-btn_ph',
		'title_reply'          => esc_html__( 'ADD COMMENT', 'themex-theme' ),
		'title_reply_before'   => '<div class="msg_form"><h5 id="reply-title" class="comment-reply-title">',
	    'title_reply_after'    => '</h5><div>',
        'cancel_reply_before'  => '',
		'cancel_reply_after'   => '',
		'cancel_reply_link'    => esc_html__( 'Cancel reply' ),
		
		'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . esc_html__( 'Your email address will not be published.', 'themex-theme' ) . '</span></p>',
		
		'fields' => apply_filters( 'comment_form_default_fields', array(


					
			'email'  => '<div class="form-padding-right">' . '<input class="form-control" id="email" name="email" placeholder="' . esc_attr__( "E-letter*", "text-domain" ) . '" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
				
	        'url'    => '<div class="form-padding-left">' . '<input class="form-control" placeholder="' . esc_attr__( "WEBSITE", "text-domain" ) . '" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' size="30" maxlength="200" /></div>',
			)
		  ),
		);
	comment_form($comments_args); 
	
	?>


</div><!-- #comments -->
