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
            <ul class="logo--positioned-left">
              <li <?php if(is_page('home')) echo 'class="logo--is-not-visible"' ?>><a href="<?php echo site_url() ?>">IMAGINARY MUSEUM</a></li>
            </ul>
            <ul class="navBar--positioned-right">
              <li <?php 
              if(is_page('home')){ 
                echo 'class="current-menu-item"';
              }else{ 
                echo 'class="logo--is-not-visible"';
                } ?>>
              <a href="<?php echo site_url() ?>">Home</a>
            </li>
              <li <?php if(is_page('about-us')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About</a></li>
              <li <?php if(get_post_type() == 'event') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/events') ?>">Events</a></li>
              <li <?php if(get_post_type() == 'exhibition') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/exhibition') ?>">Exhibitions</a></li>
              <li <?php if(get_post_type() == 'department') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/departments') ?>">Departments</a></li>
              <li <?php if(is_page('privacy-policy')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/privacy-policy') ?>">Privacy Policy</a></li>
              <li <?php if(get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
              <li><a href="<?php echo esc_url(site_url('/search')) ?>"><i class="fa-solid fa-magnifying-glass js-search-trigger"></i></a></li>
            </ul>
          </nav>
          <?php  if(is_user_logged_in()){ ?>

            <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn__notes">My Notes</a>

            <a href="<?php echo wp_logout_url(); ?>" class="btn btn__sign-up btn--with-photo">
            <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
            <span>Log Out</span>
            </a>

          <?php } else { ?>

            <a href="<?php echo wp_login_url(); ?>" class="btn btn__login">Login</a>
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn__sign-up">Sign Up</a>
          <?php } ?>
          
        </div>
      
      </div>
  </header>

    