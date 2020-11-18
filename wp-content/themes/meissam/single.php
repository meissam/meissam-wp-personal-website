<?php

get_header();
?>

<div class="main">


    <?php
		while ( have_posts() ) :
			the_post();
			?>
    <div class="wrapper">
        <?php get_template_part( 'template-parts/content', 'posts' ); ?>

			
    </div>

    <?php
		

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</div>

<?php

get_footer();