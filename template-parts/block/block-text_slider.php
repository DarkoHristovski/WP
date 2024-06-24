<?php


?>

<div class="text-slider">
<div class="swiper" id="swiper-2">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
<?php if(have_rows('slider')): ?>
<?php while(have_rows('slider')): the_row(); 

$text = get_sub_field('text')
?>

<div class="swiper-slide">
<div class="swiper-slide-text-wrapper">
<?php echo $text; ?>
</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
</div>
  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
</div>
