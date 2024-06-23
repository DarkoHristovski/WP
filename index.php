<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @subpackage opernturm
 * @since 1.0.0
 */


 get_header();
 if(is_single()){
    get_website_contents();
    if(have_posts()){
        get_template_part('template-parts/partials/news-header');
        get_template_part( 'template-parts/partials/news-meta' );
    }
 }else{
    get_website_contents();
 }

 get_footer();