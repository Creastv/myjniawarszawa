<?php
function register_acf_block_types() {
    acf_register_block_type(array(
        'name'              => 'tytul',
        'title'             => __('Nagłówek'),
        'render_template'   => 'blocks/block-title.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
        'keywords'          => array( 'tytuł', 'nagłówek' ),
    ));
    acf_register_block_type(array(
        'name'              => 'button',
        'title'             => __('Button'),
        'render_template'   => 'blocks/block-button.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
        'keywords'          => array( 'odnośnik', 'button' ),
    ));
    acf_register_block_type(array(
        'name'              => 'boxy',
        'title'             => __('Boxy'),
        'render_template'   => 'blocks/block-boxy.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
        'keywords'          => array( 'boxy', 'oferta' ),
    ));
    acf_register_block_type(array(
        'name'              => 'kontakt',
        'title'             => __('Kontakt'),
        'render_template'   => 'blocks/block-kontakt.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
        'keywords'          => array( 'kontakt' ),
    ));
    acf_register_block_type(array(
      'name'              => 'tab_cennik',
      'title'             => __('Zakładki - cennik'),
      'render_template'   => 'blocks/block-zak-cennik.php',
      'category'          => 'formatting',
      'icon' => array(
        'background' => '#e21c1f',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
    'mode'            => 'preview',
      'keywords'          => array( 'kontakt' ),
  ));
    acf_register_block_type(array(
        'name'              => 'testymonial',
        'title'             => __('Testymonial'),
        'render_template'   => 'blocks/block-testymonial.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'testymonial' ),
      'enqueue_assets'    => function(){
        wp_enqueue_style( 'cr_swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
	    	wp_enqueue_script('cr-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
	    	wp_enqueue_script( 'testymonial', get_template_directory_uri() . '/blocks/includes/testymonial.js', array(), '20130457', true );
      }
    ));
    acf_register_block_type(array(
        'name'              => 'googlereview',
        'title'             => __('Google review'),
        'render_template'   => 'blocks/block-google-review.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'testymonial' ),
      'enqueue_assets'    => function(){
        wp_enqueue_style( 'cr_swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
	    	wp_enqueue_script('cr-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
        wp_enqueue_script('cr-goo_api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyB8pMQYqHehRWSDeAVKOrv8JD9s1dR6Y2Q',  array(), '20130456', true );
	    	wp_enqueue_script( 'g-reviews', get_template_directory_uri() . '/blocks/includes/g-reviews.js', array(), '20130457', true );
      }
    ));
    acf_register_block_type(array(
        'name'              => 'tabela',
        'title'             => __('Tabela'),
        'render_template'   => 'blocks/block-tabela.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#e21c1f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview', 
      'keywords'          => array( 'domy' ),
    ));
    acf_register_block_type(array(
      'name'              => 'block_big-boxys',
      'title'             => __('Wavify'),
      'render_template'   => 'blocks/block-wavify.php',
      'category'          => 'formatting',
      'icon' => array(
          'background' => '#ff7800',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview',
      'keywords'          => array( 'Big boxy' ),
      'enqueue_assets'    => function(){
        // if(! is_admin()){
          wp_enqueue_script('cr-TweenMax_js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js',  array(), '20130456', true );
          wp_enqueue_script('cr-wavify_js', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/85188/jquery.wavify.js',  array(), '20130456', true );
        
          wp_enqueue_script( 'block-wavify', get_template_directory_uri() . '/blocks/includes/wavify.js', array(), '20130457', true );
          // }
        },
    ));
    // acf_register_block_type(array(
    //     'name'              => 'cennik',
    //     'title'             => __('Tabela - cennik'),
    //     'render_template'   => 'blocks/cennik.php',
    //     'category'          => 'formatting',
    //     'icon' => array(
    //         'background' => '#e21c1f',
    //         'foreground' => '#fff',
    //         'src' => 'ellipsis',
    //       ),
    //     'mode'            => 'preview',
    //     'keywords'          => array( 'wybrane pojazdy' ),
    //     'enqueue_assets'    => function(){
    //         wp_enqueue_style( 'cr_datatable', 'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' );
    //         wp_enqueue_style( 'cr_cdatatableresponsive', 'https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css' );
    //         wp_enqueue_style( 'cr_cfixedHeader', 'https://cdn.datatables.net/fixedheader/3.1.3/css/fixedHeader.dataTables.min.css' );
    //         wp_enqueue_script('cr-datatable', 'https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',  array(), '201304510', true );
    //         wp_enqueue_script('cr-datatableresponsive', 'https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js',  array(), '201304510', true );
    //         wp_enqueue_script('cr-fixedHeader', 'https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js',  array(), '201304510', true );
    //         wp_enqueue_script( 'cr-cennik-table-block', get_template_directory_uri() . '/blocks/includes/cennik-datatable.js', array(), '20130459', true );
    //     },
    //   ));
    acf_register_block_type(array(
            'name'              => 'text-seo',
            'title'             => __('SEO tekst'),
            'render_template'   => 'blocks/block-seo.php',
            'category'          => 'formatting',
            'icon' => array(
              'background' => '#ff7800',
              'foreground' => '#fff',
              'src' => 'ellipsis',
            ),
          'mode'            => 'preview', 
          'keywords'          => array( 'text-seo' ),
    ));

    acf_register_block_type(array(
            'name'              => 'cta-call',
            'title'             => __('CTA'),
            'render_template'   => 'blocks/block-cta.php',
            'category'          => 'formatting',
            'icon' => array(
              'background' => '#ff7800',
              'foreground' => '#fff',
              'src' => 'ellipsis',
            ),
          'mode'            => 'preview', 
          'keywords'          => array( 'cta', 'zadzwoń' ),
    ));
    acf_register_block_type(array(
            'name'              => 'bulety',
            'title'             => __('Bullets'),
            'render_template'   => 'blocks/block-bulety.php',
            'category'          => 'formatting',
            'icon' => array(
              'background' => '#ff7800',
              'foreground' => '#fff',
              'src' => 'ellipsis',
            ),
          'mode'            => 'preview', 
          'keywords'          => array( 'bulety' ),
    ));

}


// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}
