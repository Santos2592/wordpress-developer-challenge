<?php
function theme_styles () {
    wp_enqueue_style( 'vt-flex-main','https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css');
    wp_enqueue_style( 'vt-slick','//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style( 'vt-styles-main', get_theme_file_uri('style.css'));
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' );
    wp_dequeue_style( 'dashicons' );
    wp_dequeue_style( 'storefront-gutenberg-blocks' );
}

function theme_scripts() { 
    wp_enqueue_script( 'vt-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
    wp_enqueue_script( 'vt-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
    wp_enqueue_script( 'vt-script', get_theme_file_uri('script.js'), array(), false, true);
}

add_action( 'wp_enqueue_scripts', 'theme_scripts');
add_action('wp_enqueue_scripts', 'theme_styles');
add_theme_support('post-thumbnails');