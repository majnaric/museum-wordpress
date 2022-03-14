<?php get_header();
pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in our world'
));
?>


    
    <!-- <div class="exhibition-page__title">
    <h1>All Events</h1>
</div>

<div class="wrapper news-and-blog exhibition-page__news-and-blog">

<div class="exhibition-page--expo__title"><p>See what is going on in our world.</p></div> -->

<div class="exhibition-page--expo__description">

<div class="exhibition-page--expo__description post_item">
<?php


$today = date('Ymd');
$homepageEvents = new WP_Query(array(
  'posts_per_page' => 3,
  'post_type' => 'event',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'numeric'
    )
  )
));


while(have_posts()){
the_post();
?>
<div class="events-section__card events-section__card-medium--archive-events">

  <div class="row__12">
  
    <div class="events-section__date-and-text">
      <div class="events-section__single-events-title">
        <a class="page-links page-links--archive-events" href="<?php the_permalink(); ?>"><h2 class="events-section__section-title events-section__section-title--archive-events custom-underline"><?php the_title(); ?></h2></a>
        <p class="events-section__content-archive-events"><?php echo wp_trim_words(get_the_content(), 18); ?><a class="btn__learn-more btn__learn-more--dark" href="<?php the_permalink(); ?>"> Learn more</a></p>
      </div>

  
      <div class="events-section__date-archive-events"><p class="events-section__date events-section__date--inside events-section__date--archive-events"><?php 
        $eventDate = new DateTime(get_field('event_date'));
        echo $eventDate-> format('d M');
        ?></p>
      </div>          
    </div>
  </div>
</div>

<?php } ?>
</div>

<p class="pagination-links"><?php echo paginate_links();?></p>
</div>

<hr>
<br> 
<div class="exhibition-page--expo__description post_item">
<p>Looking for a recap of our past events? <a class="btn__learn-more btn__learn-more--dark" href="<?php echo site_url('/past-events') ?>">Check out our past events archive.</a></p>
</div>

</div>





<?php get_footer(); ?>

