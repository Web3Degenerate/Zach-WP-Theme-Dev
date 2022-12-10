
<footer>
    
    <nav class="nav-list">
    <!--LOCATION OF FOOTER TWO MENU (Lesson 20) -->
            <?php
            // END OF LESSON 20 -Go back to hard coded menu:
                    // wp_nav_menu(array(
                    //     'theme_location' => 'footerLocationTwo'
                        
                    // )); 
            ?>          
                <ul>
                  <li><a href="#">Legal</a></li>
                  <li><a href="<?php echo site_url('/privacy-policy'); ?>">Privacy</a></li>
                  <li><a href="#">Careers</a></li>
                  <li>Copyright (C) 2022</li>
                </ul>
                
  </nav>
    
    
</footer>


<?php wp_footer(); ?>

           </div>  <!--Closing #content Div created in header.php -->
            
    </div> <!--Closing #page ID Div created in header.php -->

</body>
</html>