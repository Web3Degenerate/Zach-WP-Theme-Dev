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




