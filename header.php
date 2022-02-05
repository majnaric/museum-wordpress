<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header class="site-header">
      <div class="wrapper wrapper__header">

        <div class="site-header__menu-icon"></div>
        
        <div class="site-header__menu-content">
          <!-- <div class="site-header__btn-container">
            <a href="#" class="btn open-modal">Get In Touch</a>
          </div> -->
          <nav class="primary-nav primary-nav--pull-right">
            <ul>
              <li <?php if(is_page('/home')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url() ?>">Home</a></li>
              <li <?php if(is_page('about-us')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About</a></li>
              <li <?php if(get_post_type() == 'event') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/events') ?>">Events</a></li>
              <li <?php if(get_post_type() == 'exhibition') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/exhibition') ?>">Exhibitions</a></li>
              <li if(get_post_type() == 'department') echo 'class="current-menu-item"' ?><a href="<?php echo site_url('/departments') ?>">Departments</a></li>
              <li <?php if(is_page('privacy-policy')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/privacy-policy') ?>">Privacy Policy</a></li>
              <li <?php if(get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
            </ul>
          </nav>
          <a href="#" class="btn btn__login">Login</a>
            <a href="#" class="btn btn__sign-up">Sign Up</a>
        </div>
      
      </div>
  </header>

    