<div class="slider-section">
    <div class="slider-content">
    <div class="swiper" id="swiper-1">
    <div class="swiper-wrapper">
    <?php if(have_rows('slider')): ?>
    <?php while(have_rows('slider')): the_row();
    $img = get_sub_field('img')
    ?>
   
   <div class="swiper-slide">
    <img src="<?php echo esc_url($img['url']); ?>" alt="">
</div>

    <?php endwhile;?>
    <?php endif;?>
    </div>
<!-- If we need pagination -->
<div class="swiper-pagination"></div>

<!-- If we need navigation buttons -->
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>

    </div>
    
</div>
</div>
