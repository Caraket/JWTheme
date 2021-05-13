<?php
function jwt_custom_footer($wp_customize) {
  
  $wp_customize->add_section('jwt_contact_options', array(
    'title' => 'Contact Options',
    'priority' => '2',
    'panel' => 'jwt_theme_options',
  ));

  // Phone Number Text
  $wp_customize->add_setting('jwt_phone_number_text', array(
    'default' => '555-555-5555',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
  ));

  // Phone Number tel
  $wp_customize->add_setting('jwt_phone_number_tel', array(
    'default' => '555-555-5555',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
  ));

  // Address
  $wp_customize->add_setting('jwt_address_text', array(
    'default' => 'To be filled in customize panel',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
  ));

  // Email
  $wp_customize->add_setting('jwt_email_setting', array(
    'default' => get_bloginfo('admin_email'),
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'refresh',
  ));

  $wp_customize->add_control('jwt_phone_number_text', array(
    'type' => 'text',
    'priority' => 10,
    'section' => 'jwt_contact_options',
    'label' => 'Phone Number Text',
    'description' => 'The phone number to be displayed on the footer',
  ));

  $wp_customize->add_control('jwt_phone_number_tel', array(
    'type' => 'number',
    'priority' => 10,
    'section' => 'jwt_contact_options', 
    'label' => 'Phone Number Call',
    'description' => 'The unhighenated phone number for the call button',
  ));

  $wp_customize->add_control('jwt_address_text', array(
    'type' => 'text',
    'priority' => 10,
    'section' => 'jwt_contact_options', 
    'label' => 'Address Text',
    'description' => 'The Address text',
  ));

  $wp_customize->add_control('jwt_email_setting', array(
    'type' => 'email',
    'priority' => 10,
    'section' => 'jwt_contact_options', 
    'label' => 'Email',
    'description' => 'Example: "admin@test.com"',
  ));
  

}

add_action('customize_register', 'jwt_custom_footer');
?>