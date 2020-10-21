<?php /* Template Name: Tags */ ?>    

<?php
get_header();
?>

<div class="main">
  <div class="wrapper wrapper--list" data-list-wrapper>
			<?php wp_tag_cloud(); ?>
  </div>
</div>

<?php

get_footer();
