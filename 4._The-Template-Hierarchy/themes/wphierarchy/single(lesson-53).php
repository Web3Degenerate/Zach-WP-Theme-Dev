<!-- Added single.php in Lesson 50: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407866#overview -->
<?php get_header() ?>
  
    <div id="primary" class="content-area"> <!-- Markup added L43: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407850#overview -->
        
        <main id="main" class="site-main" role="main">
        
               <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--L47 (0:56): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407860#overview -->
               
                    
                <?php //get_template_part( 'template-parts/content' ); ?> <!-- L48 (1:45) https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407862#overview -->
                <?php get_template_part( 'template-parts/content', get_post_format() ); ?> <!-- L53 (8:06): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview-->
          
          
          
                <?php endwhile; else : ?>
                
                <?php // NOT 'content-none' get_template_part( 'template-parts/content-none' ); ?> <!-- L48 (3:15) -->
                <?php get_template_part( 'template-parts/content', 'none' ); ?> <!-- L48 (3:15) -->
                            
                <?php endif; ?>
                
                <p>Template: single.php</p> <!--L49 (2:12) set up singular.php for page, single and attachment.php -->
  
        </main>
    
    </div>
    

    <?php //get_sidebar( 'splash' ); ?>
    <?php get_sidebar(); ?> <!--L45: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407856#overview -->



<?php get_footer() ?>

