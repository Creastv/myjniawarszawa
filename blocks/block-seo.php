<?php
$id = 'seo-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$classes = 'seo-roz ';
if( !empty($block['className']) ) {
    $classes .= sprintf( ' %s', $block['className'] );
}
?>
<div id="<?php echo $id; ?>" class="<?php echo esc_attr($classes); ?>">
    <div class="wraper-seo">
        <?php the_field('tekst_seo'); ?>
    </div>
    <a href="#" class="btn-acorderon"><span>Rozwiń</span></a>
</div>
