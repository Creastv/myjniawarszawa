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
    <a href="#" class="btn-acorderon">Rozwiń</a>
</div>

<script>
// const box = document.querySelector(".seo-roz");
const btnAcordeon = document.querySelector(".btn-acorderon");
const acordeon = document.querySelector('.wraper-seo');
let flag = false;
btnAcordeon.addEventListener('click', function(e) {
    e.preventDefault();
    flag = !flag;
    if (flag) {
        acordeon.classList.add('seo-open');
        btnAcordeon.innerHTML = "Zwiń";
    } else {
        acordeon.classList.remove('seo-open');
        btnAcordeon.innerHTML = "Rozwiń";
    }
});
</script>
