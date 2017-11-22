<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
      <?php wp_title(''); ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  
  <!-- Start blog display -->
  <div class="wrapper">
<?php
//wp_nav_menu( array( 'theme_location' => 'primary' ) );
?>
    <!-- Header -->
    <div class="header_wrap">
      
      <header role='banner' class="site_header">
        <a href="<?php echo home_url(); ?>" class="logo"></a>
        <h1>
          <a href="<?php echo home_url(); ?>">
            <?php bloginfo('name'); ?>
          </a>
        </h1>
        <p>
          <a href="<?php echo home_url(); ?>">
            <?php bloginfo('description'); ?>
          </a>
        </p>
      </header>
    </div>
