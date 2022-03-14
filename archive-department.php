<?php get_header();
pageBanner(array(
        'title' => 'All Departments',
        'subtitle' => 'Check out what is going on in our Museum.'
));
?>



<div class="exhibition-page--expo__description">

<div class="exhibition-page--expo__description post_item">

<ul>

<?php
while(have_posts()){
the_post();?>

<li class="page-links"><a class="custom-underline" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

<?php } ?>

</ul>

</div>

<p class="pagination-links"><?php echo paginate_links();?></p>
</div>






</div>


<?php get_footer(); ?>
