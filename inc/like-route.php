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

    if (is_user_logged_in()) {

        $exhibition = sanitize_text_field($data['exhibitionId']);

        $existQuery = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => 'like',
            'meta_query' => array(
              array(
                'key' => 'liked_exhibition_id',
                'compare' => '=',
                'value' => $exhibition
              )
            )
              ));

        if ($existQuery->found_posts == 0 AND get_post_type($exhibition) == 'exhibition') {
            
            return  wp_insert_post(array(
                'post_type' => 'like',
                'post_status' => 'publish',
                'post_title' => '2nd test post',
                'meta_input' => array(
                    'liked_exhibition_id' => 12345
                )
            ));

        } else {

            die("Invalid exhibition id");

        }

    } else {

        die("Only logged in users can create a like.");
    
    }


}

function deleteLike () {
  $likeId = sanitize_text_field($data['like']);
  if (get_current_user_id() == get_post_field('post_author', $likeId) AND get_post_type($likeId) == 'like') {
    wp_delete_post($likeId, true);
    return 'COngrats, like deleted';
  } else {
      die("You do not have permission to delete that.");
  }
}