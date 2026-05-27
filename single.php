<?php
/**
 * Single post template.
 *
 * @package nyssa_hartwood_theme
 */

get_header();
?>

<main class="site-main single-post-page">

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php get_template_part( 'template-parts/banner' ); ?>
            <?php get_template_part( 'template-parts/flexible-page-content' ); ?>
		</article>

		<?php endwhile; ?>
	<?php endif; ?>

</main>

<?php
get_footer();