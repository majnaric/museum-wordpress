<?php

add_action('rest_api_init', 'museumLikeRoutes');

function museumLikeRoutes () {
    register_rest_route('museum/v1', 'manageLike', array(
        'methods' => 'POST',
        'callback' => 'createLike' 
    ));

    register_rest_route('museum/v1', 'manageLike', array(
        'methods' => 'DELETE',
        'callback' => 'deleteLike'
    ));
}

function createLike ($data) {

    $exhibition = sanitize_text_field($data['exhibitionId']);

 wp_insert_post(array(
     'post_type' => 'like',
     'post_status' => 'publish',
     'post_title' => '2nd test post'
     'meta_input' => array(
         'liked_exhibition_id' => 12345
     )
 ));
}

function deleteLike () {
return 'thansk for trying to delete a like'; 
}