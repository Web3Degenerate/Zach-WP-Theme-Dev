        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> > <!-- L48 (1:30) Article Tags: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407862#overview -->
            
            <header class="entry-header">

            
            <?php //echo get_post_format( $post->ID ); ?>    <!--L53 (4:09): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->
             <!--<span class="dashicons dashicons-format-video"></span>-->
             <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span><!--L53 (6:59) Dynamically merge: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->
             
                <!--<h2>Using get_post_format( $post->ID ); Returns the word "<?php //echo get_post_format( $post->ID ); ?>"-->
                <!--<br>-->
                <!--Therefore, class="dashicons dashicons-format-<?php //echo get_post_format( $post->ID ); ?>"</h2>-->
     <!--dashicons-format-video in L53-->                      


                <!-- the_title() below is the same as the way we originally learned: -->
                <!--<h2><a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a></h2>-->
                
                    <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?> <!-- Pass Permalink L54 (6:30) https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407876#overview -->
                    
                    <div class="byline">
                        <?php esc_html_e( 'Author:' ); ?> <?php the_author(); ?> <!-- L50 (4:20) prefers use two php blocks, keeps space, easier see two things here -->
                    </div>
                    
                    <p>Loaded from content-posts.php</p>
                
            </header>
            
            <div class="entry-content">
                <!--<p>Lorem. </p>-->
                <?php // the_content(); ?> <!-- L53 (10:31) replace the_content with the excerpt() -->
                <?php the_excerpt(); ?>
            </div>
            
      
    
    
    <?php //removed comments in L54 11th minute: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407876#overview
    /* Tested conditional statement if comments turned off.
        if(comments_open()){
            comments_template();
        }else{
            echo '<h2>Comments have been turned off by admin senior.</h2>';
        }
    */
    ?>
    
</article>