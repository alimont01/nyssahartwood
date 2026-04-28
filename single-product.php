<?php
/**
 * Single product template.
 *
 * @package nyssa_hartwood_theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main class="site-main single-product-page">

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php global $product; ?>

		<div class="container-fluid hero cream-bg">
            <div class="container pb-5">

                <?php do_action( 'woocommerce_before_single_product' ); ?>

                <?php if ( post_password_required() ) : ?>
                    <?php echo get_the_password_form(); ?>
                    <?php return; ?>
                <?php endif; ?>

                <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row g-5', $product ); ?>>

                    <div class="col-12 col-lg-6 position-relative">
                        <div class="z-top d-flex justify-content-center">
                            <?php
                            /**
                             * Hook: woocommerce_before_single_product_summary.
                             *
                             * @hooked woocommerce_show_product_sale_flash - 10
                             * @hooked woocommerce_show_product_images - 20
                             */
                            do_action( 'woocommerce_before_single_product_summary' );
                            ?>
                        </div>
                        <div class="lighter-cream-bg plate"></div>
                    </div>

                    <div class="col-12 col-lg-6 ">
                        <div class="">
                            <?php
                            /**
                             * Hook: woocommerce_single_product_summary.
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_template_single_excerpt - 20
                             * @hooked woocommerce_template_single_add_to_cart - 30
                             * @hooked woocommerce_template_single_meta - 40
                             * @hooked woocommerce_template_single_sharing - 50
                             * @hooked WC_Structured_Data::generate_product_data() - 60
                             */
                            do_action( 'woocommerce_single_product_summary' );
                            ?>
                            <p class="small mt-3 mb-5">Instant download after purchase.</p>
                            <?php if( get_field('what_you’ll_find_inside') ): ?>
                                <?php echo acf_esc_html( get_field('what_you’ll_find_inside') ); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

            </div>
		</div>

        <div class="container py-4 py-lg-5 more-book">
            <div class="row">
                <div class="col-12">
                    <?php
                    /**
                     * Hook: woocommerce_after_single_product_summary.
                     *
                     * @hooked woocommerce_output_product_data_tabs - 10
                     * @hooked woocommerce_upsell_display - 15
                     * @hooked woocommerce_output_related_products - 20
                     */
                    do_action( 'woocommerce_after_single_product_summary' );
                    ?>
                </div>
            </div>
        </div>

	<?php endwhile; ?>

</main>

<?php
get_footer();