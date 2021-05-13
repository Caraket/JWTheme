<?php

// Load Styelsheets
function load_css() {

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'load_css');

// Load Scripts
function load_js() {
    wp_enqueue_script('jquery');
    
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);

    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'load_js');


// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');


//Menus

register_nav_menus( array(
    'top-menu' => 'Top Menu Location',
    'footer-menu' => 'Footer Menu Location', 
) );


// Custom image sizes
add_image_size('featured-large', 1920, 1280, true);
add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);


// Register Sidebars
function my_sidebars() {

    register_sidebar(

        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )

    );
    register_sidebar(

        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )

    );


}

add_action('widgets_init', 'my_sidebars');


// function my_post_type() {

//     $args = array(
//         'labels' => array(
//             'name' => 'Cars',
//             'singular_name' => 'Car',
//         ),
//         'hierarchical' => true, // True acts more like a page and false acts more like a post
//         'public' => true,
//         'has_archive' => true,
//         'menu_icon' => 'dashicons-car',
//         'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
//         //'rewrite' => array('slug' => 'cars'),
//     );

//     register_post_type('cars', $args);


// }
// add_action('init', 'my_post_type' );

// Taxonomy Support
// function my_taxonomy() {

//     $args = array(

//         'labels' => array(
//             'name' => 'Brands',
//             'singular_name' => 'Brand',
//         ),
//         'public' => true,
//         'hierarchical' => true,
//     );

//     register_taxonomy('brands', array('cars'), $args);


// }
// add_action('init', 'my_taxonomy');

//#########################
//                        #
//         Start          #
// Custom Header details  #
//                        #
//                        #
//#########################


// function jwtheme_custom_header_setup() {
//     $args = array(
//         'default-image'           => get_template_directory_uri() . '/img/default-image.jpg',
//         'default-text-color'      => '000',
//         'width'                   => 1000,
//         'height'                  => 250,
//         'flex-width'              => true,
//         'flex-height'             => true,
//     );
//     add_theme_support('custom-header', $args);
// }
// add_action('after_setup_theme', 'jwtheme_custom_header_setup');






//#########################
//                        #
//         End            #
// Custom Header details  #
//                        #
//                        #
//#########################


?>

<?php

//#########################
// Custom Logo            #
//#########################

get_template_part( 'PHP/customization', 'logo' );

//#########################
// Register navwalker     #
//#########################

get_template_part( 'PHP/bootstrap', 'navwalker' );

//#########################
// Theme Options Panel    #
//#########################

get_template_part( 'PHP/customization', 'panels' );

//#########################
// Header Color Picker    #
//#########################

get_template_part( 'PHP/customization', 'header' );

//######################################
// Customize footer contact information#
//######################################
get_template_part('PHP/customization', 'contact');


//#########################
// JWT Style Settings     #
//#########################
get_template_part( 'PHP/customization', 'style' );
?>



