<?php if (!is_page_template('templates/home.php') && !is_page_template('templates/no-head-title.php') && !is_single() ) { ?>
<div class="page-title-bar-inner" >
    <div class="container-fluid">
	<div class="row">
    <div class="col-md-12">
		<?php if (is_single()) :?>
		<h2 class="page-title" title="<?php the_title(); ?>">
		<?php else: ?>
		<h1 class="page-title" title="<?php the_title(); ?>">
		<?php endif; ?>
		<?php if ( is_category() ) : single_cat_title();						
		elseif (is_single()) :
			_e( 'Blog', 'cr');
		elseif (is_404()) :
			_e( '404', 'cr');
		elseif (is_page() ) :
			the_title();
		// elseif ($post->post_type == 'nasza-flota') :
		// 	_e( 'Nasza flota', 'cr');
		elseif ( is_tag() ) :
			single_tag_title();
		elseif ( is_author() ) :
			the_post();
			printf( __( '%s', 'cr' ), '<span class="vcard">' . get_the_author() . '</span>' );
			rewind_posts();
		elseif ( is_day() ) :
			printf( __( 'Day: %s', 'cr' ), '<span>' . get_the_date() . '</span>' );
		elseif ( is_month() ) :
			printf( __( 'Month: %s', 'cr' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
		elseif ( is_year() ) :
			printf( __( 'Year: %s', 'cr' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			_e( 'Asides', 'cr' );

		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			_e( 'Images', 'cr');

		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			_e( 'Videos', 'cr' );

		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			_e( 'Quotes', 'cr' );

		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			_e( 'Links', 'cr' );
		else :
			_e( 'Blog', 'cr' );
		endif; ?>
		<?php if (is_single()) : ?>
		</h2>
		<?php else: ?>
		</h1>
		<?php endif; ?>
		<?php if ( function_exists('yoast_breadcrumb') && !is_front_page() ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		} ?>
		<?php if (is_404()): ?>
		<a class="btn btn-main" href="<?php echo esc_url( home_url( '/' ) ); ?>">Powrót do strony głównej</a>
		<?php endif; ?>
	</div>
	</div>
	</div>
</div>	
<?php } ?>

