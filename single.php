<?php
 get_header();


while(have_posts()){
the_post();
pageBanner();
?>


<div class="container metabox--container">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p class="meta-box--text"><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a><span class="metabox__main">Posted by <strong><?php the_author_posts_link(); ?></strong> on <?php the_time('j. n. y'); ?> in <strong><?php echo get_the_category_list(', '); ?></strong></span></p>
    </div>
</div>

<div class="exhibition-page--expo__description post_item">

<div class="generic-content">
    <?php the_content(); ?>
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