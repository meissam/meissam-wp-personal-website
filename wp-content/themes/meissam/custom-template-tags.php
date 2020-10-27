<?php /* Template Name: Tags */ ?>

<?php
get_header();
?>

<div class="main">
    <div class="wrapper">

        <?php 

        $categories = get_categories( array('orderby' => 'name','order'   => 'ASC'));
        
        foreach( $categories as $category ) {
            echo '<div class="each-category">'; 
            $category_link = sprintf(
                '<a href="%1$s" alt="%2$s">%3$s</a>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                esc_html( $category->name )
            );
            
            echo '<h2>' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</h2> ';
            echo '<p>' . sprintf( esc_html__( '%s', 'textdomain' ), $category->description ) . '</p>';
            // echo '<p>' . sprintf( esc_html__( 'Post Count: %s', 'textdomain' ), $category->count ) . '</p>';
            $categoryTags = new WP_Query(array('category_name' => $category->name));
    
            $eachPostTags = [];
            $tagsArray = [];
    
            if($categoryTags->have_posts()) : while($categoryTags->have_posts()) : $categoryTags->the_post(); 
               if( get_the_tags() ){
                  array_push($eachPostTags, get_the_tags());
                }
            endwhile; endif; 
            wp_reset_postdata(); 
    
            foreach ($eachPostTags as $value) {
                foreach ($value as $val) {
                  array_push($tagsArray,  $val->term_id);
              }
            }   
            echo "<ul>";
            foreach (array_unique($tagsArray) as $value) {
              echo '<li><a href="'. get_tag_link($value) .'">' . get_term( $value )->name  .'</a></li>';
            }
            echo "</ul></div>";
        } 
  
    ?>



    </div>
</div>

<?php

get_footer();