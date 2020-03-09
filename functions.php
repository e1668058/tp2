<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
// function wp_enqueue_scripts() {
//     wp_enqueue_script( 'script', get_template_directory_uri() . '/main.js', array ( 'jquery' ), 1.1, true);
// }

function main_js() {
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/main.js', array ());
}
add_action('wp_enqueue_scripts', 'main_js');


/* Permet d'adapter la requête principale avant qu'elle ne s'exécute */ 
function extraire_evenement( $query ) {

    if (!is_home() && $query->is_category('evenements'))
    {
       $query->set( 'posts_per_page', -1 );
       $query->set( 'orderby', 'date' );
       $query->set( 'order', 'ASC' );
    }
 }
 add_action( 'pre_get_posts', 'extraire_evenement' );