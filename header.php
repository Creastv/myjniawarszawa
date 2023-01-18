<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="theme-color" content="#121213">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11"> 
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Poppins:wght@900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header id="header"  itemscope itemtype="http://schema.org/WPHeader" style="background-image:url(<?php the_field('zdjecie_header'); ?>)" >
	   <div class="wraper">
	   <?php get_template_part( 'templates/header/top', get_post_format() ); ?>  
	   <?php get_template_part( 'templates/header/nav', get_post_format() ); ?>  
	   <div id="spacer"></div>
	   <?php get_template_part( 'templates/header/title-page', get_post_format() ); ?>
	   </div>
	</header>
	<main id="main-page" data-aos-delay="600" data-aos="fade-up" data-aos-duration="1000">
	<?php if(is_page_template('templates/home.php')) { ?>
	    <?php if( have_rows('slider') ): ?>
		<div class="swiper-container cs-carousel">
			<div class="swiper-wrapper">
			<?php while( have_rows('slider') ): the_row(); 
				$image = get_sub_field('zdjecie_w_tle');
				$dopisek = get_sub_field('dopisek');
				$tytul = get_sub_field('tytul');
				$tag = get_sub_field('tag');
				$tresc = get_sub_field('tresc');
				$btnText = get_sub_field('tresc_butona');
				$btnUrl = get_sub_field('url_buttona');
				?>
				<div class="swiper-slide" style="background-image:url(<?php echo $image; ?>)">
				   <div class="wrap">
					<div class="content">
						<<?php echo $tag; ?> class="title">
							<small><?php echo $dopisek; ?></small><br>
						<?php echo $tytul; ?>
						</<?php echo $tag; ?>>
						<p>	<?php echo $tresc; ?></p>
							<a href="<?php echo $btnUrl; ?>" class="btn btn-main btn-ico-right"><?php echo $btnText; ?> <i class="fas fa-chevron-right"></i></a>
					</div>
				   </div>
			    </div>
			<?php endwhile; ?>
			</div>
		    <!-- Add Arrows -->
		    <div class="swiper-button-next"></div>
		    <div class="swiper-button-prev"></div>
			<a href="#oferta" class="after"></a>
	    </div>
	    <?php endif; ?>
	<?php }  ?>
	    <div class="container-fluid">
			<div class="row">
	