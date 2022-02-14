<?php get_header();
pageBanner(array(
  'title' => 'Past Events',
  'subtitle' => 'A recap of our past events.'
));
?>



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