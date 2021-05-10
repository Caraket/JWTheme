<?php

// Load Styelsheets
function load_css() {

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'load_css');

// Load Stylesheets
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
    'mobile-menu' => 'Mobile Menu Location', 
) );


// Custom image sizes
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
//                        #
//                        #
// Custom Logo details    #
//                        #
//                        #
//#########################

function jwtheme_custom_logo_setup() {
    $defaults = array(
        'height'               => 200,
        'width'                => 200,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'jwtheme_custom_logo_setup' );



//#########################
//                        #
//                        #
// End Custom Logo        #
//                        #
//                        #
//#########################
?>

<?php
//#########################
//                        #
//                        #
// Register navwalker     #
//                        #
//                        #
//#########################




// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = array())
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor) ? 'active' : '';
    $attributes .= ($args->walker->has_children) ? ' class="nav-link ' . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link ' . $active_class . '"';

    $item_output = $args->before;
    $item_output .= ($depth > 0) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
// register a new menu
register_nav_menu('main-menu', 'Main menu');

//#########################
//                        #
//                        #
//End register navwalker  #
//                        #
//                        #
//#########################



//#########################
//                        #
//                        #
// Custom Mailer          #
// Does not work          #
//                        #
//#########################

add_action('phpmailer_init', 'custome_mailer');
function customer_mailer($phpmailer) {
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->FromName = "Cory Paulley";
    $phpmailer->Port = 587;
    $phpmailer->Username = 'cory.paulley@gmail.com';
    $phpmailer->Password = 'TheWheelofTimeTurns';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->IsSMTP();
    

}





//#########################
//                        #
//                        #
//End custom mailer       #
//                        #
//                        #
//#########################




?>
