<?php
$bild = get_sub_field('bild');
$title = get_sub_field('title');
$date = get_sub_field('date');
$text = get_sub_field('text');
?>
<div class="blog-news module">
	 <?php if( !empty( $bild ) ): ?>
	<div class="main-img-outer-wrapper">
	    <div class="main-img-wrapper">
			<div class="wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12 col-lg-4">
							<div class="image">
								<img src="<?php echo esc_url( $bild['url'] ); ?>" alt="<?php echo esc_attr( $bild['alt'] ); ?>" />
							</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	</div>
	 <?php endif; ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-7 offset-lg-5">
                    <div class="text-box">
                        <div class="title">
                            <?php if($title != ''): ?>
                            <?php echo $title;?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if($date  != ''): ?>
                    <p class="date"><?php echo $date ;?></p>
                    <?php endif; ?>
                    <div class="text">
                        <?php if($text != ''): ?>
                        <?php echo $text;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="row">
  <div class="col-12 col-lg-3 offset-lg-5">
                <?php if( have_rows('bilder_links') ): ?>
                <?php while( have_rows('bilder_links')): the_row();
// vars
$bild = get_sub_field('bild');
?>
                    <div class="col-12">
                        <div class="img-wrapper img-gallery-wrapper">
                            <?php if( !empty( $bild ) ): ?>
                            <img src="<?php echo esc_url( $bild['url'] ); ?>" alt="<?php echo esc_attr( $bild['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
               
                
                 <?php endwhile; ?>
                <?php endif; ?>
                 </div>
                <div class="col-12 col-lg-4">
                
                 <?php if( have_rows('bilder_rechts') ): ?>
                <?php while( have_rows('bilder_rechts')): the_row();
// vars
$bild = get_sub_field('bild');
?>
                
                
                    <div class="col-12">
                        <div class="img-wrapper img-gallery-wrapper">
                            <?php if( !empty( $bild) ): ?>
                            <img src="<?php echo esc_url( $bild['url'] ); ?>" alt="<?php echo esc_attr( $bild['alt'] ); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
               

                <?php endwhile; ?>
                <?php endif; ?>
                 </div>
            </div>
        </div>
    </div>
</div>