<?php
 get_header();


while(have_posts()){
the_post(); 
pageBanner(array(
  'title' => get_the_title(),
  'subtitle' => get_field('page_banner_subtitle')
));
?>


<!-- <div class="exhibition-page--expo__description post_item"> -->

<div class="exhibition-page--expo__content">
    
     <!-- <div class="exhibition-page--expo__description row__6"> -->
<?php the_content(); ?>
     <!-- </div> -->
</div>

<!-- </div> -->


<div class="exhibition-page--expo__photos row__6">
  <div class="exhibition-page--expo-container">

    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoOne = get_field('exhibition_photo_one'); echo $exhibitionPhotoOne['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoTwo = get_field('exhibition_photo_two'); echo $exhibitionPhotoTwo['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoThree = get_field('exhibition_photo_three'); echo $exhibitionPhotoThree['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoFour = get_field('exhibition_photo_four'); echo $exhibitionPhotoFour['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoFive = get_field('exhibition_photo_five'); echo $exhibitionPhotoFive['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoSix = get_field('exhibition_photo_six'); echo $exhibitionPhotoSix['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoSeven = get_field('exhibition_photo_seven'); echo $exhibitionPhotoSeven['sizes']['thumbnail']; ?>" alt=""></div>
    <div class="exhibition-page--image-container"><img src="<?php $exhibitionPhotoEight = get_field('exhibition_photo_eight'); echo $exhibitionPhotoEight['sizes']['thumbnail']; ?>" alt=""></div>   
    
  </div>



</div> 

<?php 


$likeCount = new WP_Query(array(
  'post_type' => 'like',
  'meta_query' => array(
    array(
      'key' => 'liked_exhibition_id',
      'compare' => '=',
      'value' => get_the_ID()
    )
  )
));

$existStatus = 'no';

if (is_user_logged_in()) {
  $existQuery = new WP_Query(array(
    'author' => get_current_user_id(),
    'post_type' => 'like',
    'meta_query' => array(
      array(
        'key' => 'liked_exhibition_id',
        'compare' => '=',
        'value' => get_the_ID()
      )
    )
  ));

  if ($existQuery->found_posts) {
    $existStatus = 'yes';
  }
}



?>

<span class="like-box" data-like="<?php echo $existQuery->posts[0]->ID; ?>" data-exhibition="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
<i class="fa fa-heart-o" aria-hidden="true"></i>
<i class="fa fa-heart" aria-hidden="true"></i>
<span class="like-count"><?php echo $likeCount->found_posts; ?></span>
</span>


</div>




<?php }

get_footer();
?>