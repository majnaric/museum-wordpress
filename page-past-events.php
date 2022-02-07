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
    <h1>Past Events</h1>
</div>

<div class="wrapper news-and-blog exhibition-page__news-and-blog">

<div class="exhibition-page--expo__title"><p>A recap of our past events.</p></div>



<div class="exhibition-page--expo__description">

<div class="exhibition-page--expo__description post_item">
<?php
$today = date('Ymd');
$pastEvents = new WP_Query(array(
    'paged' => get_query_var('paged', 1),
  'post_type' => 'event',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'compare' => '<',
      'value' => $today,
      'type' => 'numeric'
    )
  )
));

while($pastEvents->have_posts()){
$pastEvents->the_post();?>


<div class="events-section__card events-section__card-medium events-section__card-medium--archive-events">

<div class="row__12">
  
  <div class="events-section__date-and-text">
  <a href="<?php the_permalink(); ?>"><h2 class="events-section__section-title events-section__section-title--archive-events"><?php the_title(); ?></h2></a>
    <div class="events-section__date events-section__date-archive-events"><p><?php 
    $eventDate = new DateTime(get_field('event_date'));
    echo $eventDate-> format('M d');
    ?></p></div>          
    <p class="events-section__content-archive-events"><?php echo wp_trim_words(get_the_content(), 18); ?></p>
  </div>
</div>
</div>

<?php } ?>
</div>


<p class="pagination-links"><?php echo paginate_links(array(
    'total' => $pastEvents->max_num_pages
));?></p>
</div>

</div>




<?php get_footer(); ?>