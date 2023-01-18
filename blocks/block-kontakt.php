<?php
$id = 'kontakt-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'kontakt-bl ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> wrap-full" style="background-image:url(<?php the_field('zdjecie_w_tle'); ?>); background-color:<?php the_field('kolor_tla'); ?>;">

<div class="">



<?php if( have_rows('dane_kontaktowe') ): ?>
    <ul class="wraper-dane">
    <?php while( have_rows('dane_kontaktowe') ): the_row(); 
        $text = get_sub_field('tresc');
        $ikona = get_sub_field('ikona');
        ?>
        <li>
           <?php echo $ikona; ?>
           <p><?php echo $text; ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>

</div>
</section>

