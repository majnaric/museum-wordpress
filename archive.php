<?php get_header();
pageBanner(array(
  'title' => get_the_archive_title(),
  'subtitle' => get_the_archive_description()
));
?>


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








<?php get_footer(); ?>

</div>