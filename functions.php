<?php
/**
 * industry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package industry
 */

if ( ! function_exists( 'industry_demo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function industry_demo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on industry, use a find and replace
		 * to change 'industry-demo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'industry-demo', get_template_directory() . '/languages' );

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

		add_image_size( 'industry-blog-thumbnail', 750, 450, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'industry-demo' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );


		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
	}
endif;
add_action( 'after_setup_theme', 'industry_demo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function industry_demo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'industry_demo_content_width', 640 );
}
add_action( 'after_setup_theme', 'industry_demo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function industry_demo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'industry-demo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'industry-demo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'industry-demo' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add footer widgets here.', 'industry-demo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'industry_demo_widgets_init' );


/**
 * Google Custom fonts
 */

if ( ! function_exists( 'industry_theme_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own industry_theme_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function industry_theme_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';	

	$body_font = cs_get_option('body_font');
	$body_font_variant_array = cs_get_option('body_font_variant');
	$body_font_variant = implode(',',$body_font_variant_array);

	$heading_font = cs_get_option('heading_font');
	$different_hadding_font = cs_get_option('different_hadding_font');
	$heading_font_variant_array = cs_get_option('heading_font_variant');
	$heading_font_variant = implode(',',$heading_font_variant_array);

	if(!empty($body_font)){
		$body_font_family = $body_font['family'];
	}else{
		$body_font_family = 'Montserrat';
	}

	if(!empty($heading_font)){
		$heading_font_family = $heading_font['family'];
	}else{
		$heading_font_family = 'Montserrat';
	}

	$fonts[] = ''.esc_attr($body_font_family).':'.esc_attr($body_font_variant).'';

if($different_hadding_font == true){
	$fonts[] = ''.esc_attr($heading_font_family).':'.esc_attr($heading_font_variant).'';
}


	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;



/**
 * Enqueue scripts and styles.
 */
function industry_demo_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'industry-fonts', industry_theme_fonts_url(), array(), null );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style( 'industry-default-style', get_template_directory_uri().'/assets/css/default.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'industry-demo-style', get_stylesheet_uri() );

	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'industry_demo_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Themeoptions and metabox functions.
 */
require(get_template_directory().'/inc/theme-metabox-and-options.php');

/**
 * Theme Style functions.
 */
require(get_template_directory().'/inc/theme-style.php');


