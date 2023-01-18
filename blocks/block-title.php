<?php
 // Create id attribute allowing for custom "anchor" value.
 $id = 'title-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'title-bl ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
 if( !empty($block['align']) ) {
    $className .= ' text-' . $block['align'];
}
$text = get_field('title');
$dop = get_field('subtitle');
$tag = get_field('tag');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if(!empty($dop)) { ?>
    <small><?php echo $dop; ?></small> 
    <?php } ?>
    <<?php echo $tag; ?>>
      <?php echo $text; ?>
    </<?php echo $tag; ?>>
    
</div>