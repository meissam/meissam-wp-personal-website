<?php

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
	if ( have_comments() ) :
		?>

		<?php the_comments_navigation(); ?>


			<?php 
			require_once('inc/class-wp-bootstrap-comment-walker.php');

			wp_list_comments( array(
				'style'         => 'div',
				'max_depth'     => 4,
				'short_ping'    => true,
				'avatar_size'   => '50',
				'walker'        => new Bootstrap_Comment_Walker(),
			) );
			?>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'امکان درج دیدگاه وجود ندارد', 'iranads_poll' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
