## Assignment 2: Custom WordPress Theme

### WordPress Theme Structure & Architecture

WordPress themes have two essential files: style.css and index.php. After that, there are other common files such as header.php, footer.php, functions.php, and single.php, however the structure and location of these files varies greatly. Working on this project I referenced the layout of other themes (such as the included twentytwentyfive/twentytwentyfour themes) and found each had a slightly varying structure.

### The Loop & Template Tags

The loop is used to go through and display post content from the WordPress database, while template tags are functions used within (or sometimes outside) the loop itself to retrieve and display specific pieces of content.
have_posts() checks for posts and the_post() is used to set global post data.
