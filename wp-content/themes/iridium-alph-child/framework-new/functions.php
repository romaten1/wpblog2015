<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 21.02.2015
 * Time: 7:57
 */
echo '2sdfffffffffffffffffffffffffffffffffffffffffffffffffffffs1212';

/**
 * ----------------------------------------------------------------------------------------
 * 9.0 - Include the generated CSS in the page header.
 * ----------------------------------------------------------------------------------------
 */

function alpha_load_wp_head() {

}

add_action( 'wp_head', 'alpha_load_wp_head' );


/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Load the custom scripts for the theme.
 * ----------------------------------------------------------------------------------------
 */
function alpha_scripts() {
	// Adds support for pages with threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		//wp_enqueue_script( 'comment-reply' );
	}

	// Register scripts
	wp_register_script( 'skel', SCRIPTS . '/skel.min.js', array( 'jquery' ), false, true );
	wp_register_script( 'skel-panels', SCRIPTS . '/skel-panels.min.js', array( 'jquery' ), false, true );
	wp_register_script( 'init', SCRIPTS . '/init.js', array( 'jquery' ), false, true );

	// Load the custom scripts
	wp_enqueue_script( 'skel' );
	wp_enqueue_script( 'skel-panels' );
	wp_enqueue_script( 'init' );

	// Load the stylesheets
	wp_enqueue_style( 'skel-noscript', THEMEROOT . '/css/skel-noscript.css' );
	wp_enqueue_style( 'style', THEMEROOT . '/css/style.css' );
	wp_enqueue_style( 'style-desktop', THEMEROOT . '/css/style-desktop.css' );
}

add_action( 'wp_enqueue_scripts', 'alpha_scripts' );
