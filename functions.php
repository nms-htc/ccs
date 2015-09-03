<?php 
	
	// Load init.php
	require_once dirname( __FILE__ ) . '/inc/init.php';

	// Load TGM PLUGIN ACTIVATION
	require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
	
	// Load bootstrap_navwarker
	require_once dirname( __FILE__ ) . '/walker/waltzsoft_bootstrap_navwalker.php';

	// Load custom comment walker
	require_once dirname( __FILE__ ) . '/walker/waltzsoft_comment_walker.php';	

	/**
	 * Make theme available for translation.
	 * Translations can be filed in /languages/ directory.
	 */
	load_theme_textdomain( 'waltzsoft', get_template_directory() . '/languages' );

	/**
	 * CCS Theme functions and definations
	 */
	
	if ( ! function_exists( 'waltzsoft_theme_setup' ) ) {
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		function waltzsoft_theme_setup() {

 			// remove header links
			remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
		    remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
		    remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
		    remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
		    remove_action( 'wp_head', 'index_rel_link' );                         // index link
		    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
		    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
		    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
		    remove_action( 'wp_head', 'wp_generator' );                           // WP version

			// Add default posts and comments RSS feed links to head
			add_theme_support( 'automatic-feed-links' );

			/**
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a hard-coded 
			 * <title> tag in the document head, and expect WordPress to provide it to us.
			 */
			add_theme_support( 'title-tag' );

			/**
			 * Enable support for Post Thumbnails on posts.
			 */
			add_theme_support( 'post-thumbnails');

			/**
			 * Register primary nav, and sidebar nav for theme
			 */
			register_nav_menus( array(
				'primary-menu' => esc_html__( 'Primary menu', 'waltzsoft' ),
				'sidebar-menu' => esc_html__( 'Sidebar menu', 'waltzsoft' )
			) );

			/**
			 * Switch default core markup for search form, comment form, and comments to output valid HTML5
			 */
			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
			) );
			
			/**
			 * Setup the Wordpress core custom background feature
			 */
			add_theme_support( 'custom-background', apply_filters( 
				'waltzsoft_custom_background_args', array( 
					'default-color' => 'fff'
			) ) );
		}
	}
	add_action( 'after_setup_theme', 'waltzsoft_theme_setup' );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet
	 */
	function waltzsoft_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'waltzsoft_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'waltzsoft_content_width', 0 );

	/**
	 * Register widget area
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
	 */
	function waltzsoft_widgets_init() {
		register_sidebar( array( 
			'name' => esc_html__( 'Forum Sidebar', 'waltzsoft' ),
			'id' => 'sidebar-forum',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="panel panel-default widget %2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<div class="panel-heading">',
			'after_title' => '</div><div class="panel-body">',
		) );

		register_sidebar( array( 
			'name' => esc_html__( 'Right Sidebar', 'waltzsoft' ),
			'id' => 'sidebar-right',
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="panel panel-default widget %2$s">',
			'after_widget' => '</div></aside>',
			'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
			'after_title' => '</h3></div><div class="panel-body">',
		) );
	}
	add_action( 'widgets_init', 'waltzsoft_widgets_init' );

	/**
	 * Enqueue scripts and styles
	 */
	function waltzsoft_theme_scripts() {
		// Bootstrap css
		wp_enqueue_style( 'waltzsoft-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.4', 'all');

		// Font-awesome
		wp_enqueue_style( 'waltzsoft-font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '', 'all');		

		// Theme style (style.css)
		wp_enqueue_style( 'waltzsoft-theme-style', get_stylesheet_uri(), array('waltzsoft-bootstrap'), '09062015', 'all' );

		//Replace Wordpress jquery
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array(), '1.11.2', false );
		wp_enqueue_script( 'jquery' );

		// Bootstrap js
		wp_enqueue_script( 'waltzsoft-bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.4', true );

	}
	add_action( 'wp_enqueue_scripts', 'waltzsoft_theme_scripts');

	/**
	 * Filter the excerpt
	 */
	if ( ! function_exists( 'waltzsoft_excerpt_length')) {
		function waltzsoft_excerpt_length($length) {
			return 30;
		}
	}
	add_filter( 'excerpt_length', 'waltzsoft_excerpt_length' );

	/**
	 * Custom template tags for this theme
	 */
	require get_template_directory() . '/inc/template-tags.php';
?>