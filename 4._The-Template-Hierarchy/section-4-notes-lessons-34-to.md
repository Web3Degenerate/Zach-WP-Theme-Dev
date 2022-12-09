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



## Lesson 42: Adding Markup To A Theme - Part 1

[Lesson 42 in Section 4](https://www.udemy.com/course/wordpress-theme-and-plugin-development-course/learn/lecture/7407846#overview).

Adding Markup