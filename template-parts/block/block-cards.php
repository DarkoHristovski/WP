<?php

?>


<section class="section-cards">
    <div class="row">
    <div class="flex-container">
        <?php if (have_rows("cards")) : ?>
            <?php while (have_rows("cards")) : the_row();
                $img = get_sub_field("image");
                $text = get_sub_field("text");
                $link = get_sub_field("link");
            ?>
                <div class="cards">
                    <div class="img-wrapper">
                        <img src="<?php echo esc_url($img['url']); ?>" alt="">
                    </div>
                    <div class="text">
                        <div class="text-wrapper">
                            <?php echo $text; ?>
                            <a target="_blank" href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
                            <button>Show text</button>
                        </div>
                    </div>
                </div>
            <?php endwhile;  ?>
        <?php endif; ?>
    </div>
    </div>
</section>