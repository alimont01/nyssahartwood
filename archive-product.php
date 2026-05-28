<?php
get_header();

$shop_page_id = wc_get_page_id('shop');
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $shop_page_id ), 'full' );
?>

<?php if ( has_post_thumbnail( $shop_page_id ) ) : ?>
	<header class="container-fluid hero-hp cream-bg position-relative">
		<div class="container pb-5">
			<div class="row justify-content-end">
				<div class="col-md-6 ps-md-4 ps-lg-5">
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
					<?php if ( get_field('sub_title', $shop_page_id) ): ?>
						<h2 class="fs-4 mt-4">
							<?php echo acf_esc_html( get_field('sub_title', $shop_page_id) ); ?>
						</h2>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
<?php endif; ?> 

<div class="container py-4 d-none">
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

<?php get_template_part( 'template-parts/flexible-page-content' ); ?>


    <?php do_action( 'woocommerce_after_shop_loop' ); ?>
    <?php do_action( 'woocommerce_after_main_content' ); ?>

</div>

<?php
get_footer();