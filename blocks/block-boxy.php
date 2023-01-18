<?php
$id = 'boxy-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'boxy ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<?php if( have_rows('boxy') ): ?>
    <ul class="wraper-boxy">
    <?php while( have_rows('boxy') ): the_row(); 
        $image = get_sub_field('zdjecie');
        $text = get_sub_field('tytul');
        $link = get_sub_field('link');
        ?>
        <li>
            <a href="<?php echo $link; ?>" >
                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                <div class="con"><h3><?php echo $text; ?> <i class="fas fa-chevron-right"></i></h3></div>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>
</section>

