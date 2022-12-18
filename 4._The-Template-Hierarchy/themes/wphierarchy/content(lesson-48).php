<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> > <!-- L48 (1:30) Article Tags: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407862#overview -->
            
            <header class="entry-header">
            <!--
            L47 (4:16) - INSSTEAD OF WRAPPING the_title() in h1's you can pass them in as parameters -->
            <?php //the_title('<h1>', '</h1>'); ?>
     
                    <h1><?php the_title(); ?></h1>
                    <p>Loaded from content.php</p>
                
            </header>
            
            <div class="entry-content">
                <!--<p>Lorem. </p>-->
                <?php the_content(); ?>
            </div>

</article>