


<li id="post-<?php the_ID(); ?>" class="list-item">

        <a class="item-link" href="<?php the_permalink(); ?>">
          <span class="item-title">
		          <span class="item-main-title"><?php the_title(); ?></span>
              
          </span>
        </a>
		
			<?php the_excerpt(); ?>
    
    <div class="meta-info">
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
    </div>
</li>


