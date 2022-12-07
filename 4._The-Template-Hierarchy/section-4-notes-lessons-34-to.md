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



## Setting up header.php

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