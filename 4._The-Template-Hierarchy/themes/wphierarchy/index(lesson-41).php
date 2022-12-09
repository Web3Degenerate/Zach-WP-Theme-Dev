<?php// get_header( 'splash' ) /*L37 (5:15) */ ?>
<?php get_header() ?>
  
  <hr> 
    <h2>Loaded from index.php</h2>
    
    <?php
    
        $display_current_time = time(); 
        
    
        $judge_tracker = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $display_10_year = $judge_tracker->format(2117520000000);
        
        $judge_short_tracker = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $display_2_year = $judge_short_tracker->format(2117647058);
        
    
    ?>
    
<hr>    
    <h2>time() returns: <?php echo $display_current_time; ?></h2>
    
<hr>
    <h3>Two Year Return: <?php echo $display_2_year; ?></h3>
    <h3>Ten Year Return: <?php echo $display_10_year; ?></h3>
    



<?php get_footer() ?>

<!--    </body>-->
<!--</html>-->