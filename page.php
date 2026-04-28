<?php
/**
 * Page template.
 *
 * @package nyssa_hartwood_theme
 */

get_header();
?>

<main class="site-main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/banner' ); ?>

				<?php if ( is_cart() || is_checkout() || is_account_page() ) : ?>
					<div class="container py-5">
						<?php the_content(); ?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'template-parts/flexible-page-content' ); ?>
				<?php endif; ?>

			<?php endwhile; ?>
		<?php else : ?>
			<div class="container text-white mt-5 fadein-content">
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