<footer class="zaglavlje" id="page-footer"> 
  <div class="zaglavlje__container">

    <div class="row__3 wrapper">
      <a href="<?php echo site_url(); ?>"><h2 class="zaglavlje__title">Imaginary Museum</h2></a>
      <p>Adress: Imaginary street 333.3333.33</p>
      <p>Telephone Num: 222 22 22 22 222</p>
      <p>Country: Never NeverLand</p>
    </div>

    <div class="row__3 wrapper">
      <h2 class="zaglavlje__title">General</h2>
      <p>Directions</p>
      <p>Contact Us</p>
      <p>Employment</p>
      <p>Press Room</p>
    </div>

    <div class="row__3--zaglavlje-input wrapper">
      <!-- <input type="text" class="zaglavlje__input open-modal" placeholder="Search"><i class="fas fa-search"></i> -->
      <p><a href="#" class="btn open-modal">Get In Touch</a></p>
    </div>

    <div class="row__3--zaglavlje-author">
      <p>Copyright © 2021 Majnaric Goran. All rights reserved.</p>
    </div>

  </div>
</footer>


<div class="search-overlay">
 <div class="search-overlay__top">
   <div class="container">
     <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
     <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term" autocomplete="off">
     <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
   </div>
 </div>

<div class="container">
  <div id="search-overlay__results">
  
  </div>
</div>

</div>


<?php wp_footer(); ?>
</body>
</html>