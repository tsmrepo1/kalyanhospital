<?php
/**
 * kalyanhospital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kalyanhospital
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kalyanhospital_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kalyanhospital, use a find and replace
		* to change 'kalyanhospital' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kalyanhospital', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kalyanhospital' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kalyanhospital_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kalyanhospital_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kalyanhospital_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kalyanhospital_content_width', 640 );
}
add_action( 'after_setup_theme', 'kalyanhospital_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kalyanhospital_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kalyanhospital' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kalyanhospital' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kalyanhospital_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kalyanhospital_scripts() {
	wp_enqueue_style( 'kalyanhospital-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'kalyanhospital-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kalyanhospital-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kalyanhospital_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Register Custom Navigation Walker
 */
function aussie_register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'aussie_register_navwalker' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
//Acf Option
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}

remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 3 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols = 6;
  return $cols;
}

// Number Pagination Function 
function njengah_number_pagination() {
	/** 
	 * Create numeric pagination in WordPress
	 */	 
	// Get total number of pages
	global $wp_query;
	$total = $wp_query->max_num_pages;
	// Only paginate if we have more than one page
	if ( $total > 1 )  {
	     // Get the current page
	     if ( !$current_page = get_query_var('paged') )
	          $current_page = 1;
	     // Structure of “format” depends on whether we’re using pretty permalinks
	     $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
	     echo paginate_links(array(
	          'base' => get_pagenum_link(1) . '%_%',
	          'format' => $format,
	          'current' => $current_page,
	          'total' => $total,
	          'mid_size' => 4,
	          'type' => 'list'
	     ));
	}
}


//Our Doctors Post Type
function my_custom_post_doctors_management() {

//labels array added inside the function and precedes args array
 
$labels = array(
'name' => _x( 'Doctors ', 'post type general name' ),
'singular_name' => _x( 'Doctors Management', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Doctors ' ),
'add_new_item' => __( 'Add New Doctors ' ),
'edit_item' => __( 'Edit Doctors ' ),
'new_item' => __( 'New Doctors ' ),
'all_items' => __( 'All Doctors ' ),
'view_item' => __( 'View Doctors ' ),
'search_items' => __( 'Search Doctors ' ),
'not_found' => __( 'No Doctors  found' ),
'not_found_in_trash' => __( 'No Doctors  found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Doctors '
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Displays Doctors Management and their ratings',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'doctors_management', $args );
register_taxonomy('doctors_category', 'doctors_management', array('hierarchical' => true, 'label' => 'Doctors Category', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}
add_action( 'init', 'my_custom_post_doctors_management' );



//Our Departments Post Type
function my_custom_post_hospital_departments() {

//labels array added inside the function and precedes args array
 
$labels = array(
'name' => _x( 'Hospital Departments', 'post type general name' ),
'singular_name' => _x( 'Hospital Departments', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Hospital Departments' ),
'add_new_item' => __( 'Add New Hospital Departments' ),
'edit_item' => __( 'Edit Hospital Departments' ),
'new_item' => __( 'New Hospital Departments' ),
'all_items' => __( 'All Hospital Departments' ),
'view_item' => __( 'View Hospital Departments' ),
'search_items' => __( 'Search Hospital Departments' ),
'not_found' => __( 'No Hospital Departments found' ),
'not_found_in_trash' => __( 'No Hospital Departments found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Hospital Departments'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Displays Hospital Departments and their ratings',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'hospital_departments', $args );
}
add_action( 'init', 'my_custom_post_hospital_departments' );



//Our Patient Care Post Type
function my_custom_post_patient_care() {
//labels array added inside the function and precedes args array 
$labels = array(
'name' => _x( 'Patient Care', 'post type general name' ),
'singular_name' => _x( 'Patient Care', 'post type singular name' ),
'add_new' => _x( 'Add New', 'Patient Care' ),
'add_new_item' => __( 'Add New Patient Care' ),
'edit_item' => __( 'Edit Patient Care' ),
'new_item' => __( 'New Patient Care' ),
'all_items' => __( 'All Patient Care' ),
'view_item' => __( 'View Patient Care' ),
'search_items' => __( 'Search Patient Care' ),
'not_found' => __( 'No Patient Care found' ),
'not_found_in_trash' => __( 'No Patient Care found in the Trash' ),
'parent_item_colon' => '',
'menu_name' => 'Patient Care'
);

// args array

$args = array(
'labels' => $labels,
'description' => 'Displays Patient Care and their ratings',
'public' => true,
'menu_position' => 4,
'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
'has_archive' => true,
);

register_post_type( 'patient_care', $args );
}
add_action( 'init', 'my_custom_post_patient_care' );





function webp_upload_mimes( $existing_mimes ) {
    // add webp to the list of mime types
    $existing_mimes['webp'] = 'image/webp';
    // return the array back to the function with our added mime type
    return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );
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

function custom_phone_validation($result,$tag){

    $type = $tag->type;
    $name = $tag->name;

    if($type == 'tel' || $type == 'tel*'){

        $phoneNumber = isset( $_POST[$name] ) ? trim( $_POST[$name] ) : '';

        $phoneNumber = preg_replace('/[() .+-]/', '', $phoneNumber);
            if (strlen((string)$phoneNumber) != 10) {
                $result->invalidate( $tag, 'Please enter a valid phone number.' );
            }
    }
    return $result;
}
add_filter('wpcf7_validate_tel','custom_phone_validation', 10, 2);
add_filter('wpcf7_validate_tel*', 'custom_phone_validation', 10, 2);

