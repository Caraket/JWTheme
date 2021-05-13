<?php 
function jwt_generate_theme_option_css(){
  $themeColor = get_theme_mod('jwt_header_bgcolor');
  $header_bgcolor = get_theme_mod('jwt_navigation_bgcolor');
  $callus_color = get_theme_mod('jwt_callus_color');
  $logo_head_bgcolor = get_theme_mod('jwt_logo_head_bgcolor');

  if(!empty($themeColor)):
  ?>
  <style>
    header {
      background-color: <?php echo $header_bgcolor; ?>;
    }

    .contact {
      background-color: <?php echo $themeColor; ?>;
    }

    .footer-wrapper {
      background-color: <?php echo $themeColor ?>;
    }

    .phone {
      color: <?php echo $callus_color; ?>;
    }

    .logo-head{
      background-color: <?php echo $logo_head_bgcolor; ?>
    }



  </style>
  <?php
  endif;

}

add_action('wp_head', 'jwt_generate_theme_option_css');

?>