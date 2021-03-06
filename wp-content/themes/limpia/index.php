<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Eris
 */

get_header();

$paging_type = get_theme_mod( 'paging_setting', 'infinite-scroll' );

?>

<div class="container container-medium">

	<div id="primary" class="content-area listing">
		<main id="main" class="site-main" role="main">

        <?php 
            	$args = array(
					'category__not_in' => '27',
				); 
				$loop = new WP_Query($args);
       
        ?>



		<?php if (  $loop->have_posts() ) {

				if ( is_home() && ! is_front_page() ) { ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>

			<?php } ?>

			<div id="post-load">

			<?php

				/* Start the Loop */
				while ( $loop->have_posts()) : $loop->the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'templates/template-parts/content', get_post_format() );

				endwhile;

			?>

			</div>
			<!-- #post-load -->

			<?php

				eris_pagination();

			} else {

				get_template_part( 'templates/template-parts/content', 'none' );

			}

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .container -->

<?php get_footer(); ?>
