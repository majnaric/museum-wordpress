<?php

function museum_files(){
    wp_enqueue_script('main-museum-js', get_theme_file_uri('/bundled.js'), NULL, '1.0', true);
    wp_enqueue_script('main-museum-js', get_theme_file_uri('/scripts/App.js'));
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_style('museum_main_styles', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'museum_files');

function museum_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('curatorLandscape', 400, 260, true);
    add_image_size('curatorPortrait', 480, 650, true);
    add_image_size('pageBanner', 200, 1200, true);
    add_image_size('exhibitionImage', 200, 200, true);
}

add_action('after_setup_theme', 'museum_features');