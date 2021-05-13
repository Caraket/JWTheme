<?php 

function jwt_add_theme_options_panel($wp_customize) {
    $wp_customize->add_panel('jwt_theme_options', array(
      'title' => 'Theme Options',
      'description' => 'Modify color schemes, header and footer text, and any theme related attributes here!',
    ));
  }
  add_action('customize_register', 'jwt_add_theme_options_panel');

?>