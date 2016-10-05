<?php
/**
 * Laticínios Betim functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Laticínios_Betim
 */

if ( ! function_exists( 'laticinios_betim_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function laticinios_betim_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Laticínios Betim, use a find and replace
	 * to change 'laticinios-betim' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'laticinios-betim', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'header' => esc_html__( 'Cabeçalho', 'laticinios-betim' ),
		'footer' => esc_html__( 'Rodapé', 'laticinios-betim' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'laticinios_betim_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'laticinios_betim_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function laticinios_betim_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'laticinios_betim_content_width', 640 );
}
add_action( 'after_setup_theme', 'laticinios_betim_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function laticinios_betim_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Rodapé', 'laticinios-betim' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Adicione widgets aqui', 'laticinios-betim' ),
		'before_widget' => '<section class="widget-wrapper">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'laticinios_betim_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function laticinios_betim_scripts() {
	wp_enqueue_style( 'laticinios-betim-style', get_stylesheet_uri() );

	wp_enqueue_script( 'laticinios-betim-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'laticinios-betim-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'laticinios_betim_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register custom post types
 */
 
 // "Complemento" post ype
 add_action("init", "complementos");
 function complementos() {
 	
 	$labels = array( 'name' => 'Complementos', 'singular_name' => 'Complemento' );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-plus',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	);
 	
 	register_post_type("complementos", $args);
 }
 
 // "Receitas" post type
 add_action("init", "receitas");
 function receitas() {
 	
 	$labels = array( 'name' => 'Receitas', 'singular_name' => 'Receita' );
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-media-text',
	);
 	
 	register_post_type("receitas", $args);
 }

 // "Curiosidades" post type
 add_action("init", "curiosidades");
 function curiosidades() {
 	
 	$labels = array( 'name' => 'Curiosidades', 'singular_name' => 'Curiosidade' );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-lightbulb',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	);
 	
 	register_post_type("curiosidades", $args);
 }
 
 /**
  * Register custom taxonomy for "Complementos" post type
  */
  
  // "Tipo" custom taxonomy
  add_action("init", "complemento_tipo", 0);
  function complemento_tipo() {
  	
  $labels = array(
		'name'              => _x( 'Tipos', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Tipo', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Procurar Tipos', 'textdomain' ),
		'all_items'         => __( 'Todos os Tipos', 'textdomain' ),
		'parent_item'       => __( 'Parente Tipos', 'textdomain' ),
		'parent_item_colon' => __( 'Parentes Tipos:', 'textdomain' ),
		'edit_item'         => __( 'Editar Tipo', 'textdomain' ),
		'update_item'       => __( 'Atualizar Tipo', 'textdomain' ),
		'add_new_item'      => __( 'Adicionar Novo Tipo', 'textdomain' ),
		'new_item_name'     => __( '', 'textdomain' ),
		'menu_name'         => __( 'Tipos', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tipo' ),
	);
  	
  	register_taxonomy("tipo", "complementos", $args);
  }
  
  /**
   * Filter excerpt length to 20 characters
   */
function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );