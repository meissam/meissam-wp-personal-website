<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package meissam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php echo get_the_reading_time(get_post_field('post_content', the_ID())), "min") ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'meissam-wp-theme' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<ul>
			<?php 
				$tags = get_the_tags();
				if ( $tags ) {
					foreach( $tags as $tag ) {
					echo '<li><a href="'. get_tag_link( $tag->term_id ) .'">' . $tag->name . '</a></li>'; 
					}
				}
			?>
		</ul>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
