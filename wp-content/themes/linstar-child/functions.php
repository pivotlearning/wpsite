<?php

/*
*	Child-Theme functions
*	(c) king-theme.com
*
*/

function themeslug_setup() {
 
    ...
 
    /**
     * Add theme support for the Eventbrite API plugin.
     * See: https://wordpress.org/plugins/eventbrite-api/
     */
    add_theme_support( 'eventbrite' );
}
add_action( 'after_setup_theme', 'themeslug_setup' );

?>