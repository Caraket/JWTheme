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

        // Featured Image Horizontal Setting
        $wp_customize->add_setting('jwt_featured_image_horizontal', array(
            'default' => 40,
            'transport' => 'refresh',
        ));

        // Featured Image Vertical Setting
        $wp_customize->add_setting('jwt_featured_image_vertical', array(
            'default' => 40,
            'transport' => 'refresh',
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

        //Featured Image Horizonal Location control
        $wp_customize->add_control('jwt_featured_image_horizontal', array(
            'type' => 'number',
            'priority' => 10,
            'section' => 'jwt_featured_image_section',
            'description' => 'The horizontal setting of the image text in pixels.'
        ));

        //Featured Image Vertial Location control
        $wp_customize->add_control('jwt_featured_image_vertical', array(
            'type' => 'number',
            'priority' => 10,
            'section' => 'jwt_featured_image_section',
            'description' => 'The vertical setting of the image text in pixels.'
        ));

    }

    add_action('customize_register', 'jwt_customerizer_featured_image');
?>