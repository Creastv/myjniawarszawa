<?php
if ( ! function_exists( 'crea_setup' ) ) :
	function crea_setup() {
	global $cap, $content_width;
		add_editor_style();
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'table', 150, 150 );
		add_theme_support( 'post-formats', array( 'div', 'image', 'video', 'quote', 'link' ) );
		add_theme_support( "title-tag" );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'post-formats', array(
			'video',
			'gallery'
		) );
		register_nav_menus( array(
			'primary'  => __( 'Header menu', 'crea' ),
			'secundary'  => __( 'Footer menu', 'crea' ),
		) );
	}
	endif;
add_action( 'after_setup_theme', 'crea_setup' );

/**
 * wszystkie widgety
*/
function cr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'cr' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box1', 'cr' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box3', 'cr' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box4', 'cr' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box6', 'cr' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box2', 'cr' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer - box5', 'cr' ),
		'id'            => 'sidebar-7',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'cr_widgets_init' );
/**
 * wszystkie scrypty
*/
function cr_scripts() {
	// load cr styles
	wp_enqueue_style( 'cr-style', get_stylesheet_uri() );
	// custome.style
	wp_enqueue_style( 'cr_custome-style', get_template_directory_uri().'/src/css/main.css' ); 
	// aos
	// wp_enqueue_style( 'cr_aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css' ); 
	// Google fonts

	wp_enqueue_style( 'cr_awsomefonts', get_template_directory_uri().'/src/css/awsomefonts.min.css' );

	if ( is_page_template('templates/home.php') ) {
		wp_enqueue_style( 'cr_swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
		wp_enqueue_script('cr-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
		wp_enqueue_script( 'produkt-slider-similar', get_template_directory_uri() . '/src/js/slider-home.js', array(), '20130457', true );
	}
	
	// wp_deregister_script( 'jquery' );
    // wp_register_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js' );
	// wp_enqueue_script( 'jquery' );
	
	// bootstrap js
	wp_enqueue_script('cr_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array( 'jquery' ),'2', true );
    // bootstrap js
	// wp_enqueue_script('cr_aos_js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array( 'jquery' ),'2', true );
	// load aos js
	if ( !is_singular('nasza-flota') ) {
	wp_enqueue_script('cr-main', get_template_directory_uri().'/src/js/main.js', array( 'jquery' ),'3', true );
	}
}
add_action( 'wp_enqueue_scripts', 'cr_scripts' );

// gutenberg editor
function add_block_editor_assets(){
  wp_enqueue_style('block_editor_css', get_template_directory_uri().'/src/css/admin.css');
}
add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);

/**
* wordpress nav walker
*/
require get_template_directory() . '/src/wp-nav.php';
require get_template_directory() . '/blocks/blocks.php';


/**
* Fukcja usuwa komunikaty o update
*/
function remove_update_notifications( $value ) {

    if ( isset( $value ) && is_object( $value ) ) {
        unset( $value->response[ 'advanced-custom-fields-pro/acf.php' ] );

    }

    return $value;
}
add_filter( 'site_transient_update_plugins', 'remove_update_notifications' );

/**
* ACF pola - edycja
*/
// function remove_acf_menu(){
// 	global $current_user;
// 	if ($current_user->user_login!='admin'){
// 	  remove_menu_page( 'edit.php?post_type=acf-field-group' );
// 	}
//   }
// add_action( 'admin_menu', 'remove_acf_menu', 100 );
 
// function rjs_lwp_contactform_css_js() {
//     global $post;
//     if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
//         wp_enqueue_script('contact-form-7');
//         wp_enqueue_style('contact-form-7');

//     }else{
//         wp_dequeue_script( 'contact-form-7' );
//         wp_dequeue_style( 'contact-form-7' );
//     }
// }
// add_action( 'wp_enqueue_scripts', 'rjs_lwp_contactform_css_js');
function filter_plugin_updates( $value ) {
	$plugins = array(
	  'search-filter-pro/search-filter-pro.php',
	  'advanced-custom-fields-pro/acf.php'
	);
	foreach( $plugins as $plugin ) {
	  if ( isset( $value->response[$plugin] ) ) {
		unset( $value->response[$plugin] );
	  }
	}
	return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
/**
* Dodanie zakłądki Opcje szablonu
*/
function my_acf_op_init() {
    if( function_exists('acf_add_options_page') ) {
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Opcje i ustawienia szablonu'),
            'menu_title'    => __('Ustawienia szablonu'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
		));	
		
	}
}
add_action('acf/init', 'my_acf_op_init');


// // ////////////////////////////////////////////////////Disable Emoticons
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Remove RSD Links
remove_action( 'wp_head', 'rsd_link' ) ;
// Remove Shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Hide WordPress Version
remove_action( 'wp_head', 'wp_generator' ) ;
// Disable Self Pingback
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
 
add_action( 'pre_ping', 'no_self_ping' );

// // ////////////////////////////////////////Disable Dashicons on Front-end
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) {
		return;
	}
	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// ///////////////////////////////// /////////////////////Remove Query Strings
function remove_cssjs_ver( $src ) {
	if( strpos( $src, '?ver=' ) )
	 $src = remove_query_arg( 'ver', $src );
	return $src;
	}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

////////////////////////////////////////////// wp_nav_menu remove class and id from li
function remove_css_id_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item', 'btn', 'btn-main')) : '';
} 
add_filter( 'page_css_class', 'remove_css_id_filter', 100, 1);
add_filter( 'nav_menu_item_id', 'remove_css_id_filter', 100, 1);
// add_filter( 'nav_menu_css_class', 'remove_css_id_filter', 100, 1);


add_action( 'init', function() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}, PHP_INT_MAX - 1 );

function itsme_disable_feed() {
	wp_redirect( home_url() );
    die;
   }
   
   add_action('do_feed', 'itsme_disable_feed', 1);
   add_action('do_feed_rdf', 'itsme_disable_feed', 1);
   add_action('do_feed_rss', 'itsme_disable_feed', 1);
   add_action('do_feed_rss2', 'itsme_disable_feed', 1);
   add_action('do_feed_atom', 'itsme_disable_feed', 1);
   add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
   add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

   remove_action( 'wp_head', 'feed_links_extra', 3 );
   remove_action( 'wp_head', 'feed_links', 2 );
   

function sv_move_jp_sharing( $content ) {
	
	if ( is_singular( 'page' ) && function_exists( 'sharing_display' ) ) {
		remove_filter( 'the_content', 'sharing_display', 19 );
	}
	return $content;
}
add_filter( 'the_content', 'sv_move_jp_sharing' );

//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);
  add_action( 'pre_get_posts', 'my_change_sort_order'); 
    function my_change_sort_order($query){
        if(is_archive()):
         //If you wanted it for the archive of a custom post type use: is_post_type_archive( $post_type )
           //Set the order ASC or DESC
           $query->set( 'order', 'ASC' );
           //Set the orderby
           $query->set( 'orderby', 'title' );
        endif;    
    };



	add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
	function add_admin_link($items, $args){
		if( $args->theme_location == 'primary' ){
			$items .= '<div class="d-flex d-md-none"><a href="#" class="map-nav btn btn-main" target="_blank">jak dojechać <i class="fas fa-map-marker-alt"></i></a>';
		}
		return $items;
	}


	function id_boost($string){
		$string = str_replace(array('[\', \']'), '', $string);
		$string = preg_replace('/\[.*\]/U', '', $string);
		$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
		$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
		return strtolower(trim($string, '-'));
	}

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
