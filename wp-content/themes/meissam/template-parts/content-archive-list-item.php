


<li id="post-<?php the_ID(); ?>" class="list-item">

        <a class="item-link" href="<?php the_permalink(); ?>">
          <span class="item-title">
		          <span class="item-main-title"><?php the_title(); ?></span>
              
          </span>
        </a>
		<p>
			<?php the_excerpt(); ?>
		</p>
    <div class="meta-info">
        <?php echo get_the_reading_time(get_the_content(), "min") ?>
    </div>
    <ul>
        <?php 
          $categories = get_the_category();
          if ( $categories ) {
              foreach( $categories as $category ) {
              echo '<li><a href="'. get_category_link( $category->term_id ) .'">' . $category->name . '</a></li>'; 
              }
          }
        ?>
      </ul>
</li>


