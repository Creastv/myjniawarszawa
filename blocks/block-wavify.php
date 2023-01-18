<?php
 // Create id attribute allowing for custom "anchor" value.
 $id = 'wavify-' . $block['id'];
 if( !empty($block['anchor']) ) {
     $id = $block['anchor'];
 }

 // Create class attribute allowing for custom "className" and "align" values.
 $className = 'wavify-bl ';
 if( !empty($block['className']) ) {
     $className .= ' ' . $block['className'];
 }
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div class="wrap-wf">
<svg id="w" version="1.1" xmlns="http://www.w3.org/2000/svg"><path id="wave" d=""/></svg>
</div>
</div>