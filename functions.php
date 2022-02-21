<?php

require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/login-style.php');

function museum_custom_rest(){
    register_rest_field('post', 'authorName', array(
        'get_callback' => function(){return get_the_author();}
    ));
}

add_action('rest_api_init', 'museum_custom_rest');




function pageBanner($args = NULL){


    if(!$args['title']){
        $args['title'] = get_the_title();
    }

    if(!$args['subtitle']){
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!$args['photo']) {
        if(get_field('page_banner_background_image')  AND !is_archive() AND !is_home()){
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/hero-image-large.jpg');
        }
    }
    ?>

<div class="large-hero-wrap">
        <div class="exhibitions--large-hero" style="background: linear-gradient(
      to bottom,
      rgba(255, 255, 255, 0) 0%,
      rgba(255, 255, 255, 0) 25%,
      rgba(255, 255, 255, 0.1) 50%,
      rgba(255, 255, 255, 0.3) 75%,
      rgba(255, 255, 255, 1) 100%
    ),
     url(<?php echo $args['photo']; ?>);
     background-repeat: no-repeat;
    background-size: cover;
    height: 6rem;">
            <!-- <source class="large-hero" srcset="assets/images/hero-image-large.jpg" media="(min-width: 1380px)">
            <source class="large-hero" srcset="assets/images/hero-image-medium.jpg" media="(min-width: 990px)">
            <source class="large-hero" srcset="assets/images/hero-image-small.jpg" media="(min-width: 640px)">
            <img class="large-hero" srcset="assets/images/hero-image-smaller.jpg" alt="Coastal view of oceans and mountains" class="large-hero__image"> -->
            </div>
    </div>

    <div class="exhibition-page__title">
    <h1><?php echo $args['title']; ?></h1>
</div>

<div class="wrapper news-and-blog exhibition-page__news-and-blog">

<div class="exhibition-page--expo__title"><p><?php echo $args['subtitle']; ?></p></div>

    <?php
}


function museum_files(){
    wp_enqueue_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', NULL, '1.0', true);
    wp_enqueue_script('main-museum-js', get_theme_file_uri('/bundled.js'), NULL, '1.0', true);
    wp_enqueue_script('main-museum-js', get_theme_file_uri('/scripts/App.js'));
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_style('museum_main_styles', get_stylesheet_uri());
    wp_localize_script('main-museum-js', 'museumData', array(
        'root_url' => get_site_url()
    ));
}

add_action('wp_enqueue_scripts', 'museum_files');

function museum_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('curatorLandscape', 400, 260, true);
    add_image_size('curatorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1200, 200, true);
    add_image_size('exhibitionImage', 200, 200, true);
    add_image_size('programImage', 1000, 500, true);
}

add_action('after_setup_theme', 'museum_features');


// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend(){
    $ourCurrentUser = wp_get_current_user();
    
    if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){

        wp_redirect(site_url('/'));
        exit;

    }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){
    $ourCurrentUser = wp_get_current_user();
    
    if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){

        show_admin_bar(false);

    }
}

// Customize login screen

add_filter('login_headerurl', 'ourHeaderurl');

function ourHeaderurl(){
    return esc_url(site_url('/'));
}

add_action('login_enqueue-scripts', 'ourLoginCSS');

function ourLoginCSS(){
    wp_enqueue_style('museum_main_styles', get_stylesheet_uri());
}

