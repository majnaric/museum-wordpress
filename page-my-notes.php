<?php

if(!is_user_logged_in()){
  wp_redirect(esc_url(site_url('/')));
  exit;
}


get_header();

while(have_posts()){
the_post(); 
pageBanner();
?>



<div class="exhibition-page--expo__description">
  

<div class="exhibition-page--expo__description post_item">

<div class="note-create">
  <h2>Create New Note</h2>
  <input class="new-note-title" placeholder="Title">
  <textarea class="new-note-text" placeholder="Your note here..."></textarea>
  <span class="btn note-submit">Create Note</span>
</div>

<ul class="notes" id="my-notes">
  <?php  
  $userNotes = new WP_Query(array(
      'post_type' => 'note',
      'posts_per_page' => -1,
      'author' => get_current_user_id()
  ));

  while($userNotes->have_posts()){
      $userNotes->the_post(); ?>

<li data-id="<?php the_ID(); ?>">
    <input readonly class="note-title-field" value="<?php echo str_replace('Private: ', '', esc_attr(get_the_title())); ?>">
    <span class="note-edit"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span>
    <span class="note-delete"><i class="fa fa-trash-can" aria-hidden="true"></i>Delete</span>
    <textarea readonly class="note-text-field"><?php echo esc_attr(wp_strip_all_tags(get_the_content())) ?></textarea>
    <span class="note-update"><i class="fa fa-arrow-right" aria-hidden="true"></i>Save</span>
    <span class="note-limit-message">Note limit reached: delete existing note to make room to a new one.</span>
</li>


      <?php
  }
  ?>
</ul>

</div> 

</div> 



<?php }

get_footer();

?>