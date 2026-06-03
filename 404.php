<?php
/**
 * Main template file.
 *
 * @package nyssa_hartwood_theme
 */

get_header();
?>

  <main class="site-main flex-grow-1 align-content-center">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="container-fluid hero cream-bg recipe-bg">
      <div class="container pb-5">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/broken-plate.svg" alt="Nyssa Hartwood Error 404 broken plate">
            <h1 class="mt-0">
              Oops! This isn't what we ordered.
            </h1>
          </div>
        </div>
      </div>
    </header>

    <div class="container py-3 py-md-5">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
          <h2>404 Error</h2>
          <p>The page you're looking for can't be found. It may have been moved, updated, or removed.</p>
          <p>Please return <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a>, shop our <a href="/shop/">books</a>, or explore our collection of <a href="/recipes/">recipes</a>.</p>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">Return to home</a>
        </div>
      </div>
    </div>

    </article>
  </main>


<?php
get_footer();
