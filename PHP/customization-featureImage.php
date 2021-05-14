<?php 
    function jwt_customerizer_featured_image($wp_customize) {
        
        //Add new section to Theme Options: Featured Image

        $wp_customize->add_section('jwt_featured_image_section', array(
            'title' => 'Featured Image Options',
            'priority' => 2,
            'panel' => 'jwt_theme_options',
          ));

        //Add Settings
        //Featured Image Text 
        

        $wp_customize->add_setting('jwt_featured_image_text', array(
            'default' => 'To be filled in customize panel',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
          ));

        //Featured Image Text Color
        $wp_customize->add_setting('jwt_featured_image_text_color', array(
            'default' => '#fff',
          ));


        //Add Controls
        //Featured Image Text
        
        $wp_customize->add_control('jwt_featured_image_text', array(
            'type' => 'text',
            'priority' => 10,
            'section' => 'jwt_featured_image_section',
            'label' => 'Featured Image Text',
            'description' => 'The text overlay of the featured image'
        ));

        //Featured Image Text Color

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jwt_featured_image_text_color', array(
            'label' => 'Text Color',
            'section' => 'jwt_featured_image_section',
            'settings' => 'jwt_featured_image_text_color',
          )));
    }

    add_action('customize_register', 'jwt_customerizer_featured_image');
?>