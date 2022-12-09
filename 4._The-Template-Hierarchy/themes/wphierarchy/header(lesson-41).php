<!DOCTYPE html>
<html <?php language_attributes();  ?>>

    <head>
       
        <meta charset="<?php bloginfo('charset');  ?>">  <!--<meta charset="utf-8">-->
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
                        <!--<title>WP Hierarchy</title>-->
                       
                    <!--
                        wp_head() gives WP and via WP any plugin or theme,  
                        THE ABILITY THEY WANT TO ADD ANYTHING THEY WANT 
                        BEFORE THE CLOSING OF THE HEAD TAG
                    
                        Example: WP ENQUEUE STYLE FEEDS IN THROUGH wp_head() in the header.php template.
                            wp_enqueue_style('your_css_name_here', get_theme_file_uri('/style.css'));
                    -->
        <?php wp_head() ?> <!-- Lesson 39 (1:36): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407836#overview -->
     
    </head>
    <body <?php body_class(); ?>>               <!-- L41 (~4:30): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407844#overview -->

    <!--L41 (9:02) we'll borrow some id and classes naming conventions from _underscores which is used in a lot of default wp themes -->
    <nav id="site-navigation" class="main-navigation" role="navigation"> <!-- role is for accessability reasons (L41 9:15) -->
        <?php 
           // Old School: wp_nav_menu(['theme_location' => 'main-menu']);
           // (L41 11:25) More common way to write this: 
           
            $args = [
                'theme_location' => 'main-menu'
            ]; 
        
            wp_nav_menu( $args ); 
        ?>
    </nav>
                                                                        