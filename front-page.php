<?php get_header(); ?>


<div class="large-hero-wrap">
    <div class="large-hero">
    
    </div>
</div>

<div class="large-hero__section">
  <h1 class="large-hero__title">Imaginary Museum</h1>
  <h3 class="large-hero__subtitle">Welcome to our Imaginary Museum.</h3>
</div>

<div class="social-network">
  <a href="https://www.facebook.com/"><i class="fab fa-facebook social-network__icon"></i></a>
  <a href="https://www.twitter.com/"><i class="fab fa-twitter social-network__icon"></i></a>
  <a href="https://www.instagram.com/"><i class="fab fa-instagram social-network__icon"></i></a>
  <i class="far fa-envelope social-network__icon"></i>
</div>

<div class="clear-me"></div>

<div class="wrapper news-and-blog">    
  <div class="page-section row__6 page-section__news row__6-forMedium">
    <div class="wrapper">
      <h1 class="page-links page-links--white events-section__title"><a class="custom-underline custom-underline--white custom-underline--title" href="<?php echo site_url('/exhibition'); ?>">EXHIBITION</a></h1>

      <?php 
        $today = date('Ymd');
        $homepageExhibition = new WP_Query(array(
          'posts_per_page' => 3,
          'post_type' => 'exhibition',
        ));

        while($homepageExhibition->have_posts()){
        $homepageExhibition->the_post(); ?>

      <div class="events-section__card"> 
    
        <h2 class="page-section__news-title page-links page-links--white"><a href="<?php the_permalink(); ?>" class="custom-underline custom-underline--white"><?php the_title(); ?></a></h2>

        <div class="row__8">
          <div class="page-section__section-card">
            <p class="page-section__section-text"><?php 
            if (has_excerpt()){ 
              echo get_the_excerpt();
            } else {
              echo wp_trim_words(get_the_content(), 18);
            }
             ?> <a class="btn__learn-more--light" href="<?php the_permalink(); ?>">Learn more</a></p>
          
          </div>
        </div>
        
        <div class="page-section__expo-picture">
          <a href="<?php the_permalink(); ?>"><img src="<?php $pageBannerImage = get_field('page_banner_background_image'); echo $pageBannerImage['sizes']['exhibitionImage'] ?>" alt="The Willamette Meteorite"></a>
        </div>
      </div>


      <?php } 

      wp_reset_postdata();

      ?>


    </div>
  </div>
  
  <div class="row__4 wrapper events-section row__4-forMedium">
    <h1 class="page-links page-links--white events-section__title"><a class="custom-underline custom-underline--white custom-underline--title" href="<?php echo site_url('/events'); ?>">EVENTS</a></h1>


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

      while($homepageEvents->have_posts()){
      $homepageEvents->the_post(); ?>

    <div class="events-section__card events-section__card-medium">

      <div class="row__12">
        <h2 class="events-section__section-title page-links page-links--white"><a href="<?php the_permalink(); ?>" class="custom-underline custom-underline--white"><?php the_title(); ?></a></h2>
          
          <div class="events-section__date-and-text">
            <p class="events-section__date"><?php
            $eventDate = new DateTime(get_field('event_date'));
            echo $eventDate->format('d M') 
            ?></p>          
            <p class="events-section__section-text"><?php 
            if (has_excerpt()){ 
              echo get_the_excerpt();
            } else {
              echo wp_trim_words(get_the_content(), 18);
            }
            ?> <a class="btn__learn-more--light" href="<?php the_permalink(); ?>">Learn more</a></p>
          </div>
      </div>
    </div>

  <?php
   }
  ?> 



  </div>
</div>

<div class="clear-me"></div>

<h2 class="carousel__title">Programs for Kids</h2>
<div class="carouselAll"></div>
<div class="carouselBody">
<div class="carousel swiper-container">
  <div class="carousel-image-container swiper-wrapper" id="images">
    
    <img class="carouselIMG swiper-slide"
      src="<?php echo get_theme_file_uri('/images/image-slider/artAndCraft.jpg');?>"
      alt="first-image"
    />
   
    <img class="carouselIMG swiper-slide"
      src="<?php echo get_theme_file_uri('/images/image-slider/groupVisits.jpg');?>"
      alt="second-image"
    />

    <img class="carouselIMG swiper-slide"
      src="<?php echo get_theme_file_uri('/images/image-slider/maskarade.jpg'); ?>"
      alt="third-image"
    />

    <img class="carouselIMG swiper-slide"
      src="<?php echo get_theme_file_uri('/images/image-slider/virtualTours.jpg'); ?>"
      alt="fourth-image"
    />

  </div>
  <div class="buttons-container">
    <button id="left" class="carouselBTN swiper-button-prev">Back</button>
    <button id="right" class="carouselBTN swiper-button-next">Next</button>
  </div>
</div>
</div>
</div>


<!-- profile card section -->

<h2 class="profile-cards-section__title">Museum Curators</h2>
<div class="profile-cards-section">



<div class="first hero">
  <img class="hero-profile-img" src="<?php echo get_theme_file_uri('/images/department-images/art-department.jpg');?>" alt="">
  <div class="hero-description-bk"></div>
  <div class="hero-logo">
    <img src="<?php echo get_theme_file_uri('/images/profile-cards/profile-1.jpeg');?>" alt="">
  </div>
  <div class="hero-description">
      <h2>Goran Majnarić</h2>
    <p>The best (and only) Art Curator in the department</p>
  </div>
  
  <div class="hero-btn">
    <a href="#">Learn More</a>
  </div>
</div>

<div class="first hero">
  <img class="hero-profile-img" src="<?php echo get_theme_file_uri('/images/department-images/natural-history-department.jpg');?>" alt="">
  <div class="hero-description-bk"></div>
  <div class="hero-logo">
    <img src="<?php echo get_theme_file_uri('/images/profile-cards/profile-2.jpeg');?>" alt="">
  </div>
  <div class="hero-description">
      <h2>Slađana Aleksić</h2>
    <p>The head Curator of the Natural-history Department</p>
  </div>
  
  <div class="hero-btn">
    <a href="#">Learn More</a>
  </div>
</div>

<div class="first hero">
  <img class="hero-profile-img" src="<?php echo get_theme_file_uri('/images/department-images/ethnology-department.jpg');?>" alt="">
  <div class="hero-description-bk"></div>
  <div class="hero-logo">
    <img src="<?php echo get_theme_file_uri('/images/profile-cards/profile-3.jpeg');?>" alt="">
  </div>
  <div class="hero-description">
      <h2>Paulina Vukobratović</h2>
    <p>Curator of the Ethnology Department</p>
  </div>
  
  <div class="hero-btn">
    <a href="#">Learn More</a>
  </div>
</div>

<div class="first hero">
  <img class="hero-profile-img" src="<?php echo get_theme_file_uri('/images/department-images/history-department.jpg');?>" alt="">
  <div class="hero-description-bk"></div>
  <div class="hero-logo">
    <img src="<?php echo get_theme_file_uri('/images/profile-cards/profile-4.jpeg');?>" alt="">
  </div>
  <div class="hero-description">
      <h2>Novica Vukobratović</h2>
    <p>Our History Department Curator</p>
  </div>
  
  <div class="hero-btn">
    <a href="#">Learn More</a>
  </div>
</div>



</div>
  



</div> 


<?php get_footer(); ?>
