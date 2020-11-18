
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.ico' ?>">

	<?php wp_head(); ?>
</head>
<body>
<div id="vanta"></div>


<div class="lobby">
    <div class="wrapper">

      <a href="<?php echo get_home_url()?>" class="my-name" title="Meissam Rasouli">
          <img src="<?php echo get_site_icon_url()?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
          <div class="title-wrapper">
            <div class="site-title"><?php echo get_bloginfo( 'name' ); ?></div>
            <?php if(get_bloginfo( 'description' )) {echo '<div class="site-tagline">'. get_bloginfo( 'description' ) .'</div>';} ?>
          </div>
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
             
               ?>

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