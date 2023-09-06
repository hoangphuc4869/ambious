<?php


// function load_stylesheets() {

//     wp_register_style('reset', get_template_directory_uri() . '/src/reset.css', '',1,'all');
//     wp_enqueue_style('reset');

//     wp_register_style('custom_header', get_template_directory_uri() . '/src/header.css', '',1,'all');
//     wp_enqueue_style('custom_header');

//     wp_register_style('custom_footer', get_template_directory_uri() . '/src/footer.css', '',1,'all');
//     wp_enqueue_style('custom_footer');

//     wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '',1,'all');
//     wp_enqueue_style('stylesheet');

//     wp_register_style('custom', get_template_directory_uri() . '/src/app.css', '',1,'all');
//     wp_enqueue_style('custom');

// }
// add_action('init', 'load_stylesheets');


// function load_js() {
//     wp_register_script('custom', get_template_directory_uri() . '/src/app.js', 'jquery',1,true);
//     wp_enqueue_script('custom'); 
//     }
// add_action('init', 'load_js');


add_theme_support('menus');

register_nav_menus(
    array(
        'extended-menu' => 'extended menu',
        'menu' => 'menu',
        'menu-right' => 'menu right',
        'menu-mobile' => 'mobile'
    )
);


add_filter( 'show_admin_bar', '__return_false' );

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}


function mytheme_add_woocommerce_support() {
   add_theme_support( 'woocommerce');
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
add_theme_support("post_thumbnails");
add_theme_support("wc-product-gallery-zoom");
add_theme_support("wc-product-gallery-lightbox");
add_theme_support("wc-product-gallery-slider");

//1. add cart to check out

add_action( 'woocommerce_before_checkout_form', 'add_cart_on_checkout', 5 );
 
function add_cart_on_checkout() {
 if ( is_wc_endpoint_url( 'order-received' ) ) return;
 echo do_shortcode('[woocommerce_cart]'); // Woocommerce cart page shortcode
}

// 2. Redirect cart page to checkout
add_action( 'template_redirect', function() {
  
// Replace "cart"  and "checkout" with cart and checkout page slug if needed
    if ( is_page( 'cart' ) ) {
        wp_redirect( '/ambious/checkout/' );
        die();
    }
} );


// Redirect to home url from empty Woocommerce checkout page

add_action( 'template_redirect', 'redirect_empty_checkout' );
 
function redirect_empty_checkout() {
    if ( is_checkout() && 0 == WC()->cart->get_cart_contents_count() && ! is_wc_endpoint_url( 'order-pay' ) && ! is_wc_endpoint_url( 'order-received' ) ) {
   wp_safe_redirect( get_permalink( wc_get_page_id( 'shop' ) ) ); 
        exit;
    }
}