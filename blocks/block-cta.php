<?php
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'cta-bl ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$cta = get_field('cta');
$link = $cta['link'];
if( $link ){
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background-image:url(<?php the_field('zdjecie_w_tle'); ?>); background-color:<?php the_field('kolor_tla'); ?>;">
    <div class="cta__wraper">
        <?php if($cta['tytul']) { ?>
        <<?php echo $cta['tag']; ?> class="title"> <?php echo $cta['tytul']; ?></<?php echo $cta['tag']; ?>>
        <?php } ?>
        <?php if($cta['opis']) { ?>
        <p> <?php echo $cta['opis']; ?></p>
        <?php } ?>
        <?php if($link) { ?>
        <div class="but ">
            <a class="btn btn-main btn-ico-right" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i class="fas fa-chevron-right"></i></a>
        </div>
        <?php } ?>
    </div>
</section>
