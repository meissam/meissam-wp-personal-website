
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.png' ?>">

	<?php wp_head(); ?>
</head>

<div class="lobby">
    <div class="wrapper">

      <a href="<?php echo get_home_url()?>" class="my-name" title="Meissam Rasouli">
          <img src="<?php echo get_site_icon_url()?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
          <div class="site-title"><?php echo get_bloginfo( 'name' ); ?></div>
          <?php if(get_bloginfo( 'description' )) {echo '<div class="site-tagline">'. get_bloginfo( 'description' ) .'</div>';} ?>
      </a>

      <?php wp_nav_menu( array(
            'theme_location' => 'menu-primary',
            'container' => 'nav',
            'container_class' =>'menu',
            'menu_class' => 'menu-list',
      )); ?>
      
    </div>
  </div>

  <header class="header">
  <div class="wrapper">
    <h1 class="header-title">

      <?php
          if(is_page()){
              the_field("header_tagline");
          }
          elseif(is_archive()){
            the_archive_title();
          }
          else{
             the_title();
          }
      ?>
    
    </h1>
    <div class="meta-info">
          <?php 
            if(is_page()){
               // the_field("header_tagline");
            }
            elseif(is_archive()){
            //  the_archive_title();
            }
            else{
              the_date();
               ?>
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
               <?php
            }
          ?>  
    </div>
  </div>
</header>