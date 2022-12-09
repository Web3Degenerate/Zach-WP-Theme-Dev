<!DOCTYPE html>
<html <?php language_attributes();  ?>>

<head>
   
    <meta charset="<?php bloginfo('charset');  ?>">  <!--<meta charset="utf-8">-->
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
   
   <!-- Lesson 39 (1:36): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407836#overview -->
    <!--<title>WP Hierarchy</title>-->
   
<!--
    wp_head() gives WP and via WP any plugin or theme,  
    THE ABILITY THEY WANT TO ADD ANYTHING THEY WANT 
    BEFORE THE CLOSING OF THE HEAD TAG

    Example: WP ENQUEUE STYLE FEEDS IN THROUGH wp_head() in the header.php template.
        wp_enqueue_style('your_css_name_here', get_theme_file_uri('/style.css'));
-->
    <?php wp_head() ?>
 
</head>
<body <?php body_class(); ?>>               <!-- L41 (~4:30): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407844#overview -->
    
    <header class="site-header">
      <div class="container">
        <h1 class="school-logo-text float-left">
          <a href="<?php echo site_url(); ?>"><strong>HackinWP</strong> Starter Theme</a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        
        
        <div class="site-header__menu group">
          <nav class="main-navigation">

                        <ul>
                                                            <!--RETURNS ID OF CURRENT PAGE-->
                          <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 22) echo ' class="current-menu-item"' ?> >
                              <a href="<?php echo site_url('/about-us'); ?>">About Us</a>
                          </li>
                          
                          <li <?php if (get_post_type() == 'program') { echo ' class="current-menu-item"'; } ?>>
                              <a href="<?php //echo site_url('/programs'); 
                                    echo get_post_type_archive_link('program');  ?>">
                                Programs
                              </a>
                          </li>
                              
                          
                          <li <?php if (get_post_type() == 'event' OR is_page('past-events')) { echo ' class="current-menu-item"'; } ?>>
                              <a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a>
                          </li>
                          
                          <li <?php if (get_post_type() == 'campus') { echo ' class="current-menu-item"';} ?>>
                              <a href="<?php echo get_post_type_archive_link('campus'); ?>">Campuses</a></li>
                              
                          <li <?php if (get_post_type()== 'post') echo ' class="current-menu-item"' ?> >
                              <a href="<?php echo site_url('/blog'); ?>">Blog</a>
                          </li>
                          
                          <li>
                              <a href="https://player.siriusxm.com/enhanced-edp/page-name%3Dedp_show_enhanced&showGuid%3D443086b1-9623-e5b8-62ea-593445d1a53a&channelGuid%3D66e0c959-ced8-2958-5d2c-c19ca4f770a4" target="_blank">Ratcliffe</a>
                          </li>
                        </ul>
                        
                        
          </nav>
        </div>
        
       
      </div>
    </header>    
    
    
                                                                        