<?php

// Get style from Parent Theme
add_action( 'wp_enqueue_scripts', 'camp_theme_enqueue_styles', PHP_INT_MAX );

function camp_theme_enqueue_styles() 
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', ['parent-style'] );
}

// Get icon from Font Awesome
function wmpudev_enqueue_icon_stylesheet() 
{
	wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome');
}

add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );

// Register Custom Taxonomies
require_once( __DIR__ . '/custom-taxonomies/years.php' );
require_once( __DIR__ . '/custom-taxonomies/session-types.php' );

// Register Custom Post Types
require_once( __DIR__ . '/custom-post-types/organizers.php' );
require_once( __DIR__ . '/custom-post-types/partners.php' );
require_once( __DIR__ . '/custom-post-types/sessions.php' );
require_once( __DIR__ . '/custom-post-types/speakers.php' );
require_once( __DIR__ . '/custom-post-types/supporters.php' );

// Register Custom Meta Boxes for Speaker post type
require_once( __DIR__ . '/custom-meta-boxes/speakers/social-media-links.php' );
require_once( __DIR__ . '/custom-meta-boxes/speakers/expertise.php' );

// Register Custom Meta Boxes for Session post type
require_once( __DIR__ . '/custom-meta-boxes/sessions/hall.php' );
require_once( __DIR__ . '/custom-meta-boxes/sessions/time.php' );

