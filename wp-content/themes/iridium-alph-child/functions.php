<?php 
/**
 * functions.php
 *
 * The theme's functions and definitions.
 */

/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Define constants.
 * ----------------------------------------------------------------------------------------
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );


/**
 * ----------------------------------------------------------------------------------------
 * 2.0 - Load the framework.
 * ----------------------------------------------------------------------------------------
 */
require_once( FRAMEWORK . '/init.php' );


/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}


/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_setup' ) ) {
	function alpha_setup() {
		/**
		 * Make the theme available for translation.
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'alpha', $lang_dir );

		/**
		 * Add support for post formats.
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		/**
		 * Add support for automatic feed links.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'alpha' )
			)
		);
	}

	add_action( 'after_setup_theme', 'alpha_setup' );
}


/**
 * ----------------------------------------------------------------------------------------
 * 5.0 - Display meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_post_meta' ) ) {
	function alpha_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'alpha' ) . ' </li>';
			}

			// Get the post author.
			printf(
				'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);

			// Get the date.
			echo '<li class="meta-date"> ' . get_the_date() . ' </li>';

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>';
			}

			// The tags.
			$tag_list = get_the_tag_list( '', ', ' );
			if ( $tag_list ) {
				echo '<li class="meta-tags"> ' . $tag_list . ' </li>';
			}

			// Comments link.
			if ( comments_open() ) :
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Leave a comment', 'alpha' ), __( 'One comment so far', 'alpha' ), __( 'View all % comments', 'alpha' ) );
				echo '</span>';
				echo '</li>';
			endif;

			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __( 'Edit', 'alpha' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_paging_nav' ) ) {
	function alpha_paging_nav() {
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_widget_init' ) ) {
	function alpha_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'alpha' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'alpha' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'alpha' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'alpha' ),
					'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'alpha_widget_init' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - Function that validates a field's length.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_validate_length' ) ) {
	function alpha_validate_length( $fieldValue, $minLength ) {
		// First, remove trailing and leading whitespace
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 9.0 - Include the generated CSS in the page header.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_load_wp_head' ) ) {
	function alpha_load_wp_head() {

	}

	add_action( 'wp_head', 'alpha_load_wp_head' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Load the custom scripts for the theme.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'alpha_scripts' ) ) {
	function alpha_scripts() {
		// Adds support for pages with threaded comments


		// Register scripts
		wp_register_script( 'jquery', "http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" );
		wp_register_script( 'skel', SCRIPTS . '/skel.min.js', array( 'jquery' ) );
		wp_register_script( 'skel-panels', SCRIPTS . '/skel-panels.min.js', array( 'skel' ));
		wp_register_script( 'init', SCRIPTS . '/init.js', array( 'skel-panels' ));

		// Load the custom scripts
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'skel');
		wp_enqueue_script( 'skel-panels');
		wp_enqueue_script( 'init');

		// Load the stylesheets
		wp_enqueue_style( 'skel-noscript', THEMEROOT . '/css/skel-noscript.css' );
		wp_enqueue_style( 'style', THEMEROOT . '/css/style.css' );
		wp_enqueue_style( 'style-desktop', THEMEROOT . '/css/style-desktop.css' );
		wp_enqueue_style( 'bootstrap', THEMEROOT . '/css/bootstrap.css' );
	}

	add_action( 'wp_enqueue_scripts', 'alpha_scripts' );
}

add_filter('nav_menu_css_class' , 'special_nav_class');
function special_nav_class($classes){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}
