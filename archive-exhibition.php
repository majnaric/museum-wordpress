<?php get_header();
pageBanner(array(
  'title' => 'Exhibitions on display',
  'subtitle' => 'We have incredible Exhibitions. Take a look.'
));
?>


<div class="exhibition-page--expo__description">

<div class="exhibition-page--expo__description post_item">
<?php
while(have_posts()){
the_post();?>


<div class="events-section__card events-section__card-medium events-section__card-medium--archive-events">

<div class="row__12">
  
  <div class="events-section__date-and-text">
  <a class="page-links" href="<?php the_permalink(); ?>"><h2 class="events-section__section-title events-section__section-title--archive-events custom-underline"><?php the_title(); ?></h2></a>

    <p class="events-section__content-archive-events exhibition-page--exhibition-content"><?php echo wp_trim_words(get_the_content(), 18); ?><a class="btn__learn-more btn__learn-more--dark" href="<?php the_permalink(); ?>"> Learn more</a></p>
  </div>
  <div class="row__4 page-section__expo-picture exhibition-page--banner-image">
            <a href="<?php the_permalink(); ?>"><img src="<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes']['exhibitionImage'] ?>" alt="The Willamette Meteorite"><p class="page-section__expo-picture--cite">Image source: <cite>https://www.amnh.org</cite></a>
          </div>
</div>
</div>

<?php } ?>
</div>

<p class="pagination-links"><?php echo paginate_links();?></p>
</div>

</div>






<?php get_footer(); ?>