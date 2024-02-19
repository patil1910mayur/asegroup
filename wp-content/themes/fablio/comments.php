<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Fablio
 * @since Fablio 1.0
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

	<?php if ( have_comments() ) : ?>
		
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				printf( esc_attr_x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'fablio' ), get_the_title() );
			} else {
				printf(
					_nx(
						'%1$s %2$s',
						'%1$s %2$s',
						$comments_number,
						'comments title',
						'fablio'
					),
					number_format_i18n( $comments_number ),
					esc_attr__('Comments', 'fablio')
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
					'callback'    => 'themetechmount_comment_row_template',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php fablio_comment_nav(); ?>

	<?php endif;  ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'fablio' ); ?></p>
	<?php endif; ?>
	
	<?php
	
	// To use the variables present in the above code in a custom callback function, you must first set these variables within your callback using:
	$commenter = wp_get_current_commenter();
	
	$req = get_option( 'require_name_email' );
	
	
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	if( !isset($required_text) ){ $required_text = ''; }
		
	// Comment form args
	$args = array();
	
	$args['comment_field'] = '<p class="comment-form-comment"><label class="tm-hide" for="comment">' . esc_attr_x( 'Comment', 'noun', 'fablio' ) .
    '</label><textarea id="comment" placeholder="' . esc_attr_x('Comment', 'noun', 'fablio') . '" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>';
	
	$args['comment_notes_before'] = '<p class="comment-notes">' .
    esc_attr__( 'Your email address will not be published.' , 'fablio' ) . ' ' . ( $req ? $required_text : '' ) .
    '</p>';
	
	$args['comment_notes_after'] = '<p class="form-allowed-tags tm-hide">' .
    sprintf(
		esc_attr__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'fablio' ),
		' <code>' . allowed_tags() . '</code>'
    ) . '</p>';
	
	// Submit button class
	$args['class_submit'] = 'submit tm-vc_general tm-vc_btn3 tm-vc_btn3-size-md tm-vc_btn3-shape-square tm-vc_btn3-style-flat tm-vc_btn3-color-skincolor';
	
	
	$args['fields'] = array(

	  'author' =>
		'<p class="comment-form-author"><label class="tm-hide" for="author">' . esc_attr__( 'Name', 'fablio' ) . '</label> ' .
		( $req ? '<span class="required tm-hide">*</span>' : '' ) .
		'<input id="author" placeholder="' . esc_attr__('Name','fablio') . ( $req ? ' (required)' : '' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'email' =>
		'<p class="comment-form-email"><label class="tm-hide" for="email">' . esc_attr__( 'Email', 'fablio' ) . '</label> ' .
		( $req ? '<span class="required tm-hide">*</span>' : '' ) .
		'<input id="email" placeholder="' . esc_attr__('Email','fablio') . ( $req ? ' (required)' : '' ) . '" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' /></p>',

	  'url' =>
		'<p class="comment-form-url"><label class="tm-hide" for="url">' . esc_attr__( 'Website', 'fablio' ) . '</label>' .
		'<input id="url" placeholder="' . esc_attr__('Website','fablio') . '" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" /></p>',
	);
	
	comment_form($args); ?>

</div><!-- .comments-area -->
