<!--Created L53 (8:32): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->       
       
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> > <!-- L48 (1:30) Article Tags: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407862#overview -->
            
                    <header class="entry-header">
                                                                    <!--
                                                                    L47 (4:16) - INSSTEAD OF WRAPPING the_title() in h1's you can pass them in as parameters -->
                                                                    <?php //the_title('<h1>', '</h1>'); ?>
                     
             <!--dashicons-format-video in L53-->
                    <!--<span class="dashicons dashicons-format-video"></span>-->
                    <?php //echo get_post_format( $post->ID ); ?>    <!--L53 (4:09): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->
                     <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span><!--L53 (6:59) Dynamically merge: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->
                     
                        <h2>Using get_post_format( $post->ID ); Returns the word "<?php echo get_post_format( $post->ID ); ?>"
                        <br>
                        Therefore, class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"</h2>
             <!--dashicons-format-video in L53-->                      
                        
                        <p><?php esc_html_e( 'Enjoy this gallery post from content-gallery.php, added theme name 2nd parameter !!', 'wphierarchy' ); ?></p><!-- L53 (9-10th) -->
                         
                                         
                        <!--<h1><?php //the_title(); ?></h1>-->
                            <?php the_title( '<h1>', '</h1>' ); ?> <!-- Switched L50 (2:30) https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407866#overview-->
                            
                            <!--<div class="byline">-->
                                <?php //esc_html_e( 'Author:' ); ?> <?php //the_author(); ?> <!-- L50 (4:20) prefers use two php blocks, keeps space, easier see two things here -->
                            <!--</div>-->
                            
                            <p>Loaded from content-gallery.php</p>
                        
                    </header>
                    
                    <div class="entry-content">
                        <!--<p>Lorem. </p>-->
                        <?php the_content(); ?>
                    </div>
                    
               
            <?php if ( comments_open() ) : ?>  <!-- L52 (5:22)-->
                <?php comments_template(); ?><!--Added L52 (4:05): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407872#overview -->
            <?php else : ?>
                <hr>
                <b style="color:red;">Comments have been turned off by admin senior.</b>
            <?php endif; ?>
            
            
            <?php
            /* Tested conditional statement if comments turned off.
                if(comments_open()){
                    comments_template();
                }else{
                    echo '<h2>Comments have been turned off by admin senior.</h2>';
                }
            */
            ?>
            
        </article>