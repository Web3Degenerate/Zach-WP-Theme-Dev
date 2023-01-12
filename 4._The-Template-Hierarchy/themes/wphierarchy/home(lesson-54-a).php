<?php// created/imported form index.php in L53 (1:39): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407876#overview ?>
<?php get_header() ?>
  
    <div id="primary" class="content-area"> <!-- Markup added L43: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407850#overview -->
        
        <main id="main" class="site-main" role="main">
            
            <!-- L53 (2:21) WP Docs for wp_title() https://developer.wordpress.org/reference/functions/wp_title/  -->
            
            <h1><?php wp_title( '' ); //pass empty string to get rid of default arrows » Blog ?></h1>
        
               <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--L47 (0:56): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407860#overview -->
               
                    
                <?php get_template_part( 'template-parts/content' ); ?> <!-- L48 (1:45) https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407862#overview -->
          
                <?php endwhile; else : ?>
                
                <?php // NOT 'content-none' get_template_part( 'template-parts/content-none' ); ?> <!-- L48 (3:15) -->
                <?php get_template_part( 'template-parts/content', 'none' ); ?> <!-- L48 (3:15) -->
                            
                <?php endif; ?>
                
                <p>Template: home.php</p> <!--L53 2nd minute update-->
  
        </main>
    
    </div>
    

    <?php //get_sidebar( 'splash' ); ?>
    <?php get_sidebar(); ?> <!--L45: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407856#overview -->

<?php get_footer() ?>

