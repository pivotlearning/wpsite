<?php

/*
*	Loading DEVN's framework and HUBs library
*	(c) king-theme.com
*
*/

function themeslug_setup() {
 
    add_theme_support( 'eventbrite' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'themeslug_setup' );
add_image_size( 'sidebar-thumb', 272, 124, true ); // Theme-specific Mode
add_image_size( 'frontpage-thumb', 275, 220, true ); //Theme-specific fp
add_image_size( 'front-thumb2', 359, 220, true );  // Holy crap, another one
add_image_size( 'full width', 960, 600, true ); //Larger size

include 'core/king.define.php';