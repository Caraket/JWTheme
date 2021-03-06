<footer>
    <div class="footer-wrapper">
        <div class="row">
        <div class="col-lg-3 col-md col-sm"></div>

            <div class="col-lg-3 col-md-12 col-sm-12 footer-contact">
                <p><a href="tel:<?php echo get_theme_mod('jwt_phone_number_text'); ?>"><?php echo get_theme_mod('jwt_phone_number_text'); ?></a></p>
                <!-- 218-256-4917 -->
                <p><a href="sms:<?php echo get_theme_mod('jwt_phone_number_tel'); ?>">Send a text</a></p>
                <p><?php echo get_theme_mod('jwt_address_text'); ?></p>
                <p><a href="mailto:<?php echo get_theme_mod('jwt_email_setting'); ?>"><?php echo get_theme_mod('jwt_email_setting'); ?></a></p>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 footer-navigation">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => 'footer-nav',
                        'fallback_cb' => '__return_false',
                        'items_wrap' => '<ul id="%1$s" class="navbar-nav me-0 mb-2 mb-0 %2$s">%3$s</ul>',
                        'depth' => 0,
                        'walker' => new bootstrap_5_wp_nav_menu_walker()
                    ));               
                ?>
            </div>
            <div class="col-lg-3 col-md col-sm"></div>

        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>