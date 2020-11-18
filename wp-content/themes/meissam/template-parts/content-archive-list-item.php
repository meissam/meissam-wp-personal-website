


<li id="post-<?php the_ID(); ?>" class="list-item">

        <a class="item-link" href="<?php the_permalink(); ?>">
          <span class="item-title">
		          <span class="item-main-title"><?php the_title(); ?></span>
              
          </span>
        </a>
        <div class="date-time">
          <span class="published-date">
            <?php echo get_the_date('j F Y', get_the_ID()); ?>
          </span>
        <span class="reading-time">
          <?php
              $content = apply_filters('the_content', get_post_field('post_content', get_the_ID()));
              echo get_the_reading_time($content, "min");
          ?>
         </span>
        </div>
    <?php if( has_excerpt() ) {  ?>
        <div class="excerpt">
          <?php the_excerpt(); ?>
        </div>
    <?php } ?>
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


