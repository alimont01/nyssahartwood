<?php
get_header();

$shop_page_id = wc_get_page_id('shop');
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $shop_page_id ), 'full' );
?>

<?php if ( has_post_thumbnail( $shop_page_id ) ) : ?>
	<header class="container-fluid hero-hp cream-bg position-relative">
		<div class="container pb-5">
			<div class="row justify-content-end">
				<div class="col-lg-6 ps-lg-5">
					<h1 class="mt-0 fs-1">
						<?php woocommerce_page_title(); ?>
					</h1>

					<?php if ( get_field('sub_title', $shop_page_id) ): ?>
						<h2 class="fs-4 mt-4">
							<?php echo acf_esc_html( get_field('sub_title', $shop_page_id) ); ?>
						</h2>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<div class="w-50 h-100 position-absolute start-0 top-0">
			<img class="position-absolute top-0 start-0 feat-img" src="<?php echo $thumb[0]; ?>" alt="Shop Healing Meals">
		</div>
	</header>

<?php else: ?> 

	<header class="container-fluid hero cream-bg">
		<div class="container pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="mt-0">
						<?php woocommerce_page_title(); ?>
					</h1>
				</div>
			</div>
		</div>
	</header>

<?php endif; ?> 

<div class="container py-4">
    <div class="row">
        <div class="col-12">
            <?php
            $post = get_post( $shop_page_id );

            if ( $post ) {
                echo apply_filters( 'the_content', $post->post_content );
            }
            ?>
        </div>
    </div>
</div>

<div class="container py-5">    
    <div class="row g-4">
        <?php if ( woocommerce_product_loop() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php global $product; ?>

                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none d-block h-100">
                        <div class="rounded-4 d-flex flex-wrap h-100 sign-post-2
                        <?php if( get_field('book_background_colour') ): ?>
                            <?php echo acf_esc_html( get_field('book_background_colour') ); ?>
                        <?php endif; ?>">
                            <div class="col-12 col-lg-6 d-flex justify-content-center">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'large', array( 'class' => 'shop-book-cover' ) ); ?>
                                <?php endif; ?>
                            </div>

                            <div class="col-12 col-lg-6 p-4 text-white d-flex flex-column">
                                <h3><?php the_title(); ?></h3>

                                <?php if ( get_the_excerpt() ) : ?>
                                    <?php the_excerpt(); ?>
                                <?php endif; ?>

                                <div class="col-12 d-flex align-items-center mt-auto">
                                    <?php if ( $product ) : ?>
                                        <div class="col-6 text-start"><?php echo $product->get_price_html(); ?></div>
                                    <?php endif; ?>
                                    <div class="col-6 text-end">
                                        <i class="bi bi-arrow-right-circle-fill fs-1"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="col-12">
                <p>No products found.</p>
            </div>
        <?php endif; ?>
    </div>

    <?php do_action( 'woocommerce_after_shop_loop' ); ?>
    <?php do_action( 'woocommerce_after_main_content' ); ?>

</div>

<?php
get_footer();