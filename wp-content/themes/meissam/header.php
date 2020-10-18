
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.png' ?>">

  <!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> -->

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
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
      Talks and<br> workshops
    </h1>
  </div>
</header>