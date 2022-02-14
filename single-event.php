<?php
 get_header();


while(have_posts()){
the_post(); 
pageBanner();
?>


<div class="container metabox--container">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p class="meta-box--text"><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Events Home</a><span class="metabox__main"><?php the_title(); ?></span></p>
    </div>
</div>

<div class="exhibition-page--expo__description post_item">

<div class="generic-content">
    <?php the_content(); ?>
</div>

<?php 
$relatedDepartments = get_field('related_departments');

if($relatedDepartments){
    echo '<hr>';
    echo '<h2>Department(s)</h2>';
    echo '<ul class="department">';
     foreach($relatedDepartments as $department){ ?>
        
        <li class="page-links"><a class="custom-underline" href="<?php echo get_the_permalink($department); ?>"><?php echo get_the_title($department); ?></a></li>
    
    <?php } 
    echo '</ul>';
    // wp_reset_postdata();
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