



**Best way to link to style.css** from [Z-L37 (11:34)](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407830#overview).
`get_theme_file_uri();`

In _functions.php_ use **get_theme_file_uri('/style.css');**
```
    function wphierarchy_enqueue_styles(){
        wp_enqueue_style('main-css', get_theme_file_uri('/style.css'), [], time(), 'all');
    }

add_action('wp_enqueue_scripts', 'wphierarchy_enqueue_styles');

```


**bloginfo()**  - [Z-L42 (6:10)](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407846#overview).
bloginfo( 'name' );
bloginfo( 'description' );

**home_url()** and **esc_url()**

[html]
        <p class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <!--L42 (6:10) rel=home accessibility reasons -->
                <?php bloginfo( 'name' ); ?>
            </a>
        </p>
        
        <p class="site-description">
            <?php bloginfo( 'description' ); ?>
        </p>

[/html]


**Number Formatter**
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

**END OF NUMBER FORMATTER**


`L43 (1:50)` - Article tag with dynamic id!

```php
            <article id="post-<?php the_ID(); ?>">
                
            </article>

```


**the_title()** which displays the Page/Post title
`L43 (3:06)` https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407850#overview

`<h1><?php the_title(); ?></h1>`

