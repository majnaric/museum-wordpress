<?php
 get_header();


while(have_posts()){
the_post(); ?>

<div class="large-hero-wrap">
        <div class="exhibitions--large-hero" style="background: linear-gradient(
      to bottom,
      rgba(255, 255, 255, 0) 0%,
      rgba(255, 255, 255, 0) 25%,
      rgba(255, 255, 255, 0.1) 50%,
      rgba(255, 255, 255, 0.3) 75%,
      rgba(255, 255, 255, 1) 100%
    ),
     url(<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes']['pageBanner'] ?>);
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
    <h1><?php the_title(); ?></h1>
</div>


<div class="wrapper news-and-blog exhibition-page__news-and-blog">

<div class="exhibition-page--expo__title"><p><?php the_field('page_banner_subtitle'); ?></p></div>


<!-- <div class="exhibition-page--expo__description post_item"> -->

<!-- <div class="generic-content"> -->
    
     <div class="row__6">
<?php the_content(); ?>
     </div>
<!-- </div> -->

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




</div>




<?php }

get_footer();
?>