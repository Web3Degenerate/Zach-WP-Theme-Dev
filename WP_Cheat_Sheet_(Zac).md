



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


