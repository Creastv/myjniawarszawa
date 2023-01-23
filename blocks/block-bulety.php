<?php
$id = 'bulety-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'bulety-bl ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$bulets = get_field('bullets');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image:url(<?php the_field('zdjecie_w_tle'); ?>); background-color:<?php the_field('kolor_tla'); ?>;">
    <?php if($bulets) { ?>
    <div class="bullets__wraper">
        <?php if($bulets as $bulet) { ?>
        <div class="item">
            <?php echo $bulet['icona']; ?>
            <?php echo $bulet['title']; ?>
            <?php echo $bulet['opis']; ?>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>
