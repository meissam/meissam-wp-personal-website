


<li id="post-<?php the_ID(); ?>" class="list-item">

        <a class="item-link" href="<?php the_permalink(); ?>">
          <span class="item-title">
		          <span class="item-main-title"><?php the_title(); ?></span>
              
          </span>
        </a>
		<p>
			<?php the_excerpt(); ?>
		</p>
</li>


