<?php get_header();
pageBanner(array(
  'title' => 'Search Results',
  'subtitle' => 'You searched for &ldquo;' . esc_html(get_search_query(false)) . '&rdquo;'
));
?>


<div class="exhibition-page--expo__description">
<?php
if(have_posts()){
while(have_posts()){
the_post();

get_template_part('template-parts/content', get_post_type());

} 
 echo paginate_links();

} else {
 echo '<h2> No results matched that search. </h2>';
}

get_search_form(); 

?>
</div>

</div>






<?php get_footer(); ?>