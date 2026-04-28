<?php
/**
 * Main template file.
 *
 * @package nyssa_hartwood_theme
 */

get_header();
?>

<main class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php get_template_part( 'template-parts/banner' ); ?>

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'template-parts/flexible-page-content' ); ?>

      <?php endwhile; ?>
      <?php else : ?>
            <div class="container">
              <div class="row">
                <div class="col-12 text-center">
                  <p><?php esc_html_e( 'No content found.', 'nyssa_hartwood_theme' ); ?></p>
                </div>
              </div>
            </div>
      <?php endif; ?>
  </article>
</main>

<?php
get_footer();
