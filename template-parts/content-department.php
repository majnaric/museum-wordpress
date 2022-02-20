<div class="events-section__single-events-title">
        <a class="page-links" href="<?php the_permalink(); ?>"><h2 class="events-section__section-title events-section__section-title--archive-events custom-underline"><?php the_title(); ?></h2></a>
        <p class="events-section__content-archive-events"><?php echo wp_trim_words(get_the_content(), 18); ?><a class="btn__learn-more btn__learn-more--dark" href="<?php the_permalink(); ?>"> View Department</a></p>
      </div>
