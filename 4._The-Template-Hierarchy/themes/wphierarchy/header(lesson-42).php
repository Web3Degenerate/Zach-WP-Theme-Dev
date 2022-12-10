<!DOCTYPE html>
<html <?php language_attributes();  ?>>

    <head>
       
        <meta charset="<?php bloginfo('charset');  ?>">  <!--<meta charset="utf-8">-->
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">  <!-- L42 (1:35) profile link can help with Meta Data: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407846#overview -->
      
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

    
        <div id="page"> <!-- L42 (2:11) wrap nav in div with id page: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407846#overview -->
               
               <a href="#content" class="skip-link screen-reader-text"> <!-- L42 (2:20) - Add link to skip to the main content. (create div with id='content' below). Helps w/ accessability -->
                                    <!--Tell it what theme handle is so translators can work with it? L42 (3:07) -->
                   <?php esc_html_e( 'Skip To Main Content', 'wphierarchy' );  ?> <!-- L42 (2:48) esc_html_e echos out the content for our link -->
               </a>         
            
                <header id="masthead" class="site-header" role="banner"> <!-- L42 (3:25) -->
                
                        <div class="site-branding">
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <!--L42 (6:10) rel=home accessibility reasons -->
                                        <?php bloginfo( 'name' ); ?>
                                    </a>
                                </p>
                                
                                <p class="site-description">
                                    <?php bloginfo( 'description' ); ?>
                                </p>
                            
                        </div>
                        
                            <nav id="site-navigation" class="main-navigation" role="navigation"> <!-- role is for accessability reasons (L41 9:15) https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407844#overview --> 
                                <?php   // (L41 11:25) More common way to write this: // Old School: wp_nav_menu(['theme_location' => 'main-menu']);
                                    $args = [
                                        'theme_location' => 'main-menu'
                                    ]; 
                                
                                    wp_nav_menu( $args ); 
                                ?>
                            </nav>
                        
                    </header>   
                    
                    <div id="content">
                        
                    <!--</div> Closing #content Div moved to Footer -->
                
        <!--</div> Closing #page ID Div moved to Footer -->
        
        
        
        
        
        
        