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
        <div class="container py-3 py-md-5 mt-5 z-top fadein-content">
          <div class="row">
            <div class="col-12">
              
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button">Return to home</a>
            </div>
          </div>
        </div>
    </article>
  </main>


<?php
get_footer();
