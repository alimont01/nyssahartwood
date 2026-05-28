<?php
/**
 * Header template.
 *
 * @package nyssa_hartwood_theme
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header position-absolute w-100">
  <h1 class="site-title d-none">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
  </h1>
      <div class="container py-3 z-top">
        <div class="row">
            <div class="col-7 col-sm-5 col-lg-3">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php
                    $logo_is_white = get_field( 'choose_logo' );

                    if ( function_exists( 'is_shop' ) && is_shop() ) {
                        $shop_page_id  = wc_get_page_id( 'shop' );
                        $logo_is_white = get_field( 'choose_logo', $shop_page_id );
                    }

                    if ( is_home() && ! is_front_page() ) {
                        $blog_page_id  = get_option( 'page_for_posts' );
                        $logo_is_white = get_field( 'choose_logo', $blog_page_id );
                    }
                    ?>

                  <?php if ( $logo_is_white ): ?>
                      <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/nyssa-hartwood-logo-white.svg" alt="Nyssa Hartwood Logo logo">
                  <?php else: ?>
                      <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/nyssa-hartwood-logo.svg" alt="Nyssa Hartwood Logo">
                  <?php endif; ?>
              </a>
            </div>
            <div class="col-5 col-sm-7 col-lg-9 d-flex flex-column align-items-end">
                <div class="d-flex flex-grow-1 sub-menu align-items-center align-items-md-start">
                    <a href="/my-account/"><i class="bi bi-person-circle fs-5 me-2"></i></a>
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon">
                        <i class="bi bi-bag-heart-fill fs-5"></i>
                        <span class="cart-count">
                            <?php echo WC()->cart ? esc_html( WC()->cart->get_cart_contents_count() ) : '0'; ?>
                        </span>
                    </a>
                    <button class="d-inline-block d-md-none ms-4 text-center rounded-circle mobile-menu" type="button" aria-controls="mobile-menu" aria-expanded="false">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                </div>

                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'd-none d-md-flex mb-0',
                    'container'      => 'nav',
                    'container_class'=> 'main-navigation',
                ) );
                ?>
            </div>
        </div>
    </div>
</header>

<div id="mobile-menu" class="w-100 p-4 darker-cream-bg">
    <div class="w-100 d-flex justify-content-end pt-2 z-top">
        <button class="mobile-menu-close text-center rounded-circle mobile-menu" type="button">
            <i class="bi bi-x fs-5"></i>
        </button>
    </div>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'footer_1',
        'menu_id'        => 'mobile-menu-items',
        'menu_class'     => 'mt-5 ps-0 d-flex flex-column align-items-center',
        'container'      => 'nav',
        'container_class'=> 'mobile-navigation z-top',
    ) );
    ?>
    <div class="d-flex w-100 align-items-center justify-content-center border-top border-white pt-4 z-top">
        <a href="/my-account/"><i class="bi bi-person-circle fs-5 me-2"></i></a>
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon">
            <i class="bi bi-bag-heart-fill fs-5"></i>
            <span class="cart-count">
                <?php echo WC()->cart ? esc_html( WC()->cart->get_cart_contents_count() ) : '0'; ?>
            </span>
        </a>
    </div>
    <img class="position-absolute start-0 bottom-0 w-100 opacity-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/heart-white.svg" alt="Nyssa Hartwood heart graphic">
</div>