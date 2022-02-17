<?php
 get_header();


while(have_posts()){
the_post(); 
pageBanner();
?>


<div class="container metabox--container">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p class="meta-box--text"><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('department'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Departments</a><span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
</div>

<div class="exhibition-page--expo__description post_item">

<div class="generic-content">
    <?php the_field('main_body_content'); ?>
</div>

       
<?php

$relatedCurators = new WP_Query(array(
  'posts_per_page' => -1,
  'post_type' => 'curator',
  'orderby' => 'title',
  'order' => 'ASC',
  'meta_query' => array(
    array(
        'key' => 'related_departments',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"'
    )
  )
));

if($relatedCurators->have_posts()){
  echo '<hr>';
  echo '<h2>Curator(s)</h2>';
  echo '<ul class="department">';
while($relatedCurators->have_posts()){
$relatedCurators->the_post(); ?>
<li class="page-links">
  <a href="<?php the_permalink(); ?>">
  <div class="page-links--single-curator">
  <span class="custom-underline--single-curator custom-underline--white"><?php the_title(); ?></span>
  </div>
  <img class="curator-image" src="<?php the_post_thumbnail_url('curatorLandscape'); ?>" alt="">
</a>
</li>
  </p>


<?php }  
echo '</ul>';
}


wp_reset_postdata();

      $today = date('Ymd');
$homepageEvents = new WP_Query(array(
  'posts_per_page' => 2,
  'post_type' => 'event',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'numeric'
    ),
    array(
        'key' => 'related_departments',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"'
    )
  )
));

if($homepageEvents->have_posts()){
    echo '<h2>Upcoming ' . get_the_title() . ' Events</h2>';

while($homepageEvents->have_posts()){
$homepageEvents->the_post(); ?>

<div class="events-section__card events-section__card-medium">

<div class="row__12">
<a class="events-section__section-title page-links" href="<?php the_permalink(); ?>"><h2 class="custom-underline custom-underline--title-medium"><?php the_title(); ?></h2></a>
  
  <div class="events-section__date-and-text">
  <div class="events-section__date events-section__date-department"><p><?php 
    $eventDate = new DateTime(get_field('event_date'));
    echo $eventDate-> format('M d');
    ?></p></div>
              
    <p class="events-section__section-text events-section__section-text-department"><?php if(has_excerpt()){
      echo get_the_excerpt();
    } else {
      echo wp_trim_words(get_the_content(), 18);
    } ?></p>
  </div>
</div>
</div>
<?php }  
}

?>
        

</div>
<!-- <div class="exhibition-page--expo__photos row__6">
  <div class="exhibition-page--expo-container">

    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>
    <div class="exhibition-page--image-container"></div>   
    
  </div>

</div> -->




</div>



<?php }

get_footer();
?>