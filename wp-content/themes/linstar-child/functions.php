<?php

/*
*	Loading DEVN's framework and HUBs library
*	(c) king-theme.com
*
*/

function themeslug_setup() {
 
    add_theme_support( 'eventbrite' );
}
add_action( 'after_setup_theme', 'themeslug_setup' );
