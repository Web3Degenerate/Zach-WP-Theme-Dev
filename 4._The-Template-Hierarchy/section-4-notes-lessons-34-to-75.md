# Section 4: The Template Hierarchy

## Overview of Plugin Developmet covered in Sections 23, 24 and 25 

### Lesson 115: Introduction to Plugin Development

Display the results from our new CUSTOM API in section 15.


[Lesson 34 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407820#overview).


## Page Fallbacks
1- page.php
2- singular.php
index.php


## Posts Fallbacks
1- single.php
2- singular.php
3 - index.php

## Required Template Files
1- index.php
2- style.css
3- functions.php

**index.php is the default fall back for all templates** which is why _index.php is required for all themes_. 

Theoretically you could build a theme with index.php as one of your only template files.

**style.css** and **functions.php** are not technically template files, but they are **REQUIRED** in themes



**Carryover Brad Pro Tip** when displaying text from our database, always wrap it in **esc_html()**

So in this line here: 
```
$html = '<h3>' . esc_html(get_option('wcp_headline', 'Post Statistics From createHTML')) . '</h3><p>';
```



```
<!--ADDED L31 (5:32)-->
		<div class="custom-footer">
		                            <!--Second paramter has to be the Text Domain of Theme in Style.css L31 (5:38)-->
		    <?php esc_html_e( 'Custom footer text', 'test-starter-theme'); ?>
		</div>
<!--ADDED L31 (5:32)-->	
```


## Setting Up our Theme

[Lesson 35 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407822#overview).

1. Add in dummy content from wptest.io
2. Create _"Portfolio"_ Custom Post Type (CPT UI)
3. Create a "wphierarchy" theme folder
4. Create style.css, functions.php and index.php
5. screenshot


**Uploading Dummy Data From WPTest.io** we increased the post_max_size in cPanel **MultiPHP INI Editor** from 8MG to 25 MG. 
Zipped files were 24.5 MB

Next Error Message while trying to use Import WP: 
```
Sorry, there has been an error.
This does not appear to be a WXR file, missing/invalid WXR version number
```

Per the [WPTest.io Docs](https://github.com/poststatus/wptest/blob/master/README.md). upload the **wptest.xml** file.

Follow these steps: 
1. Download the [data](https://github.com/manovotny/wptest/archive/master.zip) from the repository.
- Unzip the download on your computer.
- Launch your WordPress site.
- Navigate to `Tools > Import` in the WordPress admin.
- Click on `WordPress` and install the [WordPress Importer](http://wordpress.org/extend/plugins/wordpress-importer/) plugin, if it's not already installed, and click `Activate Plugin & Run Importer` after the installation completes.
- Choose the `wptest.xml` file you extracted from the zip in Step 2 and click `Upload file and import`.
- On the next screen, *do not change or reassign anything about the authors* and make sure you check the `Download and import file attachments` box before you click `Submit`.
- Let the import process run until complete. *Do not close the browser tab / window or navigate away from page while importing.* You should see an `All done. Have fun!` message when the import is complete.



`L35 (2:55)` We set up the Custom Post Type `Portfolio` via **Custom Post Type UI** by _WebDevStudios_

Then install the custom field for **URL** which is just a text field using **ACT** from *WP Engine*. 



**CSS Style Sheet Borrowed From Zac**


/* https://developer.wordpress.org/themes/basics/main-stylesheet-style-css/  

the tags are a limited number of tags made available by WP. Users search predefined tags made available on WP.
*/

# ATOM HAS A WP FUNCTION PACKAGE - atom-wordpress which provides a collection of all wordpress functions for atom. Author: AminulBD or AminuiBD 



## Functions.php and add_theme_support()

[Lesson 37 in Section 4](#).

1. Use 
2. add_theme_support() [WP documentation](#).



## Setting up header.php - Lesson 39

[Lesson 39 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407836#overview).

1. Use wp_head() in your header.php so any plugin or theme can inject code before the closing header tag (L39 1:38)
2. 


**wp_head()** is what let's us call our css in _functions.php_ in our `wp_enqueue_scripts`

```
function wphierarchy_enqueue_styles() {
     wp_enqueue_style('main-css', get_style_sheet_directory_uri() . '/style.css', [], time(), 'all' );  
}

add_action('wp_enqueue_scripts', 'wphierarchy_enqueue_styles');

```

And allows us to dynamically add the `title-tag` support in **add_theme_support**

```
add_theme_support( 'title-tag' ); 

```

**Our header.php**

```
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <!-- Lesson 39 (1:36): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407836#overview -->
      <!--<title>WP Hierarchy</title>-->
      
<!--
    wp_head() gives WP and via WP any plugin or theme,  
    THE ABILITY THEY WANT TO ADD ANYTHING THEY WANT 
    BEFORE THE CLOSING OF THE HEAD TAG

-->
    <?php wp_head(); ?>
 
</head>
<body>

```


# The importance of properly loading style.css to the wp_head() call

We had to use **get_theme_file_uri()** to link to our style.css. 

When we tried **get_style_sheet_directory_uri()** (L37 10:20) we got the white screen of death.

Solution: 
```
        wp_enqueue_style('main-css', get_theme_file_uri('/style.css'));
        // wp_enqueue_style('main-css', get_style_sheet_directory_uri() . '/style.css', [], time(), 'all' ); 
```

![wp_enqueue_scripts and wp_head connection](https://i.imgur.com/3MKwsR8.png)




Lesson 39 (5:15) - **get_header()** to call a specific splash version of our header. 

passing the `splash` string as a parameter to *get_header()* function will look for **header-splash.php**
```
<?php get_header( 'splash' ) ?>

```

**if WordPress can't find header-splash.php it will default back to our original header, header.php** (5:48)





## Lesson 40: Footers in WP

[Lesson 40 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407838#overview).

In **index.php** remove closing body and html tags and replace it with 

`<?php get_footer() ?>`

Then in **footer.php**, the basic requirement to load the Admin toolbar across the top of site when logged in, simply add: 

`<?php wp_footer() ?>`, which appears to opperate in a similar fashion to **wp_head()** above. 

Basic requirement for an **"Empty Footer"** when a client asks to _"Just remove the footer on this page"_ would be the following: 

Imagine creating this custom footer for client on his calender page: 
**<?php get_footer( 'calendar' ); ?>**
Then loading this file as `footer-calendar.php`:
```
<?php wp_footer(); ?>
    </body>
</html>

```
(_also use conditional logic checking the page ID to load footer-calendar perhaps_)




**Through WP function wp_footer(), WordPress loads the javascript for us to enable things like the admin bar at top**

## Lesson 41: Adding Menus and body_class

[Lesson 41 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407844#overview).

1. register_nav_menus()
2. wp_nav_menu()
3. body_class()


**register_nav_menus()** 

[WP Codex on register_nav_menus](https://developer.wordpress.org/reference/functions/register_nav_menus/).

[WP Codex on register nav menus](https://developer.wordpress.org/reference/functions/register_nav_menus).


After we register `register_nav_menus()` in **functions.php** we can call the menu in our template.

WP Docs shows related functions. 
In this case, the single version for just ONE menu is [register_nav_menu](https://developer.wordpress.org/reference/functions/register_nav_menu/).
![register_nav_menu related function](https://i.imgur.com/iuKNLf2.png)


**AFTER WE REGISTER OUR MENU(S)**
We call our menu in our template with **wp_nav_menu**

See all available array options for `wp_nav_menu`:
https://developer.wordpress.org/reference/functions/wp_nav_menu/


`Lesson 41 (1:45)` Zac has a jist MORE INFO on the possible parameters we can use with `wp_nav_menu` than the codex.
https://gist.github.com/zgordon/1ce2f7fc29f45665a8ffc22d64e220b1


`Lesson 41 (4:24)` **body_class()**
https://developer.wordpress.org/reference/functions/body_class/

We're not going pass any info to. Goes in the header and gives us a bunch of data.

VERY HELPFUL (especially for css) 

Place body_class() inside our body tag and it gives us informaiton like, what page we are on, what template we are using, user logged in/out.

[html]
<body <?php body_class(); ?>>
<!--which would return something like this:  -->
<body class="page page-id-2 page-parent page-template-default logged-in">
[/html]

[Markdown php code](https://stackoverflow.com/questions/21729960/how-do-i-use-syntax-highlighting-in-php-within-a-markdown-github-gist).


```php
    //Classic example from WP Codex:
    register_nav_menus( array(
        'pluginbuddy_mobile' => 'PluginBuddy Mobile Navigation Menu',
        'footer_menu' => 'My Custom Footer Menu',
    ) );
```


```php
    //In functions.php after we load our CSS in wp_enqueue_scripts


    //To register multiple menus we'd do something like this: 
    register_nav_menus( [
        'main-menu' => esc_html__( 'Main Menu', 'wpheirarchy'),
        'footer-menu' => esc_html__( 'Footer Menu', 'wpheirarchy')
        
        ]
    );
```

L41 (9:02) - we'll add **wp_nav_menu()** just after the body tag in our **header.php**. 

Traditional way to add our menu parameters in an array parameter to `wp_nav_menu()`:
```php
    <nav id="site-navigation" class="main-navigation" role="navigation"> 
        <?php 
            wp_nav_menu([
                'theme_location' => 'main-menu'
            ]); 
        ?>
    </nav>
```

More common way is to setup the array separately and save it to variable **$args** by convention. 
Then pass the `$args` to our WP function as the **array parameter**, in this case `wp_nav_menu`.
```php
    <nav id="site-navigation" class="main-navigation" role="navigation"> <!-- role is for accessability reasons (L41 9:15) -->
        <?php 
           // Old School: wp_nav_menu(['theme_location' => 'main-menu']);
           // (L41 11:25) More common way to write this:           
            $args = [
                'theme_location' => 'main-menu'
            ]; 
        
            wp_nav_menu( $args ); 
        ?>
    </nav>
```

L41 (11:40) - In the WP Customizer, create a `Main Menu` and add the location to our _Main Menuz_. 
![create a main menu](https://imgur.com/xzCRuvG.png)

Then ADD the following pages to our Main Menu: 
1. Sample Page
2. Parent Page with two Children Pages
3. Blog Page

Finally, make the Homepage a Static Page (Home). 
You can do this via the `Customizer => Homepage Settings => Static Page (Home)`





## Lesson 42: Adding Markup To A Theme - Part 1 (header.php)

[Lesson 42 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407846#overview).

Adding Markup


L42 (1:35) - In **header.php** we added a _profile link_ which (controversial?) may help with meta data.
```php
 <link rel="profile" href="http://gmpg.org/xfn/11">  <!-- L42 (1:35) profile link can help with Meta Data -->
```

`L42 (4:45)` - use **bloginfo()** template tag to display title.

`bloginfo()` allows us to grab WP data like NAME of site, DESCRIPTION etc.

```php

<p class='site-title'><?php bloginfo('name'); ?></p>


```

Then use **esc_url()** to protect our WP function **home_url('/')** in our href around our site's title

```php
<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>

```

SAVE WHEN RESUME NEXT

```php

                <header id="masthead" class="site-header" role="banner"> <!-- L42 (3:25) -->
                
                    <div class="site-branding">
                        <p class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <!--L42 (6:10) rel=home accessibility reasons -->
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </p>
                    </div>

```



## Lesson 43: Adding Markup To A Theme - Part 2 (index.php)

[Lesson 43 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407850#overview).


`L43 (1:50)` - Article tag with dynamic id!

```php
            <article id="post-<?php the_ID(); ?>">
                
            </article>

```


Similar to **body_class()** there is a **post_class()** which will do the same thing has body_class();

```php

//Don't do this:
<div class="<?php body_class(); ?>"> </div>
<div class="<?php post_class(); ?>"> </div>

// DO this: 
<div <?php body_class(); ?> > </div>
<div <?php post_class(); ?> > </div>

```


Add dynamic title `L43 (3:06)` with **the_title()** which displays the Page/Post title

`<h1><?php the_title(); ?></h1>`




### Lesson 44: Just a Quick Note; Minor Changes

Closing #Content Div in the footer placed BELOW footer tag caused it to be displayed as a right hand column


![#Content Div Below Footer Tag](https://i.imgur.com/S6IR8A5.png)

Moving the #Content Div ABOVE the <footer> tag fixed the problem and moved the footer content back down where it was supposed to be: 

![#Content Div Above Footer Tag](https://i.imgur.com/VsJas1H.png)




## Lesson 45: Working With Sidebars in WordPress

[Lesson 45 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407856#overview).


`sidebar.php`
`sidebar-custom.php`

`L45 (1:45)` - Add **get_sidebar()** in **index.php** right after our `primary div`.

```php
    <?php get_sidebar(); ?>
```

Then in **sidebar.php** add an aside tag with ID secondary

```php

    <aside id="secondary" class="widget-area" role="complementary">
        
            <p>Place Widgets Here!</p>
        
    </aside>

```

This creates the standard right-side widget column: 
![Sidebar](https://i.imgur.com/es9nY76.png)

We can set up a sidebar-splash page the same way we did with header and footer: 
`<?php get_sidebar( 'splash' ); ?>`


## Lesson 46: Adding Widget Areas in WordPress

[Lesson 46 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407858#overview).


1. `register_sidebar()`
2. `is_active_sidebar()`
3. `dynamic_sidebar()`

**register_sidebar()** is really registering a **widget area**. 

[register_sidebar() WP Docs](https://developer.wordpress.org/reference/functions/register_sidebar/).

[Zac's better version of register_sidebar()](https://gist.github.com/zgordon/c78b35b91b363624e08ccecf151b841b).


```php

<?php
  register_sidebar( [
    'name'          => esc_html__( 'Sidebar', 'themename' ),
    'id'            => 'main-sidebar',
    'description'   => esc_html__( 'Add widgets here.', 'themename' ),
    'before_widget' => '<section class="widget">',
    'class'         => 'custom-widget-area',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ] );

?>


```

`L46 (2:16)` - is_active_sidebar() - conditional tag to check if exists

`dynamic_sidebar()` - ??

**Set up Widget Areas in Functions.php**  at `L46 (3:52)`


Working with `index` `functions` and `sidebar.php`


### Lesson 46 Homework Brings it all together: 

```php

//In Functions.php:
// Set up Widget Areas - Lesson 46: (4:01): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407858#overview
function wphierarchy_widgets_init(){
    register_sidebar([
        'name' => esc_html__( 'Main Sidebar', 'wphierarchy'),    //name and namespace for our theme in style.css cmt
        'id' => 'main-sidebar',
        'description' => esc_html__( 'Add widgets for main sidebar here', 'wphierarchy'),
        'before_widget' => '<selection class="widget">',
        'after_widget' => '</selection>',
        'before_title' => '<h2 class="widget-title>',
        'after_title' => '</h2>'
    ]);
 
 //The key is the id 'footer-sidebar'
    register_sidebar([
        'name' => esc_html__( 'Footer Sidebar', 'wphierarchy'),    //name and namespace for our theme in style.css cmt
        'id' => 'footer-sidebar',
        'description' => esc_html__( 'Add FOOTER widgets for FOOTY sidebar here', 'wphierarchy'),
        'before_widget' => '<selection class="widget">',
        'after_widget' => '</selection>',
        'before_title' => '<h2 class="widget-title>',
        'after_title' => '</h2>'
    ]);    
    
    
}

add_action( 'widgets_init', 'wphierarchy_widgets_init');

```

Then create **sidebar-footer.php**

Following the same tempalte, use our footer sidebar id in the **is_active_sidebar()** and **dynamic_sidebar()**

```php
    <?php
        //From L46 9:43: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407858#overview
    // ERROR CHECK FOR dynamic_sidebar()
        if( ! is_active_sidebar( 'footer-sidebar') ){  //is main-sidebar not active
            return; //stops right here, so doesn't throw error in dynamic_sidebar
        }      
    ?>

    <aside id="secondary" class="widget-area" role="complementary">
        
            //<!--<p>Place Widgets Here!</p> Lesson 46 (10:33) replace with dynamic sidebar-->
            <?php
                /*  With our !is_active_sidebar() check at the top of the page
                    we can safely assume we can load our dynamic sidebar without throwing errors
                */
            dynamic_sidebar( 'footer-sidebar' ); ?>       
    </aside>
```




FINALLY, we are ready to call in our **footer sidebar** by passing the _footer_ name to our **index.php** template:

**sidebar.php** is called with __get_sidebar()__ *get_sidebar()*

Any other customization (like **sidebar-footer.php**) is called with *get_sidebar(**'footer'**)*

```php
        <footer id="colophon" class="site-footer" role="contentinfo">
            
                <a href="<?php echo esc_url( __( 'https://wordpress.org', 'wphierarchy' ) ); ?>">
                    <?php printf( esc_html__( 'Proudly powered by %s', 'wphierarchy'), 'WordPress' ); ?>
                    
                </a>
    
          <?php get_sidebar('footer'); ?>  
               
        </footer>
```







## Lesson 47: Working With The Loop

[Lesson 47 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407860#overview).


**Add the loop to our static mark up around anything that will be repeated**

On our **index.php** template, our article tag will be repeated for however many (qualifying) articles we have. 


**Core Skeleton in Lesson 47 index.php** _See_ *index(lesson-47).php*
```php
 <?php if( have_posts() ) : while ( have_posts() ) : the_post();  ?>
 // If Posts
 // While Posts exist
 // THE post, grabs the data for the actual post so we can use it in our display.

<?php endwhile; else : ?>


<?php endif; ?>

```

See [Lesson 47 index.php](https://github.com/Hostnomics/Zach-WP-Theme-Dev/blob/main/4._The-Template-Hierarchy/themes/wphierarchy/index(lesson-47).php).





## Lesson 48: Creating Content Includes (Modular Files)

[Lesson 48 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407862#overview).


Break out our __index.php__ logic into it's component parts with includes. 


Pull out the WP loop code we added to index.php into a separate file, content.php using **get_template_part()**. 


Pull the code in the article tags in **index.php** and move to **template-parts/content.php**

```php

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

```

Then in **index.php** we reference the article tag in **template-parts/content.php** with: 

```php

<?php get_template_part( 'template-parts/content' ); ?> // L48 (1:45) 

```
For our second article tags removed to **template-parts/content-none.php**, we account for the dash in our php file like this: 

```php
                     // NOT 'template-parts/content-none' 
<?php get_template_part( 'template-parts/content', 'none' ); ?> // L48 (3:15)

```




## Lesson 49: Working With singular.php template

[Lesson 49 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407864#overview).


**TEMPLATES WHICH FALL BACK TO** **_singular.php_**:

1. page.php
2. single.php
3. attachment.php

Default to **singular.php** and then to **index.php**.

Set up singular.php which was a duplicate of our index.php as of L49. This loads page.php and single.php, but not templates like **blog**, **categories** or **archives**

Set up Categories and Archives in Main Sidebar: 
- customizer -> widgets -> categories
- customizer -> widgets -> archives


If your singular.php template layout is the same as index.php you don't need singular.

**Example**: You could use singular.php if your page.php layout is different than your acrhive page template.

If your posts and pages are the same then you can use singular.php





## Lesson 50: Working With single.php template

[Lesson 50 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407866#overview).

**Updates**
- created **content-page.php** in template-parts.
- updated **singular.php** to use _template-parts/content-page_ 

- created **single.php** for single posts which will use _template-parts/content_: 

```php
        <main id="main" class="site-main" role="main">
        
               <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
               
                    
                <?php get_template_part( 'template-parts/content' ); ?> 
          
                <?php endwhile; else : ?>
                
                <?php // NOT 'content-none' get_template_part( 'template-parts/content-none' ); ?> 
                <?php get_template_part( 'template-parts/content', 'none' ); ?> 
                            
                <?php endif; ?>
                
                <p>Template: single.php</p> <!--L49 (2:12) set up singular.php for page, single and attachment.php -->
  
        </main>
```

content.php => posts (single.php)
content-page.php => pages/attachments (singular.php)


In content.php (single.php / posts) we'll add a byline and use **esc_html_e()** so our text can be translated: 

```php
    <div class="byline">
        <?php esc_html_e( 'Author:' );  ?>
    </div>
```


### Lesson 51 mini-update on [single-post.php](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407868#overview).

[Lesson 51 on single-post.php](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407868#overview).


We'd use single-post.php to differentiate a template from a CUSTOM POST TYPE, like post-portfolio.php:
![single-post.php vs custom post type](https://i.imgur.com/oJylqYq.png)



## Lesson 52 Working With comments.php 

[Lesson 52 on comments.php](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407872#overview).



Recommends using an existing template for **comments.php**

Pull in our comments.php template with WP template tag **comments_template()** 

If the user turns off comments in **posts => discussion => Allow Comments** we can remove **the ability to add comments** (_and removes all previous comments_) by wrapping our comments_template() tag in an if statement checking if **comments_open()** evaluates to true. 


```php
    <?php if ( comments_open() ) : ?>  <!-- L52 (5:22)-->
        <?php comments_template(); ?><!--Added L52 (4:05) -->
    <?php endif; ?>

```

Added conditional statement in red that comments are turned off: 

```php
    <?php if ( comments_open() ) : ?>  <!-- L52 (5:22)-->
        <?php comments_template(); ?><!--Added L52 (4:05): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407872#overview -->
    <?php else : ?>
        <hr>
        <b style="color:red;">Comments have been turned off by admin senior.</b>
    <?php endif; ?>
```



## Lesson 53 Working With Post Formats in WordPress

[Lesson 53 on Post Formats](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview).

- We'll be using: 
    - **get_template_part()**
    - **get_post_format()**

content-format.php
single.php


Reference: [Post Formats documentation](https://developer.wordpress.org/themes/functionality/post-formats/).


Add **post-formats** support in **functions.php**: 

```php
function wphierarchy_setupz(){
        // L37 (5:17) - Add the theme support we'll need. 
        // Add catchall theme support for everything for now
        //TYPO, NOT post_format it's post-formats
        // add_theme_support( 'post_format', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'] );
        add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'link', 'quote', 'image', 'video'. 'status', 'audio', 'chat' ) );
}

add_action('after_setup_theme', 'wphierarchy_setupz'); 

```

Then the Post format options appear on the right hand column when editing an individual post. 

In **single.php** via **template-parts/content.php** we'll pull in the *get_post_format()* in the header, just before
the_title('<h1>', '</h1>'); 

```php

<?php echo get_post_format(); ?>

```

On a post in **category** _Gallery_ we'll select 'Gallery' post type in the right hand coloumn: 
![gallery post format selection](https://i.imgur.com/3QLXI2C.png)



**Cool use of dashicons dynamically** added to **template-parts/content.php** in L53 (7th minute)

```php
                     <!--dashicons-format-video-->
                    <span class="dashicons dashicons-format-video"></span>
                    <?php //echo get_post_format( $post->ID ); ?>    <!--L53 (4:09): https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->
                     <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span><!--L53 (6:59) Dynamically merge: https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407874#overview -->
                    
                        <h2>Using get_post_format( $post->ID ); Returns the word "<?php echo get_post_format( $post->ID ); ?>"
                        <br>
                        Therefore, class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"</h2>

```


In **single.php** we'll edit our `get_tmeplate_part('template-parts/content');`

`get_tmeplate_part('template-parts/content', get_post_format() );`

This will look for content-gallery, or content-video, and **if none is found, it will default back to just content.php**
(L53 8:15)


Around (L53 9th min) we created **content-gallery.php** and tested that a specific gallery POST is loading with our 
_content-gallery.php_ template, such as our !(tiled post example.)[https://hackinwp.com/starter-theme/2013/03/15/tiled-gallery/?preview_id=1031&preview_nonce=cd770edcb0&preview=true]




**Lesson 53 Assgmt**: Create another template for **content-video.php** and consider different styling as used by 
![WP Twenty Thirteen Theme.](https://wordpress.com/theme/twentythirteen)

Files updated in Lesson 53: 
1. functions(lesson-53).php
2. content(lesson-53).php
3. content-gallery(lesson-53).php
4. single(lesson-53).php



We call the **content type** with `get_post_format( $post->ID );`


**Lesson 53 Homework - Create Another Content Type**
We created a custom content type for V-I-D-E-O, by creating the `template-parts/content-video.php` template and manually changing: 
```php
<p><?php esc_html_e( 'Enjoy this gallery post from content-gallery.php, added theme name 2nd parameter !!', 'wphierarchy' ); ?></p><!-- L53 (9-10th) -->

<p>Loaded from content-gallery.php</p>

```
But this is where you'd add your separate styling. 

See the [Twenty Thirteen Theme From Wordpress.com](https://wordpress.com/theme/twentythirteen).


## Lesson 54 The home.php for the Blog Homepage (Groups of blog posts)

[Lesson 54 on Blog Homepage](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407876#overview).


Right now we don't have `home.php` so when we set the _Front page displays_ to **static page**, it will default to **index.php**

`home.php` => `index.php` 


Use `wp_title()` to dynamically display title
```php
<h1><?php wp_title( '' ); //pass empty string to get rid of default arrows » Blog ?></h1>

```
WP Docs on `wp_title()`: [wp_title documentation from WordPress](https://developer.wordpress.org/reference/functions/wp_title/).


L43 (4:43): We'll create a `content-posts.php` template to handle the way our posts are displayed on the **blog** page so we can customize the title (linking to the post), controlling layout. 

