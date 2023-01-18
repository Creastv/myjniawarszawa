<?php
 $id = 'testymonial-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }
 $className = 'testymonial-bl ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<?php if( have_rows('opinie') ): ?>
    <div class="swiper-container cs-testymonial">
    <div class="swiper-wrapper">
    <?php while( have_rows('opinie') ): the_row(); 
        $kto = get_sub_field('kto');
        $co = get_sub_field('co');
        ?>
        <div class="swiper-slide">
            <div class="kto-co">
                <div class="co"><?php echo $co; ?></div>
                <div class="kto"><?php echo $kto; ?></div>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
     <!-- Add Arrows -->
     <div class="swiper-button-next"></div>
     <div class="swiper-button-prev"></div>
    </div>
<?php endif; ?>
</section>