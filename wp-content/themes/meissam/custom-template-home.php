<?php /* Template Name: Home */ ?>    

<?php
get_header();
?>


<div class="main">
  

  <div class="wrapper wrapper--list" data-list-wrapper>
		<h2 class='pinned-header'>
			<i class="icon-pushpin"></i> Pinned Posts
		</h2>


    <ul class="list-menu" data-list-menu>
	    <?php

				$args = array (
					'post_type'			=> 'post',
					'posts_per_page'	=> -1,
					'post__in' => get_option( 'sticky_posts' ),
				);

				// The Query
				$the_query = new WP_Query( $args );

			 if ( $the_query->have_posts() ) :
				$currentYear ="";
				while ( $the_query->have_posts() ) :
					$the_query->the_post();

					if($currentYear != get_the_date( 'Y' )){
						$currentYear = get_the_date( 'Y' );
	 					echo '<li data-list-menu-item><a href="#' . $currentYear . '">' . $currentYear .'</a></li>';
					}
				
				endwhile;

			endif;
		?>
      
    </ul>


	<?php

		if ( $the_query->have_posts() ) :
		$currentYear2 ="";
		$reachEndOfList = false;
		$firstLoop = true;

		while ( $the_query->have_posts() ) :
			$the_query->the_post();


			if($currentYear2 != get_the_date( 'Y' ) && $firstLoop){
				echo '<ul class="list" data-list id="'. get_the_date( 'Y' ) .'">';
				$firstLoop = false;
				$currentYear2 = get_the_date( 'Y' );
			}
			else if($currentYear2 != get_the_date( 'Y' ) && !$firstLoop){
				echo '</ul><ul class="list" data-list id="'. get_the_date( 'Y' ) .'">';
				$currentYear2 = get_the_date( 'Y' );
			}
			
			get_template_part( 'template-parts/content', "archive-list-item" );

			
		endwhile;

		endif;
	?>
   
    
  </div>
</div>

<?php

get_footer();
