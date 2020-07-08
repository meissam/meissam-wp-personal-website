<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eris
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header">
		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eris' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'eris' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	?>
</article><!-- #post-## -->
