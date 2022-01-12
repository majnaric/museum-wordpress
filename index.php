<?php get_header();?>

<div class="large-hero-wrap">
        <div class="exhibitions--large-hero">
            <!-- <source class="large-hero" srcset="assets/images/hero-image-large.jpg" media="(min-width: 1380px)">
            <source class="large-hero" srcset="assets/images/hero-image-medium.jpg" media="(min-width: 990px)">
            <source class="large-hero" srcset="assets/images/hero-image-small.jpg" media="(min-width: 640px)">
            <img class="large-hero" srcset="assets/images/hero-image-smaller.jpg" alt="Coastal view of oceans and mountains" class="large-hero__image"> -->
            </div>
    </div>
    <div class="exhibition-page__title">
    <h1>Welcome to our Blog!</h1>
</div>

<div class="wrapper news-and-blog exhibition-page__news-and-blog">

<div class="exhibition-page--expo__title"><p>Keep up with our latest news.</p></div>

<div class="exhibition-page--expo__description">
<?php
while(have_posts()){
the_post();?>
<div class="post_item">
  <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<div class="meta-box">
<p class="meta-box--text">Posted by <strong><?php the_author_posts_link(); ?></strong> on <?php the_time('j. n. y'); ?> in <strong><?php echo get_the_category_list(', '); ?></strong></p>
</div>

<div class="generic-content">
  <?php the_excerpt(); ?>
<p class="btn btn--post"><a href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
</div>
</div>

<?php } ?>

<p class="pagination-links"><?php echo paginate_links();?></p>
</div>

</div>






<?php get_footer(); ?>