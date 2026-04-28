<?php
/**
 * Footer template.
 *
 * @package nyssa_hartwood_theme
 */
?>


<footer class="container-fluid cream-bg py-3 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="col-8 col-sm-5 col-lg-6">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/nyssa-hartwood-logo.svg" alt="Nyssa Hartwood Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-wrap">
                <div class="col-5">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => '',
                        'container'      => 'nav',
                        'container_class'=> 'main-navigation',
                    ) );
                    ?>
                </div>
                <div class="col-5">
                <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'menu_class'     => '',
                        'container'      => 'nav',
                        'container_class'=> 'main-navigation',
                    ) );
                    ?>
                </div>
                <div class="col-2 text-end">
                    <a href="/my-account/"><i class="bi bi-person-circle fs-5 me-2"></i></a>
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon">
                      <i class="bi bi-bag-heart-fill fs-5"></i>
                      <span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                    </a>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="border-top py-2">
            </div>
        </div>
        <div class="row">
            <div class="col-6 mb-3 mb-lg-0">
                <p class="small mb-2">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
            </div>
            <div class="col-6 text-end">
                <a href="https://alizan.uk/" target="_blank">
                    <img class="alizan-logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/alizan-logo-black.svg" alt="Alizan Logo">
                </a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
