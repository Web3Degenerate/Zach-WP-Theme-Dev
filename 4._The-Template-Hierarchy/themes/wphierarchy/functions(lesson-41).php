<?php

/*
Lesson 37 (1 - 2 min) goes over add_theme_support(): https://developer.wordpress.org/themes/basics/theme-functions/
https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407830#overview

This replaces the old wp_title() tag (L37 @ 4:20)
    add_theme_support('title-tag'); 
*/


/* ATOM HAS A WP FUNCTION PACKAGE - atom-wordpress which provides a collection of all wordpress functions for atom. Author: AminulBD or AminuiBD */

function wphierarchy_setupz(){
        // L37 (5:17) - Add the theme support we'll need. 
        add_theme_support( 'title-tag' ); 
        // add_theme_support( 'post-thumbnails' ); 
        add_theme_support( 'post-thumbnails' );
        
        // Add catchall theme support for everything for now
        // add_theme_support( 'post_format', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
        add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'link', 'quote', 'image', 'video'. 'status', 'audio', 'chat' ) );
        
        add_theme_support( 'html5' ); 
        
        // Helps with meta data in your site
        // add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'automatic-feed-links' );
        
        // Customizer
        add_theme_support( 'custom-header' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        
        // New (~2018). Meant to help people loading new theme. Gives them content to help make it look like the demo? (L37 9:30) 
        add_theme_support('starter-content');
}

add_action('after_setup_theme', 'wphierarchy_setupz'); 


//L37 (10:20) We are going to namespace all our functions with 'wphierarchy_' to remain unqiue. Avoid conflict.
//Load in our CSS (9:51): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407830#announcements
// Hook into the add_action for wp_enqueue_script
function wphierarchy_enqueue_styles() {
    /* L37 (12:04) - https://developer.wordpress.org/reference/functions/wp_enqueue_style/
            wp_enqueue_style( $handle, $src, $deps, $ver, $media );
            1. Name of style sheet
            2. Link to said style sheet. WRONG format: '/wp-content/themes/wphierarchy/style.css'
            3. If no dependencies, pass an empty array.
            4. Version #. TO AVOID CACHING IN DEV, we'll set the "version number" with a time stamp down to the second, 
               so WP will always think it's unique! (L37 @ 16:18)
            5. Devices. (Mobile?) we'll set this as all.
    */
 
// Load LOCAL CSS files in our Theme Folder
        wp_enqueue_style('main-css', get_theme_file_uri('/style.css'), [], time(), 'all');
        // wp_enqueue_style('main-css', get_style_sheet_directory_uri() . '/style.css', [], time(), 'all' );     
                                  /*--->/wp-content/themes/wphierarchy/style.css ----*/
}

add_action('wp_enqueue_scripts', 'wphierarchy_enqueue_styles'); //when you load CSS scripts on a page, look for my function



/* L41 (6:46) Register Menu Locations: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407844#overview */

    register_nav_menus( [
        'main-menu' => esc_html__( 'Main Menuz', 'wpheirarchy')
        ]);
    




    
    
