<?php
get_header();

while(have_posts()){
the_post(); 
pageBanner();
?>



<div class="exhibition-page--expo__description">
  

<div class="exhibition-page--expo__description post_item">

<div class="generic-content">

  <?php get_search_form(); ?>

</div>

</div>
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