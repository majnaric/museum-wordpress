<?php get_header();?>

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
    <h1>All Departments</h1>
</div>

<div class="wrapper news-and-blog exhibition-page__news-and-blog">

<div class="exhibition-page--expo__title"><p>Check out what is going on in our Museum.</p></div>

<div class="exhibition-page--expo__description">

<div class="exhibition-page--expo__description post_item">

<ul>

<?php
while(have_posts()){
the_post();?>

<li class="links"><a claass="" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

<?php } ?>

</ul>

</div>

<p class="pagination-links"><?php echo paginate_links();?></p>
</div>

</div>






<?php get_footer(); ?>