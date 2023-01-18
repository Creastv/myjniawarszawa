<?php
$id = 'button-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'but ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' text-' . $block['align'];
}
$text = get_field('tresc');
$link = get_field('link');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
   <a class="btn btn-main btn-ico-right" href="<?php echo $link; ?>"><?php echo $text; ?> <i class="fas fa-chevron-right"></i></a>
</div>

