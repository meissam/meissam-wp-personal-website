


<li id="post-<?php the_ID(); ?>" class="list-item">

        <a class="item-link" href="<?php the_permalink(); ?>">
          <span class="item-title">
		          <span class="item-main-title"><?php the_title(); ?></span>
              <ul>
                <?php 
                  $post_tags = get_the_category();
 
                  if ( $post_tags ) {
                      foreach( $post_tags as $tag ) {
                      echo "<li><a href=''>" . $tag->name . '</a></li>'; 
                      }
                  }
                ?>
              </ul>
          </span>
        </a>
		<p>
			<?php the_excerpt(); ?>
		</p>
        
</li>


