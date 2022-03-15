<?php
 get_header();


while(have_posts()){
the_post(); 
pageBanner();
?>



<div class="exhibition-page__title">
    
</div>


<!-- <div class="wrapper news-and-blog exhibition-page__news-and-blog"> -->

<div class="exhibition-page--expo__title"><p><?php the_field('page_banner_subtitle'); ?></p></div>


<div class="exhibition-page--expo__description post_item">

<div class="generic-content">
     <div class="curator-thumb"> 
<?php the_post_thumbnail('curatorPortrait'); ?>
     </div>
     <div class="row__8 content--curator-content">
  <p class=""><?php the_content(); ?></p>
     </div>
</div>

<?php 
$relatedDepartments = get_field('related_departments');

if($relatedDepartments){
    echo '<hr class="section-break--curator-department">';
    echo '<h2>Department(s)</h2>';
    echo '<ul class="department">';
     foreach($relatedDepartments as $department){ ?>
        
        <li class="page-links"><a class="custom-underline" href="<?php echo get_the_permalink($department); ?>"><?php echo get_the_title($department); ?></a></li>

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