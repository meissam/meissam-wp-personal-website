


<li id="post-<?php the_ID(); ?>" class="list-item">

        <a class="item-link" href="<?php the_permalink(); ?>">
          <span class="item-title">
		          <span class="item-main-title"><?php the_title(); ?></span>
              
          </span>
        </a>
    <?php if( has_excerpt() ) {  ?>
        <div class="excerpt">
          <?php the_excerpt(); ?>
        </div>
    <?php } ?>
    <div class="meta-info">
      <div class="reading-time">
        <?php echo get_the_reading_time(get_the_content(), "min") ?>
      </div>
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


