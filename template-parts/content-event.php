<div class="events-section__card events-section__card-medium events-section__card-medium--archive-events">

  <div class="row__12">
  
    <div class="events-section__date-and-text">
      <div class="events-section__single-events-title">
        <a class="page-links" href="<?php the_permalink(); ?>"><h2 class="events-section__section-title events-section__section-title--archive-events custom-underline"><?php the_title(); ?></h2></a>
        <p class="events-section__content-archive-events"><?php echo wp_trim_words(get_the_content(), 18); ?><a class="btn__learn-more btn__learn-more--dark" href="<?php the_permalink(); ?>"> Learn more</a></p>
      </div>

  
      <div class="events-section__date-archive-events"><p class="events-section__date events-section__date--inside"><?php 
        $eventDate = new DateTime(get_field('event_date'));
        echo $eventDate-> format('d M');
        ?></p>
      </div>          
    </div>
  </div>
</div>