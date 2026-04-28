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
            <div class="col-8 col-sm-5 col-lg-3">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php if ( get_field('choose_logo') || get_field('choose_logo', 18) ): ?>
                    <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/nyssa-hartwood-logo-white.svg" alt="Nyssa Hartwood Logo white logo">
                <?php else: ?>
                    <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/nyssa-hartwood-logo.svg" alt="Nyssa Hartwood Logo">
                <?php endif; ?>
              </a>
            </div>
            <div class="col-4 col-sm-7 col-lg-9 d-flex flex-column align-items-end">
                <div class="d-flex flex-grow-1">
                    <a href="/my-account/"><i class="bi bi-person-circle fs-5 me-2"></i></a>
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="cart-icon">
                      <i class="bi bi-bag-heart-fill fs-5"></i>
                      <span class="cart-count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
                    </a>
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
