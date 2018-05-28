<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('name'); ?></title>

  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/animate.css">  
  <link rel="stylesheet" type="text/css" href="<?php bloginfo ('stylesheet_url'); ?>">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- the right font awesome link-->
    <?php wp_head(); ?>
</head>
 
<body <?php body_class('d-flex flex-column'); ?>>

    <nav class="navbar navbar-expand-lg navbar-light p-0">
      <a class="navbar-brand p-0" href="<?php echo home_url('/'); ?>">
        <?php if(has_custom_logo()) : ?>
            <?php the_custom_logo() ;?>
        <?php else : ?>
           <div class="pl-3"><i> <?php bloginfo('name') ; ?></i></div>
        <?php endif; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="item pt-3">
        <?php
          wp_nav_menu( array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
              'container'      => false,
              'depth'          => 2,
              'menu_class'     => 'navbar-nav mr-auto',
              'walker'         => new Bootstrap_NavWalker(),
              'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
          ) );
        ?>

    
          </div>
        </div>
    </nav>