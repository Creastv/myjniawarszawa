<?php if(get_field('nr_telefonu_header', 'options') && get_field('adres', 'options')) { ?> 
<div id="top-header" class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="wrap">
				<?php if(get_field('adres', 'options')) { ?> 
				<a href="<?php the_field('adres_url_header', 'options'); ?>" class="adres" target="_target"><?php the_field('adres', 'options'); ?></a>
				<?php } ?>
				<?php if(get_field('nr_telefonu_header', 'options')) { ?> 
				<a href="tel:<?php the_field('nr_telefonu_link_header', 'options'); ?>" class="tel" target="_target"><?php the_field('nr_telefonu_header', 'options'); ?></a>
				<?php } ?>
			</div>
		</div>
    </div>
</div>
<?php } else { ?>
	<br>
<?php } ?>