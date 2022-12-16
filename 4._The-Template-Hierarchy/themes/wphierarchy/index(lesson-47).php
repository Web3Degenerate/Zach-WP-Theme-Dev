<?php// get_header( 'splash' ) /*L37 (5:15) */ ?>
<?php get_header() ?>
  
    <div id="primary" class="content-area"> <!-- Markup added L43: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407850#overview -->
        
        <main id="main" class="site-main" role="main">
        
               <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!--L47 (0:56): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407860#overview -->
               
                    
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                                
                                        <header class="entry-header">
                                        <!--
                                        L47 (4:16) - INSSTEAD OF WRAPPING the_title() in h1's you can pass them in as parameters
                                        <?php //the_title('<h1>', '</h1>'); ?>
                                        
                                        
                                        -->
                                                <h1><?php the_title(); ?></h1>
                                                <p>Loaded from index.php</p>
                                            
                                        </header>
                                        
                                        <div class="entry-content">
                                            <!--<p>Lorem. </p>-->
                                            <?php the_content(); ?>
                                        </div>
                
                            </article>
          
                <?php endwhile; else : ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                                    <header class="entry-header">
                                        
                                            <h1><?php esc_html_e('404', 'wphierarchy' );  ?></h1>
                                            
                                    </header>
                                    
                                    <div class="entry-content">
                                        <p><?php esc_html_e('Sorry! No Content Found.', 'wphierarchy' ); ?></p>
                                        
                                    </div>
                                        
                            </article>
            
                <?php endif; ?>
  
        </main>
    
    </div>
    

    <?php //get_sidebar( 'splash' ); ?>
    <?php get_sidebar(); ?> <!--L45: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407856#overview -->

<?php get_footer() ?>

