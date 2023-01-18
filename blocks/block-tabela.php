<?php
$id = 'tabela-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$className = 'tabela-cennik ';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
<div itemscope itemtype="http://schema.org/Table">
<div class="tab-it table-responsive">
<?php $table = get_field( 'tabela' );
if ( ! empty( $table ) ) {
    echo '<table border="0" class="table table-hover table-striped">';
        if ( ! empty( $table['caption'] ) ) {
            echo '<caption>' . $table['caption'] . '</caption>';
        }
        if ( ! empty( $table['header'] ) ) {
            echo '<thead>';
                echo '<tr>';
                    foreach ( $table['header'] as $th ) {
                        echo '<th>';
                            echo $th['c'];
                        echo '</th>';
                    }
                echo '</tr>';
            echo '</thead>';
        }
        echo '<tbody>';
            foreach ( $table['body'] as $tr ) {
                echo '<tr>';
                    foreach ( $tr as $td ) {
                        echo '<td>';
                            echo $td['c'];
                        echo '</td>';
                    }

                echo '</tr>';
            }
        echo '</tbody>';
    echo '</table>';
    }
?> 

</div>
<div class="inf-cenik">
    <p><b>Mały</b> np.: BMW 1, Toyota Yaris, Audi TT </p>
    <p><b>Średni</b> np.: Audi Q5, BMW 7 </p>
    <p><b>Duży</b> np.: różnego rodzaju busy, bądź samochody dostawcze </p>
</div>

</section>
