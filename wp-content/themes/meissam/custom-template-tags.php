<?php /* Template Name: Tags */ ?>    

<?php
get_header();
?>

<div class="main">
  <div class="wrapper wrapper--list" data-list-wrapper>
     <?php $args = array(
        'smallest'                  => 14, 
        'largest'                   => 22,
        'unit'                      => 'pt', 
        'number'                    => 200,  
        'format'                    => 'flat',
        'separator'                 => "\n",
        'orderby'                   => 'name', 
        'order'                     => 'RAND',
        'exclude'                   => null, 
        'include'                   => null, 
        'link'                      => 'view', 
        'taxonomy'                  => 'post_tag', 
        'echo'                      => true,
        'show_count'                  => 1,
        'child_of'                  => null, // see Note!
      ); ?>
			<?php wp_tag_cloud($args); ?>
  </div>
</div>

<?php

get_footer();
