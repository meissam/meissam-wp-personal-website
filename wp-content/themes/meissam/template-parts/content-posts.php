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

		<?php
		if ( 'post' === get_post_type() ) :
			?>
		<?php endif; ?>


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
	
		<ul class="post-tags">
			<?php 
				$tags = get_the_tags();
				if ( $tags ) {
					foreach( $tags as $tag ) {
					echo '<li><a href="'. get_tag_link( $tag->term_id ) .'">' . $tag->name . '</a></li>'; 
					}
				}
			?>
		</ul>

		<div class="sharing">
			<span>
				<i class="icon-share-2"></i>
			</span>
			<ul>
				<li><a class="clipboard" data-clipboard-text="<?php echo wp_get_shortlink() ?>" title="Copy to Clipboard"><i class="icon-copy"></i></a></li>
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink() ?>" title="Share on Facebook"><i class="icon-facebook"></i></a></li>
				<li><a href="https://twitter.com/intent/tweet?text=<?php echo wp_get_shortlink() ?>" title="Share on Twitter"><i class="icon-twitter"></i></a></li>
				<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo wp_get_shortlink() ?>" title="Share on Linkedin"><i class="icon-linkedin"></i></a></li>
			</ul>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
