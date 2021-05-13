<?php 
    function jwt_customizer_add_colorPicker($wp_customize) {
        // Add new section: Header Colors
        
        
        $wp_customize->add_section( 'jwt_header_color_section', array(
          'title' => 'Header Colors',
          'description' => 'Set colors of background and links in the header',
          'priority' => '1',
          'panel' => 'jwt_theme_options',
        ));
      
        // Add Settings 
        // Top header background
        $wp_customize->add_setting( 'jwt_header_bgcolor' , array(
          'default' => '#cccccc',
        ));
        
        // Logo Head Background Color
        $wp_customize->add_setting( 'jwt_logo_head_bgcolor', array(
          'default' => '#fff',
        ));
        
        // Navigation bar background
        $wp_customize->add_setting( 'jwt_navigation_bgcolor', array(
          'default' => '#cccccc',
        ));
        
        // Call Us Text Color
        $wp_customize->add_setting( 'jwt_callus_color', array(
          'default' => '#000000',
        ));
      
        
      
      
        // Add Controls
        // Top header background control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jwt_header_bgcolor', array(
          'label' => 'Top Header Color',
          'section' => 'jwt_header_color_section',
          'settings' => 'jwt_header_bgcolor',
        )));
      
        // Logo Head Background Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jwt_logo_head_bgcolor', array(
          'label' => "Logo Heading Background",
          'section' => 'jwt_header_color_section',
          'settings' => 'jwt_logo_head_bgcolor',
        )));
      
      
        // Navigation Background Control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jwt_navigation_bgcolor', array(
          'label' => 'Navigation Background',
          'section' => 'jwt_header_color_section',
          'settings' => 'jwt_navigation_bgcolor',
        )));
        // Call Us Text Color control
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'jwt_callus_color', array(
          'label' => 'Call Us Color',
          'section' => 'jwt_header_color_section',
          'settings' => 'jwt_callus_color',
        )));  
      
      
      }
      
      add_action( 'customize_register', 'jwt_customizer_add_colorPicker');
?>