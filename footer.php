<footer>

</footer>
<div class="mobile-navigation">
    <div class="navigation">
        <div class="wrapper">
            <nav>
                <?php echo get_website_menu('Footer'); ?>
            </nav>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
      speed: 400,
      autoplay: {
   delay: 5000,
 },
    // Optional parameters
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });
</script>
</body>

</html>