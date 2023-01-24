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
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if($bulets) { ?>
    <div class="bullets__wraper">
        <?php foreach($bulets as $bulet) { ?>
        <div class="item">
            <?php if($bulet['ikona']) { ?>
            <div class="icona"> <?php echo $bulet['ikona']; ?></div>
            <?php } ?>
            <div class="content">
                <?php if($bulet['tytul']){ ?>
                <h3><?php echo $bulet['tytul']; ?></h3>
                <?php } ?>
                <?php echo $bulet['opis']; ?>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>
