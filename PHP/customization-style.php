<?php 
function jwt_generate_theme_option_css(){
  $themeColor = get_theme_mod('jwt_header_bgcolor');
  $header_bgcolor = get_theme_mod('jwt_navigation_bgcolor');
  $callus_color = get_theme_mod('jwt_callus_color');
  $logo_head_bgcolor = get_theme_mod('jwt_logo_head_bgcolor');
  $featured_image_text_color = get_theme_mod('jwt_featured_image_text_color');
  $featured_image_horizontal = get_theme_mod('jwt_featured_image_horizontal');
  $featured_image_vertical = get_theme_mod('jwt_featured_image_vertical');
  $navbar_rounded = get_theme_mod('jwt_nav_header_isRounded');

  if(!empty($themeColor)):
  ?>
  <style>
    header {
      background-color: <?php echo $header_bgcolor; ?>;
      border-top-left-radius: <?php echo $navbar_rounded; ?>px;
      border-top-right-radius: <?php echo $navbar_rounded; ?>px;
    }

    .contact {
      background-color: <?php echo $themeColor; ?>;
      border-bottom-left-radius: <?php echo $navbar_rounded; ?>px;
      border-bottom-right-radius: <?php echo $navbar_rounded; ?>px;
    }

    .footer-wrapper {
      background-color: <?php echo $themeColor ?>;
    }

    .phone {
      color: <?php echo $callus_color; ?>;
    }

    .logo-head{
      background-color: <?php echo $logo_head_bgcolor; ?>;
    }

    .featured-text {
      color: <?php echo $featured_image_text_color; ?>;
      left: <?php echo $featured_image_horizontal; ?>px;
      bottom: <?php echo $featured_image_vertical; ?>px;
    }



  </style>
  <?php
  endif;

}

add_action('wp_head', 'jwt_generate_theme_option_css');

?>