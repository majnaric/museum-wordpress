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


<div class="exhibition-page--expo__description post_item">

<div class="generic-content">
     <div class="curator-thumb"> 
<?php the_post_thumbnail('curatorPortait'); ?>
     </div>
     <div class="row__8">
<?php the_content(); ?>
     </div>
</div>

<?php 
$relatedDepartments = get_field('related_departments');

if($relatedDepartments){
    echo '<hr>';
    echo '<h2>Department(s)</h2>';
    echo '<ul>';
     foreach($relatedDepartments as $department){ ?>
        
        <li class="page-links"><a class="page-links__links" href="<?php echo get_the_permalink($department); ?>"><?php echo get_the_title($department); ?></a></li>

    <?php } 
    echo '</ul>';
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