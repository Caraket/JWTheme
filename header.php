<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    
    
    <title>Document</title>

    <?php wp_head(); ?>

</head>
<body>
    <div class="row">
        <div class="contact">
            <p class="contact-pwrapper"> 
                <a class="phone" href="tel:2182564917">Call Us (218) 256-4917</a> 
                <a class="icons" target="_blank" href="https://www.facebook.com/JW-contracting-LLC-106729497594131"><i class="fab fa-facebook-square"></i></a> 
                <a class="icons" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a> 
                <a class="icons" target="_blank" href="https://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
            </p>
        </div>
        <div class="col-lg-12 logo-head">
            <a class="navbar-brand" href="#">
                <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                     
                    if ( has_custom_logo() ) {
                        echo '<img class="img-fluid logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                    } else {
                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                    }
                ?>
            </a>
            <span class="business-name"><?php echo get_bloginfo( 'name' ); ?></span>
        </div>
        <div class="row">

            <div class="col-lg-12 pe-0">
                <header>    
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="container-fluid">
                            
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            
                            <div class="collapse navbar-collapse" id="main-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'top-menu',
                                    'container' => false,
                                    'menu_class' => 'top-bar',
                                    'fallback_cb' => '__return_false',
                                    'items_wrap' => '<ul id="%1$s" class="navbar-nav me-0 mb-2 mb-0 %2$s">%3$s</ul>',
                                    'depth' => 2,
                                    'walker' => new bootstrap_5_wp_nav_menu_walker()
                                ));
                                ?>
                            </div>
                        </div>
                    </nav>
                    </header>
            </div>
        </div>
    </div>