<?php

function museumRegisterSearch (){
    register_rest_route('museum/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'museumSearchResults'
    ));
}

function museumSearchResults($data){
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'curator', 'department', 'exhibition', 'event'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'generalInfo' => array(),
        'curators' => array(),
        'departments' => array(),
        'events' => array(),
        'exhibitions' => array()
    );

    while($mainQuery->have_posts()){
$mainQuery->the_post();

if(get_post_type() == 'post' OR get_post_type() == 'page'){

    array_push($results['generalInfo'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
    ));
}

if(get_post_type() == 'curator'){

    array_push($results['curators'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'image' => get_the_post_thumbnail_url(0, 'curatorLandscape')
    ));
}


if(get_post_type() == 'department'){

    array_push($results['departments'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'id' => get_the_id()
    ));
}


if(get_post_type() == 'exhibition'){

    array_push($results['exhibitions'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
    ));
}


if(get_post_type() == 'event'){

    $eventDate = new DateTime(get_field('event_date'));
    $description = null;
    
    if(has_excerpt()){
    $description =  get_the_excerpt();
    } else {
    $description =  wp_trim_words(get_the_content(), 18);
    }
    


    array_push($results['events'], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'date' => $eventDate-> format('d M'),
        'description' => $description
    ));
}
    }

    if($results['departments']){
        $departmentMetaQuery = array('relation' => 'OR');

        foreach($results['departments'] as $item){
            array_push($departmentMetaQuery,  array(
                'key' => 'related_departments',
                'compare' => 'LIKE',
                'value' => '"' . $item['id'] . '"'
            ));
        }
    
        $departmentRelationshipQuery = new WP_Query(array(
            'post_type' => array('curator', 'event', 'exhibition'),
            'meta_query' => $departmentMetaQuery
                ));
    
                while($departmentRelationshipQuery->have_posts()){
                    $departmentRelationshipQuery->the_post();

                    if(get_post_type() == 'exhibition'){

                        array_push($results['exhibitions'], array(
                            'title' => get_the_title(),
                            'permalink' => get_the_permalink()
                        ));
                    }
    

                    if(get_post_type() == 'exhibition'){

                        $eventDate = new DateTime(get_field('event_date'));
                        $description = null;
                        
                        if(has_excerpt()){
                        $description =  get_the_excerpt();
                        } else {
                        $description =  wp_trim_words(get_the_content(), 18);
                        }
                        
                    
                    
                        array_push($results['events'], array(
                            'title' => get_the_title(),
                            'permalink' => get_the_permalink(),
                            'date' => $eventDate-> format('d M'),
                            'description' => $description
                        ));
                    }
    
                    if(get_post_type() == 'curator'){
    
                        array_push($results['curators'], array(
                            'title' => get_the_title(),
                            'permalink' => get_the_permalink(),
                            'image' => get_the_post_thumbnail_url(0, 'curatorLandscape')
                        ));
                    }
    
                }
    
                $results['curators'] = array_values(array_unique($results['curators'], SORT_REGULAR));
                $results['events'] = array_values(array_unique($results['events'], SORT_REGULAR));
                $results['exhibitions'] = array_values(array_unique($results['exhibitions'], SORT_REGULAR));
    }

   

    return $results;
}

add_action('rest_api_init', 'museumRegisterSearch');